<?php

namespace App\Helpers;

class OtpHelper
{
    public static function generateOtp()
    {
        return rand(100000, 999999); // Generates a 6-digit OTP
    }

    public static function otpExpiration()
    {
        return now()->addMinutes(10); // OTP expires in 10 minutes
    }
}
