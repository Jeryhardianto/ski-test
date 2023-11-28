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
        Schema::create('tbl_detail_beli', function (Blueprint $table) {
            $table->id();
            $table->string('notransaksi', 10);
            $table->string('kode_barang', 10);
            $table->integer('harga_beli');
            $table->integer('qty');
            $table->integer('diskon');
            $table->integer('diskon_rp');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_detail_beli');
    }
};