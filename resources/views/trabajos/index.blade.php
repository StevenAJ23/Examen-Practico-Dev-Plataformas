@extends('layouts.app')

@section('titulo', 'Trabajos')

@section('contenido')
<div class="d-flex justify-content-between mb-3">
    <h1>Trabajos de Cerrajería</h1>
    <a href="{{ route('trabajos.create') }}" class="btn btn-primary">
        Nuevo Trabajo
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Dirección</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($trabajos as $trabajo)
            <tr>
                <td>{{ $trabajo->tipo_servicio }}</td>
                <td>{{ $trabajo->direccion }}</td>
                <td>{{ $trabajo->nombre_cliente }}</td>
                <td>{{ $trabajo->telefono }}</td>
                <td>{{ ucfirst($trabajo->estado) }}</td>
                <td>{{ $trabajo->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('trabajos.edit', $trabajo) }}"
                       class="btn btn-sm btn-warning">
                        Editar
                    </a>

                    <form action="{{ route('trabajos.destroy', $trabajo) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Eliminar este trabajo?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">
                    No hay trabajos registrados.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
