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
        Schema::create('_keranjang', function (Blueprint $table) {
            $table->id('ID_Keranjang');  // Primary key
            $table->unsignedBigInteger('ID_User');  // Foreign key to users
            $table->unsignedBigInteger('ID_Produk');  // Foreign key to products
            $table->integer('Jumlah');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ID_Produk')->references('ID_Produk')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_keranjang');
    }
};
