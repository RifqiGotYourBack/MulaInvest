<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\SoldAssets;
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
        $investment = Investments::findOrFail($InvestmentId);
    
        // Validasi request
        $request->validate([
            'BuyAmount' => ['required', 'numeric', 'min:1', 'max:'.$investment->Stock]
        ]);
        
        $user = auth()->user();
        $userID = $user->UserID;
        $userTable = User::findOrFail($userID);
    
        $latestPrice = $investment->InvestmentPrice;
        $buyAmount = $request->BuyAmount;
        $totalCost = $latestPrice * $buyAmount;
        
        // Cek jumlah pembelian
        if ($buyAmount < $investment->MinimumOrder) {
            return redirect()->back()->with('error', 'Pembelian Aset Tidak Memenuhi Minimum Pembelian.');
        }

        // Cek saldo
        if ($userTable->Balance < $totalCost) {
            dd($userTable->Balance);
            return redirect()->back()->with('error', 'Saldo Anda Tidak Mencukupi');
        }
    
        // Cek stock 
        if ($investment->Stock < $buyAmount) {
            return redirect()->back()->with('error', 'Stok Aset Tidak Memenuhi Permintaan');
        }
    
        // Transaction (catat asset dan update saldo user)
        DB::beginTransaction();
        try {
            $existingAsset = Assets::where('UserID', $userID)
                                    ->where('InvestmentID', $InvestmentId)
                                    ->where('BuyPrice', $latestPrice)
                                    ->where('IsActive', true) 
                                    ->first();

            if ($existingAsset) {
                // update jika user sudah punya aset terkait
                $existingAsset->increment('AssetAmount', $buyAmount);
            } else {
                $AssetID = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
                // Buat baru jika blm ada aset terkait
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
                    'TransactionType'=> 'Beli',
                    'TransactionDate' => now()
                ]);
                
                DB::commit();
    
            return redirect()->back()->with('success', 'Pembelian Aset Berhasil.');
        } catch (\Exception $e) {
            DB::rollback();
    
            return redirect()->back()->with('error', 'Error Ketika Membeli Aset.');
        }
    }


    public function sellAsset(Request $request, $AssetID)
    {
        $validatedData = $request->validate([
            'SellAmount' => 'required|numeric|min:1',
        ]);
    
        $sellAmount = $validatedData['SellAmount'];
        
        DB::beginTransaction();
        try {
            $asset = Assets::with('investments')
                     ->where('AssetID', $AssetID)
                     ->where('UserID', auth()->user()->UserID)
                     ->where('IsActive', true)
                     ->firstOrFail();
    
            // validasi jumlah aset
            if ($sellAmount > $asset->AssetAmount) {
                return redirect()->back()->with('error', 'Permintaan melebihi aset yang dimiliki.');
            }
    
            // Total penjualan
            $currentMarketPrice = $asset->investments->InvestmentPrice;
            $totalSaleValue = $sellAmount * $currentMarketPrice;
    
            // Update saldo
            $user = User::findOrFail(auth()->user()->UserID);
            $user->increment('Balance', $totalSaleValue);
    
            SoldAssets::create([
                'SoldAssetID' => str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT),
                'AssetID' => $AssetID,
                'InvestmentID'=>$asset->InvestmentID,
                'UserID' => $user->UserID,
                'SellAmount' => $sellAmount,
                'SellPrice' => $currentMarketPrice,
                'SellDate' => now(),
            ]);
    
            // Pengurangan aset
            if ($sellAmount == $asset->AssetAmount) {
                $asset->update([
                    'AssetAmount' => 0,
                    'IsActive' => false
                ]);
            } else {
                $asset->decrement('AssetAmount', $sellAmount);
            }
    
            // Catat riwayat
            TransactionHistories::create([
                'TransactionID' => str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT),
                'UserID' => $user->UserID,
                'TransactionAmount' => $sellAmount,
                'TransactionValue' => $totalSaleValue,
                'TransactionType' => 'Jual',
                'TransactionDate' => now(),
            ]);
            
            DB::commit();
            return redirect()->back()->with('success', 'Penjualan Aset Berhasil.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error Ketika Menjual Aset: ' . $e->getMessage());
        }
    }
    
    

    public function index(Request $request)
    {
        $userID = auth()->user()->UserID;

        $assets = Assets::where('UserID', $userID)
                        ->where('IsActive', 1) 
                        ->join('investments', 'assets.InvestmentID', '=', 'investments.InvestmentID')
                        ->select('assets.*', 'investments.InvestmentName','investments.InvestmentType', 'investments.InvestmentPrice as LatestPrice')
                        ->paginate(15);
    
        // Total saldo 
        $totalBalance = $assets->sum(function ($asset) {
            return $asset->AssetAmount * $asset->LatestPrice;
        });
    
        // Jumlah aset Pasar Uang
        $pasarUangTotal = Assets::where('UserID', $userID)
                                ->whereHas('investments', function ($query) {
                                    $query->where('InvestmentType', 'Pasar Uang');
                                })
                                ->sum('AssetAmount');

        // Jumlah aset Pasar Uang Obligasi
        $obligasiTotal = Assets::where('UserID', $userID)
                                ->whereHas('investments', function ($query) {
                                    $query->where('InvestmentType', 'Obligasi');
                                })
                                ->sum('AssetAmount'); 

        // Hitung presentase
        $pasarUangPercentage = $totalBalance > 0 ? ($pasarUangTotal / $totalBalance) * 100 : 0;
        $obligasiPercentage = $totalBalance > 0 ? ($obligasiTotal / $totalBalance) * 100 : 0;

        return view('aset', [
            'assets' => $assets,
            'totalBalance' => $totalBalance,
            'pasarUangPercentage' => $pasarUangPercentage,
            'obligasiPercentage' => $obligasiPercentage
        ]);
    }
    
}
