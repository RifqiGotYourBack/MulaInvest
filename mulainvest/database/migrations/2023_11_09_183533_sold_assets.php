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
            $table->id('SoldAssetID');
            $table->unsignedBigInteger('AssetID')->references('AssetID')->on('assets')->onDelete('cascade');
            $table->unsignedBigInteger('InvestmentID')->references('InvestmentID')->on('investments')->onDelete('cascade');
            $table->unsignedBigInteger('UserID')->references('UserID')->on('users')->onDelete('cascade');
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
