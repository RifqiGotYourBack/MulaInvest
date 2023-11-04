<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investments extends Model
{
    use HasFactory;

    protected $primaryKey = 'InvestmentID';

    protected $casts = [
        'InvestmentID' => 'string',
    ];
    
    protected $fillable = [
        'InvestmentName', 'InvestmentType', 'InvestmentDescription', 'Available', 'InvestmentPrice', 'MinimumOrder', 'MaximumOrder'
    ];

    // An investment has many assets
    public function assets()
    {
        return $this->hasMany(Asset::class, 'InvestmentID');
    }
}
