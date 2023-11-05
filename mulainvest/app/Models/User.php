<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';

    protected $primaryKey = 'UserID';

    protected $casts = [
        'UserID' => 'string',
    ];

    protected $fillable = [
        'Name', 'Email', 'Password', 'NoTelepon', 'Address', 'Balance', 'Role', 'IsActive'
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
