<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\BankAccounts;

class ProfileController extends Controller
{

    public function showEditProfileForm()
    {
        $user = User::where('UserID', auth()->user()->UserID)->first();
        return view('profil', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Validasi
        $request->validate([
            'email' => 'required|email|unique:users,Email,' . auth()->user()->UserID . ',UserID,IsActive,1',
            'full_name' => 'required|string|max:255',
            'no_telp' => 'nullable|numeric',
            'address' => 'nullable|string',
        ]);

        // Dapatkan user yang sedang login
        $user = User::where('UserID', auth()->user()->UserID)->first();

        // Update data user
        $user->Name = $request->full_name;
        $user->Email = $request->email;
        $user->NoTelp = $request->no_telp;
        $user->Address = $request->address;

        if ($user->save()) {
            // Redirect dengan pesan sukses
            return redirect()->route('profil')->with('status', 'Profile Updated!');
        } else {
            // Redirect dengan pesan kesalahan
            return back()->with('error', 'Failed to update profile. Please try again.');
        }
    }

    public function showEditPasswordForm()
    {
        return view('gantiPassword');
    }

    public function updatePassword(Request $request)
    {
        // Validasi form inputan
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|min:5|regex:/[a-z]/|regex:/[0-9]/',
        ]);

        // Dapatkan user yang sedang login
        $user = User::where('UserID', auth()->user()->UserID)->first();

        // Periksa apakah kata sandi lama sesuai
        if (!Hash::check($request->old_password, $user->Password)) {
            return back()->with('error', 'Failed to update password. Please try again.');
        }
        if(!($request->password === $request->confirm)){
            return back()->with('error', 'Konfirmasi password tidak sama');
        }

        // Update kata sandi
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            // Redirect dengan pesan sukses
            return redirect()->route('gantiPassword')->with('status', 'Password Updated!');
        } else {
            // Redirect dengan pesan kesalahan
            return back()->with('error', 'Failed to update password. Please try again.');
        }
    }

    public function showEditBankAccount()
    {
        $user = User::where('UserID', auth()->user()->UserID)->first();
        $bankAccount = BankAccounts::where('UserID', $user->UserID)->first();

        return view('bankAkun', [
            'user' => $user,
            'bankAccount' => $bankAccount
        ]);
    }

    public function updateBankAccount(Request $request)
    {
        // Validasi form inputan
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
        ]);

        // Dapatkan user yang sedang login
        $user = User::where('UserID', auth()->user()->UserID)->first();

        // Periksa apakah pengguna memiliki informasi rekening bank
        $bankAccount = BankAccounts::where('UserID', $user->UserID)->first();

        // Jika pengguna belum memiliki informasi rekening bank, buat entri baru
        if (!$bankAccount) {
            $bankAccount = new BankAccounts;
            $bankAccount->UserID = $user->UserID;
        }

        // Update informasi rekening bank
        $bankAccount->BankName = $request->bank_name;
        $bankAccount->BankAccountNumber = $request->bank_account_number;

        if ($bankAccount->save()) {
            // Redirect dengan pesan sukses
            return redirect()->route('bankAkun')->with('status', 'Bank Account Updated!');
        } else {
            // Redirect dengan pesan kesalahan
            return back()->with('error', 'Failed to update bank account information. Please try again.');
        }
    }
}
