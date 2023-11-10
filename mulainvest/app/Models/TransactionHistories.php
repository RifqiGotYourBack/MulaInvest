<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistories extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $primaryKey = 'TransactionID';

    protected $casts = [
        'UserID' => 'string',
    ];

    protected $fillable = [
        'TransactionID','UserID', 'TransactionAmount', 'TransactionValue','TransactionType', 'TransactionDate'
    ];

    // A transaction history entry belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
