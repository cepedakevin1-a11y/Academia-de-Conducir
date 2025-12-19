<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            ALTER TABLE alumnos
            MODIFY estado ENUM(
                'inscrito',
                'clases_teoricas',
                'practicando',
                'aprobo',
                'inactivo'
            ) NOT NULL DEFAULT 'inscrito'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            ALTER TABLE alumnos
            MODIFY estado ENUM(
                'inscrito',
                'clases_teoricas',
                'practicando',
                'aprobo'
            ) NOT NULL DEFAULT 'inscrito'
        ");
    }
};
