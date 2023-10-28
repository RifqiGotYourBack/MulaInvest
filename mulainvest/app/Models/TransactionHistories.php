<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistories extends Model
{
    use HasFactory;

    protected $primaryKey = 'TransactionID';

    protected $fillable = [
        'UserID', 'OrderAmount', 'TransactionValue', 'TransactionDate'
    ];

    // A transaction history entry belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
