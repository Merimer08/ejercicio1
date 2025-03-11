<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('signaturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesor_id')->unique()->constrained('profesores')->onDelete('cascade');
            $table->string('imagen_firma')->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('signaturas');
    }
};