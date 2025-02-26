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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('edad');
            $table->text('direccion');
            $table->string('email')->unique();
            $table->string('telefono')->nullable(); // Esto permite que la columna 'telefono' sea NULL;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
/* public function down()
{
    Schema::table('alumnos', function (Blueprint $table) {
        $table->string('telefono')->nullable(false)->change(); // Si necesitas revertir la migración
    });
}
     */