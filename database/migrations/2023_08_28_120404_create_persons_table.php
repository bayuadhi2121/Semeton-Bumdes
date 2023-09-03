<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->String('id_person', 20)->primary();
            $table->String('nama', 50);
            $table->String('username')->unique();
            $table->String('password')->default(Hash::make('123456789'));
            $table->String('alamat')->nullable();
            $table->String('kontak', 15)->nullable();
            $table->String('status', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
