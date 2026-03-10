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
        Schema::create('llibres', function (Blueprint $table) {
            $table->id(); // Crea una clau primària autoincremental
            $table->string('titol'); // Crea un VARCHAR(255) per al títol
            $table->string('isbn')->unique(); // VARCHAR únic (restricció de base de dades)
            $table->integer('pagines'); // Camp numèric per al total de pàgines
            $table->decimal('preu', 8, 2); // Un número decimal (max 8 dígits, 2 decimals)
            $table->timestamps(); // Crea les columnes created_at i updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llibres');
    }
};
