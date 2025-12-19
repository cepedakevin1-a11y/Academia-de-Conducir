@extends('layouts.app')

@section('title', 'Listado de Alumnos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold"> Alumnos Registrados</h4>
        <a href="{{ route('alumnos.create') }}" class="btn btn-success">
             Nuevo Alumno
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary text-center">
            <tr>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>Licencia</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->nombre_completo }}</td>
                    <td>{{ $alumno->cedula }}</td>
                    <td>{{ $alumno->telefono }}</td>
                    <td>{{ $alumno->tipo_licencia }}</td>
                    <td class="text-center">
                <span class="badge bg-info text-dark">
                    {{ $alumno->estado }}
                </span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('alumnos.edit', $alumno) }}"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        @if($alumno->estado !== 'inactivo')
                            <form action="{{ route('alumnos.destroy', $alumno) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Está seguro de marcar este alumno como inactivo?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    Inactivar
                                </button>
                            </form>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
