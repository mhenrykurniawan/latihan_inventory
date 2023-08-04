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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_supplier');

            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('harga');
            $table->string('foto');
            $table->integer('stok')->default(0);
            $table->timestamps();
            $table->foreign('id_kategori')->references('id')->on('kategori');
            $table->foreign('id_supplier')->references('id')->on('supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
