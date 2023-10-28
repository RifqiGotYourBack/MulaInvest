<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    protected $primaryKey = 'AssetID';

    protected $fillable = [
        'UserID', 'InvestmentID', 'BuyValue', 'AcquisitionDate', 'SoldDate', 'IsActive'
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
