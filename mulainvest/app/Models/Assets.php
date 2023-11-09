<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $primaryKey = 'AssetID';

    protected $casts = [
        'InvestmentID' => 'string',
        'UserID' => 'string',
        'AssetID' => 'string',
    ];

    protected $fillable = [
        'AssetID', 'UserID', 'InvestmentID', 'AssetAmount', 'BuyPrice', 'IsActive'
    ];

    // An asset belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    // An asset belongs to an investment
    public function investment()
    {
        return $this->belongsTo(Investments::class, 'InvestmentID');
    }
}
