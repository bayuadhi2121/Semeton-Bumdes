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
        Schema::create('akuns', function (Blueprint $table) {
            $table->string('id_akun', 20)->primary();
            $table->string('id_usaha', 20);
            $table->string('nama', 50);
            $table->timestamps();


            $table->foreign('id_usaha')->references('id_usaha')->on('usahas')->onDelete('null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akuns');
    }
};
