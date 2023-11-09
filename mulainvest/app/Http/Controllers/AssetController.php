<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use Illuminate\Support\Facades\DB;
use App\Models\Investments;
use App\Models\TransactionHistories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AssetController extends Controller
{
    public function buyAsset(Request $request, $InvestmentId)
    {
        DB::enableQueryLog();
        $investment = Investments::findOrFail($InvestmentId); // If the investment is not found, fail
    
        // Validate the request (To make sure buyAmount does not exceed available stock)
        $request->validate([
            'BuyAmount' => ['required', 'numeric', 'min:1', 'max:'.$investment->Stock]
        ]);
        
        $user = auth()->user();
        $userID = $user->UserID;
        $userTable = User::findOrFail($userID);
    
        $latestPrice = $investment->InvestmentPrice;
        $buyAmount = $request->BuyAmount;
        $totalCost = $latestPrice * $buyAmount;
    
        // Check if user has enough balance
        if ($userTable->Balance < $totalCost) {
            dd($userTable->Balance);
            return redirect()->back()->with('error', 'Insufficient balance to purchase this amount of assets.');
        }
    
        // Check stock availability
        if ($investment->Stock < $buyAmount) {
            return redirect()->back()->with('error', 'Insufficient stock for this investment.');
        }
    
        // Transaction (Create asset then reduce stock and user balance)
        DB::beginTransaction();
        try {
            Assets::create([
                'AssetID' => str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT),
                'UserID' => $userID,
                'InvestmentID' => $InvestmentId,
                'BuyAmount' => $buyAmount,
                'BuyPrice' => $latestPrice,
                'IsActive' => true
            ]);
    
            // Decrement investment stock
            $investment->decrement('Stock', $buyAmount);
    
            // Decrement user balance
            $userTable->decrement('Balance', $totalCost);

            // Record Transaction
            TransactionHistories::create([
                'TransactionID' => str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT),
                'UserID' => $userID, 
                'TransactionAmount' => $buyAmount, 
                'TransactionValue' => $totalCost, 
                'TransactionType'=> 'buy',
                'TransactionDate' => now()
            ]);
            
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
