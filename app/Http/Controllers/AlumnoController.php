<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'cedula' => 'required|unique:alumnos',
            'telefono' => 'required',
            'tipo_licencia' => 'required'
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'telefono' => 'required',
            'tipo_licencia' => 'required'
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->update([
            'estado' => 'inactivo'
        ]);

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno marcado como inactivo');
    }

}
