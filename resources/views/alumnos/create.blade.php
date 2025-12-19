@extends('layouts.app')

@section('title', 'Nuevo Alumno')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-success text-white">
             Registrar Alumno
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('alumnos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre completo</label>
                    <input type="text" name="nombre_completo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cédula</label>
                    <input type="text" name="cedula" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo de licencia</label>
                    <select name="tipo_licencia" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="A">A - Motos</option>
                        <option value="B">B - Livianos</option>
                        <option value="C">C - Profesionales</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="inscrito">Inscrito</option>
                        <option value="clases_teoricas">Clases Teóricas</option>
                        <option value="practicando">Practicando</option>
                        <option value="aprobo">Aprobó</option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
                    <button class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
