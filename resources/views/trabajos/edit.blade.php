@extends('layouts.app')

@section('titulo', 'Editar Trabajo')

@section('contenido')
<h1>Editar Trabajo de Cerrajería</h1>

<form action="{{ route('trabajos.update', $trabajo) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Tipo de Servicio *</label>
        <input type="text"
               name="tipo_servicio"
               class="form-control"
               value="{{ $trabajo->tipo_servicio }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Dirección *</label>
        <input type="text"
               name="direccion"
               class="form-control"
               value="{{ $trabajo->direccion }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre del Cliente *</label>
        <input type="text"
               name="nombre_cliente"
               class="form-control"
               value="{{ $trabajo->nombre_cliente }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono *</label>
        <input type="text"
               name="telefono"
               class="form-control"
               value="{{ $trabajo->telefono }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Estado *</label>
        <select name="estado" class="form-select" required>
            <option value="pendiente"
                {{ $trabajo->estado == 'pendiente' ? 'selected' : '' }}>
                Pendiente
            </option>
            <option value="en_camino"
                {{ $trabajo->estado == 'en_camino' ? 'selected' : '' }}>
                En camino
            </option>
            <option value="completado"
                {{ $trabajo->estado == 'completado' ? 'selected' : '' }}>
                Completado
            </option>
            <option value="cobrado"
                {{ $trabajo->estado == 'cobrado' ? 'selected' : '' }}>
                Cobrado
            </option>
        </select>
    </div>

    <a href="{{ route('trabajos.index') }}" class="btn btn-secondary">
        Cancelar
    </a>

    <button type="submit" class="btn btn-primary">
        Actualizar
    </button>
</form>
@endsection
