<?php

namespace App\Http\Controllers;

use App\Models\BankAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Validator;

class OTPController extends Controller
{
    public function index(Request $request)
    {
        $email = $request->session()->get('email');
        return view('otp', [
            'email' => $email
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email_hidden' => 'required|email|exists:users,Email',
        ]);

        $user = User::where('Email', $request->email_hidden)->first();

        // Cek apakah OTP sudah kadaluarsa (misalnya, lebih dari 10 menit)
        $otpExpirationTime = 600; // Detik (10 menit)
        $otpRequestedAt = $user->otp_requested_at;
        if ((strtotime($otpRequestedAt) + $otpExpirationTime) < time()) {
            return redirect()->route('verify.otp')->with([
                'error' => 'OTP has expired. Please request a new one.',
                'email' => $request->email_hidden, // Menyimpan email dalam sesi flash
            ]);
        }

        // Cek apakah OTP sesuai
        if ($request->otp == $user->OTP) {
            // Update status IsVerified menjadi true
            $user->IsVerified = true;
            $user->save();

            return redirect()->route('login')->with('status', 'Verification successful! You can now log in.');
        } else {
            return redirect()->route('verify.otp')->with([
                'error' => 'Invalid OTP. Please try again.',
                'email' => $request->email_hidden, // Menyimpan email dalam sesi flash
            ]);
        }
    }

    public function resendOtp(Request $request)
    {
        $request->validate([
            'email_hidden_resend' => 'required|email|exists:users,Email,IsVerified,0',
        ]);

        $user = User::where('Email', $request->email_hidden_resend)->first();

        // Generate new OTP
        $otp = rand(100000, 999999);

        // Update user data
        $user->OTP = $otp;
        $user->otp_requested_at = now();

        $user->save();

        // Kirim OTP baru via email
        Mail::to($user->Email)->send(new OtpMail($otp));

        return redirect()->route('verify.otp')->with([
            'status' => 'New OTP sent to your email. Please check your inbox.',
            'email' => $request->email_hidden_resend, // Menyimpan email dalam sesi flash
        ]);
    }
}
