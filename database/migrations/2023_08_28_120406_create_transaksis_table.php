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
            $table->string('keterangan')->nullable();
            $table->timestamp('tanggal');
            $table->string('status', 15)->nullable();
            $table->string('nota')->nullable();
            $table->string('id_usaha', 20);
            $table->timestamps();

            $table->foreign('id_usaha')->references('id_usaha')->on('usahas');
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
