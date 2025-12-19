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
            $table->string('nombre_completo');
            $table->string('cedula')->unique();
            $table->string('telefono');
            $table->string('tipo_licencia');
            $table->enum('estado', [
                'inscrito',
                'clases_teoricas',
                'practicando',
                'aprobo'
            ])->default('inscrito');
            $table->timestamp('fecha_inscripcion')->useCurrent();
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
