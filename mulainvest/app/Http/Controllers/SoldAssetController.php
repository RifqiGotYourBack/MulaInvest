<?php

namespace App\Http\Controllers;

use App\Models\SoldAssets;
use Illuminate\Http\Request;

class SoldAssetController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->UserID;
    
        $soldAssets = SoldAssets::where('UserID', $userId)
                                         ->with(['assets', 'investments'])
                                         ->paginate(10);
    
    
        // Hitung total aset terjual
        $totalSoldValue = $soldAssets->sum(function ($soldAsset) {
            return $soldAsset->SellAmount * $soldAsset->SellPrice;
        });
    
        return view('asetTerjual', [
            'soldAssets' => $soldAssets, 
            'totalSoldValue' => $totalSoldValue
        ]);
    }
    
    
}


