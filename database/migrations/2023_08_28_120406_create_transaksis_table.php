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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id_transaksi', 20)->primary();
            $table->string('nama', 50);
            $table->string('keteragan');
            $table->string('tanggal', 15);
            $table->string('status', 15);
            $table->string('nota');
            $table->string('id_usaha', 20);
            $table->timestamps();

            $table->foreign('id_usaha')->references('id_usaha')->on('usahas')->onDelete('null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
