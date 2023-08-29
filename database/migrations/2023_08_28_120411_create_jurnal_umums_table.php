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
        Schema::create('jurnal_umums', function (Blueprint $table) {
            $table->String('id_jumum', 20)->primary();
            $table->integer('kredit')->nullable();
            $table->integer('debit')->nullable();
            $table->String('id_akun', 20);
            $table->String('id_transaksi', 15);
            $table->timestamps();

            $table->foreign('id_akun')->references('id_akun')->on('akuns');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_umums');
    }
};
