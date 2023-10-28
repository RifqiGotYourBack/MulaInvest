<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'UserID';

    protected $fillable = [
        'Name', 'Email', 'Password', 'NoTelepon', 'Balance', 'Role', 'IsActive'
    ];

    // A user has many assets
    public function assets()
    {
        return $this->hasMany(Asset::class, 'UserID');
    }

    // A user has many transaction histories
    public function transactionHistories()
    {
        return $this->hasMany(TransactionHistory::class, 'UserID');
    }
}
