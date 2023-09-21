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
        Schema::create('jbdagangs', function (Blueprint $table) {
            $table->string('id_jualbeli', 20);
            $table->string('id_barang', 20);
            $table->timestamps();

            $table->foreign('id_jualbeli')->references('id_jualbeli')->on('jual_belis')->onDelete('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('barangs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jbdagangs');
    }
};
