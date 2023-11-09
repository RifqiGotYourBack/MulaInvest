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
        dd($request->all());
        DB::enableQueryLog(); //Log doang ini mah
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
        // Check if the user already has this specific investment
        $existingAsset = Assets::where('UserID', $userID)
                                ->where('InvestmentID', $InvestmentId)
                                ->where('IsActive', true) // Assuming you want to update only active assets
                                ->first();

        if ($existingAsset) {
            // User already has this investment, so just update the amount
            $existingAsset->increment('AssetAmount', $buyAmount);
        } else {
            $AssetID = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
            // User doesn't have this investment, create a new asset
            Assets::create([
                'AssetID' => $AssetID,
                'UserID' => $userID,
                'InvestmentID' => $InvestmentId,
                'AssetAmount' => $buyAmount,
                'BuyPrice' => $latestPrice,
                'AcquisitionDate' => now(),
                'IsActive' => true
            ]);
        }
    
            $investment->decrement('Stock', $buyAmount);
    
            $userTable->decrement('Balance', $totalCost);

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
    
            return redirect()->back()->with('error', 'An error occurred while purchasing the asset.');
        }
    }


    public function sellAsset(Request $request, $assetId)
    {
        dd($request->assetId);
        return redirect()->back()->with('success', 'Asset sold successfully.');
    }
    

    public function index(Request $request)
    {
        $userID = auth()->user()->UserID;

        $assets = Assets::where('UserID', $userID)
                        ->where('IsActive', 1) 
                        ->join('investments', 'assets.InvestmentID', '=', 'investments.InvestmentID')
                        ->select('assets.*', 'investments.InvestmentName', 'investments.InvestmentPrice as LatestPrice')
                        ->get();
    
        // Total balance 
        $totalBalance = $assets->sum(function ($asset) {
            return $asset->AssetAmount * $asset->LatestPrice;
        });
    
        return view('aset', ['assets' => $assets, 'totalBalance' => $totalBalance]);
    }
    
}
