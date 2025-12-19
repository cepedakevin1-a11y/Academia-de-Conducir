<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $fillable = [
        'nombre_completo',
        'cedula',
        'telefono',
        'tipo_licencia',
        'estado'
    ];
}
