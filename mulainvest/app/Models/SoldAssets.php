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
        'SoldAssetID',
        'AssetID',
        'InvestmentID',
        'UserID',
        'SellAmount',
        'SellPrice',
        'SaleDate',
    ];

    public function assets()
    {
        return $this->belongsTo(Assets::class, 'AssetID', 'AssetID');
    }

    public function investments()
    {
        return $this->belongsTo(Investments::class, 'InvestmentID', 'InvestmentID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }

    public function getMarginAttribute()
    {
        if ($this->BuyPrice && $this->SellPrice) {
            $difference = $this->SellPrice - $this->BuyPrice;
            $margin = ($difference / $this->BuyPrice) * 100;
            return round($margin, 2);
        }
        return 0;
    }
}
