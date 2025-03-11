<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('alumno_asignatura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->constrained()->onDelete('cascade');
            $table->foreignId('asignatura_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Aseguramos que un alumno no pueda inscribirse más de una vez en la misma asignatura
            $table->unique(['alumno_id', 'asignatura_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumno_asignatura');
    }
};