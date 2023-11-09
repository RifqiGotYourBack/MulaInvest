<?php

namespace App\Http\Controllers;

use App\Models\BankAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,Email,NULL,id,IsActive,1',
            'full_name' => 'required|string|max:255',
            'password' => 'required|string|min:5|regex:/[a-z]/|regex:/[0-9]/|confirmed'
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);

        // Create User
        $user = new User;
        $user->UserID = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $user->Name = $request->full_name;
        $user->Email = $request->email;
        $user->Password = Hash::make($request->password);
        $user->Balance = 0;
        $user->NoTelp = '';
        $user->Address = '';
        $user->Role = 'user';
        $user->IsActive = 1;
        $user->IsVerified = false; // Set IsVerified ke false
        $user->OTP = $otp; // Simpan OTP
        $user->otp_requested_at = now(); // Simpan waktu permintaan OTP

        $bankAccount = new BankAccounts;
        $bankAccount->BankAccountID = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $bankAccount->UserID = $user->UserID;
        $bankAccount->BankName = '';
        $bankAccount->BankAccountNumber = '';

        if ($user->save()) {
            $bankAccount->save();

            // Redirect ke halaman verifikasi OTP
            return redirect()->route('verify.otp')->with([
                'email' => $request->email,
            ]);
        } else {
            return back()->with('error', 'Failed to register. Please try again.');
        }
    }

}
