<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TransactionHistories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TopUpController extends Controller
{
    public function topUp(Request $request)
    {
        // dd($request->all());
        // Validasi
        $request->validate([
            'nominal' => 'required|numeric|min:10000',
            'payment_method' => 'required|string',
            'account_password' => 'required',
        ]);

        // Cek user dan pasword
        $user = auth()->user();
        $userID = $user->UserID;
        $userTable = User::findOrFail($userID);

        if (!Hash::check($request->account_password, $userTable->Password)) {
            return back()->withErrors(['account_password' => 'Password akun tidak sesuai.']);
        }

        if ($request->payment_method !== 'bank') {
            return back()->withErrors(['payment_method' => 'Metode pembayaran tidak diketahui.']);
        }

        // Check if user has a bank account linked
        $bankAccountExists = DB::table('bank_accounts')->where('UserID', $user->UserID)->exists();
        if (!$bankAccountExists) {
            return back()->withErrors(['bank_account' => 'Tolong lengkapi data Bank anda.']);
        }

        // Start the transaction
        DB::beginTransaction();
        try {
            // Increment the user's balance
            $userTable->increment('balance', $request->nominal);

            TransactionHistories::create([
                'TransactionID' => str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT),
                'UserID' => $user->UserID,
                'TransactionAmount' => 1,
                'TransactionValue' => $request->nominal,
                'TransactionType' => 'Topup',
                'TransactionDate' => now(),
            ]);

            DB::commit();
            return redirect()->route('topUp')->with('success', 'Top up berhasil.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors('Error message: ' . $e->getMessage());
        }
    }
}
