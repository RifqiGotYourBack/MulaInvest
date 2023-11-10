<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHistories;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->UserID;
        $transactionHistories = TransactionHistories::where('UserID', $userId)
                                                    ->orderBy('TransactionDate', 'desc')
                                                    ->paginate(15);

        return view('riwayatTransaksi', compact('transactionHistories'));
    }
}