<?php

namespace App\Http\Controllers;

use App\Models\SoldAssets;
use Illuminate\Http\Request;

class SoldAssetController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->UserID;
    
        // Get paginated sold assets
        $soldAssets = SoldAssets::where('UserID', $userId)
                                         ->with(['assets', 'investments'])
                                         ->paginate(10);
    
    
        // Calculate the total value of sold assets for the paginated results
        $totalSoldValue = $soldAssets->sum(function ($soldAsset) {
            return $soldAsset->SellAmount * $soldAsset->SellPrice;
        });
    
        return view('asetTerjual', [
            'soldAssets' => $soldAssets, // Pass the paginated result directly
            'totalSoldValue' => $totalSoldValue
        ]);
    }
    
    
}


