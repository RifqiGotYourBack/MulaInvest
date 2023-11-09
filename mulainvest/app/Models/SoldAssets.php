<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldAssets extends Model
{
    public $timestamps = false;

    use HasFactory;

    use HasFactory;

    protected $table = 'sold_assets';

    protected $primaryKey = 'SoldAssetID';
    
    protected $casts = [
        'SoldAssetID' => 'string',
        'AssetID' => 'string',
        'InvestmentID' => 'string',
        'UserID' => 'string',
    ];

    protected $fillable = [
        'AssetID',
        'InvestmentID',
        'UserID',
        'SellAmount',
        'SellPrice',
        'SaleDate',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'AssetID', 'AssetID');
    }

    public function investment()
    {
        return $this->belongsTo(Investment::class, 'InvestmentID', 'InvestmentID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }
}
