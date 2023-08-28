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
        Schema::create('jual_belis', function (Blueprint $table) {
            $table->string('id_jualbeli', 20)->primary();
            $table->string('id_transaksi', 20);
            $table->integer('total')->length(20);
            $table->integer('kuantitas')->length(20);
            $table->integer('harga')->length(20);
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id_transaksis')->on('transaksis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jual_belis');
    }
};
