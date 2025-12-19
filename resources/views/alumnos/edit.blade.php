@extends('layouts.app')

@section('title', 'Editar Alumno')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
             Editar Alumno
        </div>

        <div class="card-body">
            <form action="{{ route('alumnos.update', $alumno) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre completo</label>
                    <input type="text" name="nombre_completo" class="form-control"
                           value="{{ $alumno->nombre_completo }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cédula</label>
                    <input type="text" class="form-control" value="{{ $alumno->cedula }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control"
                           value="{{ $alumno->telefono }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo de licencia</label>
                    <select name="tipo_licencia" class="form-select">
                        <option value="A" {{ $alumno->tipo_licencia == 'A' ? 'selected' : '' }}>A - Motos</option>
                        <option value="B" {{ $alumno->tipo_licencia == 'B' ? 'selected' : '' }}>B - Livianos</option>
                        <option value="C" {{ $alumno->tipo_licencia == 'C' ? 'selected' : '' }}>C - Profesionales</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="inscrito" {{ $alumno->estado == 'inscrito' ? 'selected' : '' }}>Inscrito</option>
                        <option value="clases_teoricas" {{ $alumno->estado == 'clases_teoricas' ? 'selected' : '' }}>Clases Teóricas</option>
                        <option value="practicando" {{ $alumno->estado == 'practicando' ? 'selected' : '' }}>Practicando</option>
                        <option value="aprobo" {{ $alumno->estado == 'aprobo' ? 'selected' : '' }}>Aprobó</option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
                    <button class="btn btn-warning">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
