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

        // Dapatkan user 
        $user = User::where('UserID', auth()->user()->UserID)->first();

        $user->Name = $request->full_name;
        $user->Email = $request->email;
        $user->NoTelp = $request->no_telp;
        $user->Address = $request->address;
        $user->DateOfBirth = $request->dob;

        if ($user->save()) {
            return redirect()->route('profil')->with('status', 'Profil Berhasil Diperbarui!');
        } else {
            return back()->with('error', 'Gagal Memperbarui Profil.');
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
        $user = User::where('UserID', auth()->user()->UserID)->first();

        // Periksa apakah kata sandi lama sesuai
        if (!Hash::check($request->old_password, $user->Password)) {
            return back()->with('error', 'Gagal Memperbarui Password.');
        }
        if(!($request->password === $request->confirm)){
            return back()->with('error', 'Password Tidak Selaras.');
        }

        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect()->route('gantiPassword')->with('status', 'Password Berhasil Diperbarui!');
        } else {
            return back()->with('error', 'Gagal Memperbarui password.');
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

        $user = User::where('UserID', auth()->user()->UserID)->first();

        $bankAccount = BankAccounts::where('UserID', $user->UserID)->first();

        // Jika pengguna belum memiliki informasi rekening bank, buat entri baru
        if (!$bankAccount) {
            $bankAccount = new BankAccounts;
            $bankAccount->UserID = $user->UserID;
        }

        $bankAccount->BankAccountID = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $bankAccount->BankName = $request->bank_name;
        $bankAccount->BankAccountNumber = $request->bank_account_number;

        if ($bankAccount->save()) {
            return redirect()->route('bankAkun')->with('status', 'Akun Bank Berhasil Diperbarui!');
        } else {
            return back()->with('error', 'Gagal Memperbarui Akun Bank.');
        }
    }
}
