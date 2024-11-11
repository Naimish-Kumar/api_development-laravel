<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/resend-otp', [AuthController::class, 'resendOtp']);
Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetOtp']);
Route::post('/reset-password', [AuthController::class, 'resetPasswordWithOtp']);
Route::post('/google-signin', [AuthController::class, 'googleSignIn']);
Route::post('/apple-signin', [AuthController::class, 'appleSignIn']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);
    Route::post('/update-profile/{id}', [AuthController::class, 'updateProfile']);

    


});
