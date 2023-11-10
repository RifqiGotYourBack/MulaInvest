<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('sold_assets', function (Blueprint $table) {
            $table->string('SoldAssetID')->unique()->primary();
            $table->string('AssetID');
            $table->foreign('AssetID')->references('AssetID')->on('assets')->onDelete('cascade');
            $table->string('InvestmentID');
            $table->foreign('InvestmentID')->references('InvestmentID')->on('investments')->onDelete('cascade');
            $table->string('UserID');
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
            $table->integer('SellAmount');
            $table->decimal('SellPrice', 10, 2);
            $table->timestamp('SellDate')->useCurrent();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
