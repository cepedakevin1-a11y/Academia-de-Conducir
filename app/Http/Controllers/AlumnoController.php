<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::where('estado', '!=', 'inactivo')->get();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'cedula' => 'required|digits:10|unique:alumnos,cedula',
            'telefono' => 'required|digits_between:7,10',
            'tipo_licencia' => 'required|string',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno registrado correctamente');
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'telefono' => 'required|numeric|digits_between:7,10',
            'tipo_licencia' => 'required|in:A,B,C',
            'estado' => 'required|in:inscrito,clases_teoricas,practicando,aprobo'
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente');
    }


    public function destroy(Alumno $alumno)
    {
        $alumno->update(['estado' => 'inactivo']);

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado (lógico)');
    }
}

