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
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('id_barang', 20)->primary();
            $table->string('nama', 50);
            $table->string('status', 15);
            $table->integer('harga')->length(20);
            $table->integer('untung')->length(20);
            $table->integer('stok_min')->length(20);
            $table->integer('stok')->length(20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
