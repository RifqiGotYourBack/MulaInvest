<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use Illuminate\Support\Facades\DB;
use App\Models\Investments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AssetController extends Controller
{
    public function buyAsset(Request $request, $InvestmentId)
    {
        DB::enableQueryLog();
        $investment = Investments::findOrFail($InvestmentId); // Kalo investment gak ketemu, fail-in aja
    
        // Validasi request (Jaga-jaga jika buyAmount > jumlah stock yang ada)
        $request->validate([
            'BuyAmount' => ['required', 'numeric', 'min:1', 'max:'.$investment->Stock]
        ]);
    
        $userID = auth()->user()->UserID;
    
        $latestPrice = $investment->InvestmentPrice;
        $buyAmount = $request->BuyAmount;
    
        // Validasi stock
        if ($investment->Stock < $buyAmount) {
            return redirect()->back()->with('error', 'Insufficient stock for this investment.');
        }
    
        // Transaksi (Create asset abis itu kurangin stock)
        DB::beginTransaction();
        try {
            $asset = Assets::create([
                'AssetID' => str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT),
                'UserID' => $userID,
                'InvestmentID' => $InvestmentId,
                'BuyAmount' => $buyAmount,
                'BuyPrice' => $latestPrice,
                'AcquisitionDate' => now(),
                'IsActive' => true
            ]);
    
            $investment->decrement('Stock', $buyAmount);
    
            DB::commit();
            Log::info(DB::getQueryLog());
    
            return redirect()->back()->with('success', 'Asset purchased successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
    
            return redirect()->back()->with('error', 'An error occurred while purchasing the asset.');
        }
    }
    


    public function index(Request $request)
    {
        $userID = auth()->user()->UserID;

        $assets = Assets::where('UserID', $userID)
            ->join('investments', 'assets.InvestmentID', '=', 'investments.InvestmentID')
            ->select('assets.*', 'investments.InvestmentName', 'investments.InvestmentPrice as LatestPrice')
            ->get();
  
            $totalBalance = $assets->sum(function ($asset) {
                return $asset->BuyAmount * $asset->LatestPrice;
            });

            return view('aset', ['assets' => $assets, 'totalBalance' => $totalBalance]);
    }
}
