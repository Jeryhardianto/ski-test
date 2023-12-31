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
        Schema::create('tbl_hutang', function (Blueprint $table) {
            $table->id();
            $table->string('notransaksi', 10);
            $table->string('kode_supplier', 10);
            $table->dateTime('tanggal_beli');
            $table->integer('total_hutang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hutang');
    }
};
