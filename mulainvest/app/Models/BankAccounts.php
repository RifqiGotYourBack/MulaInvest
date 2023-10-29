<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use HasFactory;

    protected $primaryKey = 'BankAccountID';

    protected $fillable = [
        'UserID', 'BankName', 'BankAccountNumber', 'Address'
    ];
}
