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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id('ID_Detail');  // Primary key
            $table->unsignedBigInteger('ID_Transaksi');  // Foreign key to transaksi
            $table->unsignedBigInteger('ID_Produk');  // Foreign key to products
            $table->integer('Jumlah');
            $table->decimal('Subtotal', 10, 2);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('ID_Transaksi')->references('ID_Transaksi')->on('transaksi')->onDelete('cascade');
            $table->foreign('ID_Produk')->references('ID_Produk')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
