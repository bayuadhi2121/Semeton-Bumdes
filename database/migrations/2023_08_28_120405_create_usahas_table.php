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
        Schema::create('usahas', function (Blueprint $table) {
            $table->string('id_usaha', 20)->primary();
            $table->string('status', 15);
            $table->string('nama', 50);
            $table->string('id_person', 20)->nullable();
            $table->timestamps();
            $table->foreign('id_person')->references('id_person')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usahas');
    }
};
