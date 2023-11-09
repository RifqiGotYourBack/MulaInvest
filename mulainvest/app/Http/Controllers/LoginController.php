<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi
        $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'Email')->where(function ($query) {
                $query->where('IsActive', 1);
            })],
            'password' => ['required', 'min:5', 'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'],
        ]);

        // Fetch user by Email
        $user = User::where('Email', $request->email)->where('IsActive', 1)->first();

        // Check if the user is verified
        if ($user && $user->IsVerified && Hash::check($request->password, $user->Password)) {
            auth()->login($user);

            // Handle role user
            if ($user->Role === 'user') {
                return redirect()->route('beranda');
            } elseif ($user->Role === 'admin') {
                return redirect()->route('investasiAdmin');
            }
        } elseif ($user && !$user->IsVerified) {
            // If the user is not verified, redirect to the OTP verification page
            return redirect()->route('verify.otp')->with([
                'email' => $request->email,
                'error' => 'Please verify your account using the OTP sent to your email.'
            ]);

        }

        // If login details are incorrect
        throw ValidationException::withMessages(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
