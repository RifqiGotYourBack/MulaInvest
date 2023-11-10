<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    protected $primaryKey = 'AssetID';

    protected $casts = [
        'InvestmentID' => 'string',
        'UserID' => 'string',
        'AssetID' => 'string',
    ];

    protected $fillable = [
        'AssetID', 'UserID', 'InvestmentID', 'BuyAmount', 'BuyPrice', 'SoldDate', 'IsActive'
    ];

    // An asset belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    // An asset belongs to an investment
    public function investment()
    {
        return $this->belongsTo(Investment::class, 'InvestmentID');
    }
}
