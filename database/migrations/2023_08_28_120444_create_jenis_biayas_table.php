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
        Schema::create('jenis_biayas', function (Blueprint $table) {
            $table->string('id_jbiaya', 20)->primary();
            $table->string('id_usaha', 20);
            $table->string('id_akun', 20);
            $table->string('nama', 50);
            $table->timestamps();

            $table->foreign('id_usaha')->references('id_usaha')->on('usahas')->onDelete('cascade');
            $table->foreign('id_akun')->references('id_akun')->on('akuns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_biayas');
    }
};
