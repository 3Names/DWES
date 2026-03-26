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
        Schema::create('actores', function (Blueprint $table) {
            $table->id(); // Crea una clau primària autoincremental
            $table->string('nombre'); // Crea un VARCHAR(255) per al títol
            $table->string('dni')->unique(); // VARCHAR únic (restricció de base de dades)
            $table->string('hobby');
            $table->integer('edad'); // Un número decimal (max 8 dígits, 2 decimals)
            $table->timestamps(); // Crea les columnes created_at i updated_at
        });
    }

    /**w
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actores');
    }
};
