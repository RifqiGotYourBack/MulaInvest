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
        Schema::create('assets', function (Blueprint $table) {
            $table->string('AssetID')->unique()->primary();
            $table->string('UserID');
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
            $table->string('InvestmentID');
            $table->foreign('InvestmentID')->references('InvestmentID')->on('investments')->onDelete('cascade');
            $table->decimal('BuyPrice', 10, 2);
            $table->integer('AssetAmount');
            $table->boolean('IsActive');
            $table->timestamp('AcquisitionDate');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
