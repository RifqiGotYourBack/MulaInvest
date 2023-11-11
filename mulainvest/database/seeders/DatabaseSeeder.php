<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BankAccounts;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Investments;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'UserID' => 'usr12',
            'Name' => 'User',
            'Email' => 'user@gmail.com',
            'Password' => Hash::make('user123'),
            'NoTelp' => '9876543210',
            'Address' => 'User Address',
            'Role' => 'user',
            'Balance' => 900000,
            'IsActive' => true,
            'IsVerified' => true,
        ]);

        User::create([
            'UserID' => 'usr13',
            'Name' => 'Admin',
            'Email' => 'admin@gmail.com',
            'Password' => Hash::make('admin123'),
            'NoTelp' => '1234567890',
            'Address' => 'Admin Address',
            'Role' => 'admin',
            'IsVerified' => true,
            'IsActive' => true,
        ]);

        Investments::create([
            'InvestmentID' => 'INV132',
            'InvestmentName' => 'Mandiri Investa Pasar Uang',
            'InvestmentType' => 'Pasar Uang',
            'InvestmentDescription' => 'Deskripsi Investasi 1',
            'Stock' => 100,
            'InvestmentPrice' => 1000.00,
            'MinimumOrder' => 10,
            'MaximumOrder' => 50,
        ]);

        Investments::create([
            'InvestmentID' => 'INV456',
            'InvestmentName' => 'BCA Reksa Dana Pasar Uang',
            'InvestmentType' => 'Pasar Uang',
            'InvestmentDescription' => 'Deskripsi Investasi 2',
            'Stock' => 100,
            'InvestmentPrice' => 1500.00,
            'MinimumOrder' => 5,
            'MaximumOrder' => 30,
        ]);

        Investments::create([
            'InvestmentID' => 'INV477',
            'InvestmentName' => 'BCA Reksa Dana Pasar Uang',
            'InvestmentType' => 'Pasar Uang',
            'InvestmentDescription' => 'Deskripsi Investasi 2',
            'Stock' => 100,
            'InvestmentPrice' => 1500.00,
            'MinimumOrder' => 5,
            'MaximumOrder' => 30,
        ]);

        BankAccounts::create([
            'BankAccountID' => 'BNK1',
            'UserID' => 'usr12',
            'BankName' => 'Bank golput',
            'BankAccountNumber' => '01923876',
        ]);
        BankAccounts::create([
            'BankAccountID' => 'BNK2',
            'UserID' => 'usr13',
            'BankName' => 'Bank Ijo',
            'BankAccountNumber' => '01923876',
        ]);
    }
}
