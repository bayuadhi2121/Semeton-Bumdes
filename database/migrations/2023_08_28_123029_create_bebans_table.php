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
        Schema::create('bebans', function (Blueprint $table) {
            $table->string('id_jualbeli', 20);
            $table->string('id_jbiaya', 20);
            $table->timestamps();

            $table->foreign('id_jbiaya')->references('id_jbiaya')->on('jenis_biayas')->onDelete('cascade');
            $table->foreign('id_jualbeli')->references('id_jualbeli')->on('jual_belis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bebans');
    }
};
