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
        Schema::create('jenis_pendapatans', function (Blueprint $table) {
            $table->string('id_jpendapatan', 20)->primary();
            $table->string('nama', 50);
            $table->string('id_usaha', 20);
            $table->timestamps();

            $table->foreign('id_usaha')->references('id_usaha')->on('usahas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pendapatans');
    }
};
