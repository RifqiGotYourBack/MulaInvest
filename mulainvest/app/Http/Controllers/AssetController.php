<?php
namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Investments;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function buyAsset(Request $request)
    {
        // Validate input
        $request->validate([
            'UserID' => 'required|exists:users,UserID',
            'InvestmentID' => 'required|exists:investments,InvestmentID',
            'BuyAmount' => 'required|numeric|min:1'
        ]);

        // Fetch the latest investment price
        $investment = Investments::find($request->InvestmentID);
        $latestPrice = $investment->InvestmentPrice;

        // Create the asset
        Assets::create([
            'UserID' => $request->UserID,
            'InvestmentID' => $request->InvestmentID,
            'BuyAmount' => $request->BuyAmount,
            'BuyPrice' => $latestPrice,
            'AcquisitionDate' => now(),
            'IsActive' => true
        ]);

        return response()->json(['message' => 'Investment purchased successfully!']);
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
