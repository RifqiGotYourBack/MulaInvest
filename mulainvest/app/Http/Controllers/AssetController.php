<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\User;
use App\Models\Investments;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function buyAsset(Request $request, $id)
    {
        $investment = Investments::find($id);

        // Validate input
        $request->validate([
            'BuyAmount' => ['required', 'numeric', 'in_investment_range:' . $investment->MinimumOrder . ',' . $investment->MaximumOrder]
        ]);


        $userID = auth()->user()->UserID;

        if (!$investment) {
            return redirect()->back()->with('error', 'Investment not found.');
        }

        $latestPrice = $investment->InvestmentPrice;

        // Create the asset
        Assets::create([
            'AssetID' => str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT),
            'UserID' => $userID,
            'InvestmentID' => $id,
            'BuyAmount' => $request->BuyAmount,
            'BuyPrice' => $latestPrice,
            'AcquisitionDate' => now(),
            'IsActive' => true
        ]);

        return redirect()->back()->with('success', 'Asset purchased successfully.');
    }


    public function index(Request $request)
    {
        $userID = auth()->user()->UserID;

        $assets = Assets::where('UserID', $userID)
            ->join('investments', 'assets.InvestmentID', '=', 'investments.InvestmentID')
            ->select('assets.InvestmentID', 'investments.InvestmentName', 'assets.BuyAmount', 'assets.BuyPrice', 'investments.InvestmentPrice as LatestPrice')
            ->get();

        return view('assets.index', compact('assets'));
    }
}
