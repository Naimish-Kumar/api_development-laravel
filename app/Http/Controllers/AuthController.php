<?php

namespace App\Http\Controllers;

use App\Helpers\OtpHelper;
use App\Mail\SendOtpMail;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Google\Client as Google_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // Register new user
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:10',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',

        ]);
        $path = null;
        if ($request->hasFile('profile_picture')) {
            // Store the image and get the file path
            $path = $request->file('profile_picture')->store('profile_picture', 'public');
        }
        $otp = OtpHelper::generateOtp();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'profile_picture' => $path,
            'otp' => $otp,
            'otp_expires_at' => OtpHelper::otpExpiration(),
        ]);
        Mail::to($user->email)->send(new SendOtpMail($otp));

        return response()->json([
            'success' => true,
            'message' => 'OTP successfully sent to your registered mail.', ]);
    }

    // Verify OTP for user registration
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string',
        ]);

        $user = User::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('otp_expires_at', '>=', now())
            ->first();

        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP.'], 400);
        }
        $user->makeHidden(['otp', 'otp_expires_at']);
        // Reset the OTP fields after successful verification
        $user->update([
            'is_verified' => true,
            'otp' => null,
            'otp_expires_at' => null,
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'User verified successfully.',
            'user' => $user,
            'access_token' => $token,
        ]);
    }

    // Resend OTP
    public function resendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $otp = OtpHelper::generateOtp();
        $user->update(['otp' => $otp, 'otp_expires_at' => OtpHelper::otpExpiration()]);
        Mail::to($user->email)->send(new SendOtpMail($otp));

        return response()->json(['message' => 'OTP resent to email.']);
    }

    // Login user
    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid login details'], 401);
        }

        $user = Auth::user();
        $user->makeHidden(['otp', 'otp_expires_at']); // Hide specific columns

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully.',
            'access_token' => $token,
            'user' => $user,
        ]);
    }

    public function sendPasswordResetOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'], 404);
        }

        $otp = OtpHelper::generateOtp();
        $user->update(['otp' => $otp, 'otp_expires_at' => OtpHelper::otpExpiration()]);
        Mail::to($user->email)->send(new SendOtpMail($otp));

        return response()->json([
            'success' => true,
            'message' => 'OTP sent to email for password reset password.', ]);
    }

    // Reset password using OTP
    public function resetPasswordWithOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('otp_expires_at', '>', now())
            ->first();

        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP.'], 400);
        }

        $user->update([
            'password' => Hash::make($request->password),
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Password reset successfully.']);
    }

    public function me(Request $request)
    {
        return response()->json($request->user()->makeHidden(['otp', 'otp_expires_at']));
    }

    // Logout user (revoke token)
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    public function changePassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
        ]);

        $user = auth()->user(); // Get the authenticated user

        // Check if the current password matches
        if (! Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password does not match.',
            ], 400); // 400 Bad Request
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully.',
        ]);
    }

    public function updateProfile(Request $request, int $id)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'string|max:255',
            'phone' => 'string|max:10',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the user by ID
        $user = User::find($id);
        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }

        // Update profile picture if provided
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Store the new profile picture and get the path
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path; // Update profile picture field in database
        }
        // Update other fields except profile picture
        $user->fill($request->except('profile_picture'));

        // Save changes
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully.',
            'user' => $user,
        ]);
    }

    public function googleSignIn(Request $request)
    {
        $token = $request->input('token');

        // Log the token for debugging
        if (! $token) {
            return response()->json([
                'success' => false,
                'message' => 'token is missing'], 400);
        }

        // Verify Google ID Token
        $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]); // Specify your Google Client ID
        $payload = $client->verifyIdToken($token);
        if ($payload) {
            $googleId = $payload['sub'];
            // Continue with user login or registration
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Google token'], 401);
        }

        $token = $request->input('token');

        // Verify Google ID Token
        $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]); // Specify your Google Client ID
        $payload = $client->verifyIdToken($token);

        if ($payload) {
            $googleId = $payload['sub'];
            $user = User::firstOrCreate(
                ['google_id' => $googleId],
                [
                    'name' => $payload['name'],
                    'email' => $payload['email'],
                    'phone' => $payload['phone'],
                    'profile_picture' => $payload['image'],

                ]
            );

            // Generate JWT Token
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'access_token' => $token,
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Google token'], 401);
        }

    }

    public function appleSignIn(Request $request)
    {
        $identityToken = $request->input('identity_token');

        // Decode and verify the identity token with Apple’s public keys
        $applePublicKeyUrl = 'https://appleid.apple.com/auth/keys';
        $appleKeyData = file_get_contents($applePublicKeyUrl);
        $appleKeys = json_decode($appleKeyData, true)['keys'];

        // Parse the token header to find the appropriate key
        $header = JWT::jsonDecode(JWT::urlsafeB64Decode(explode('.', $identityToken)[0]));

        foreach ($appleKeys as $key) {
            if ($key['kid'] === $header->kid) {
                $publicKey = JWT::urlsafeB64Encode($key['x5c'][0]);
                $decodedToken = JWT::decode($identityToken, new Key($publicKey, 'RS256'));

                $appleId = $decodedToken->sub;
                $user = User::firstOrCreate(
                    ['apple_id' => $appleId],
                    [
                        'name' => $decodedToken->email,
                        'email' => $decodedToken->email,
                    ]
                );

                // Generate JWT Token
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'success' => true,
                    'access_token' => $token,
                    'user' => $user,
                ]);
            }
        }

        return response()->json(['message' => 'Invalid Apple token'], 401);
    }
}
