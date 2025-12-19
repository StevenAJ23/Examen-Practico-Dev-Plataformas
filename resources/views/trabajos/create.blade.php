@extends('layouts.app')

@section('titulo', 'Nuevo Trabajo')

@section('contenido')
<h1>Registrar Trabajo de Cerrajería</h1>

<form action="{{ route('trabajos.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Tipo de Servicio *</label>
        <input type="text" name="tipo_servicio" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Dirección *</label>
        <input type="text" name="direccion" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre del Cliente *</label>
        <input type="text" name="nombre_cliente" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono *</label>
        <input type="text" name="telefono" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Estado *</label>
        <select name="estado" class="form-select" required>
            <option value="pendiente">Pendiente</option>
            <option value="en_camino">En camino</option>
            <option value="completado">Completado</option>
            <option value="cobrado">Cobrado</option>
        </select>
    </div>

    <a href="{{ route('trabajos.index') }}" class="btn btn-secondary">
        Cancelar
    </a>

    <button type="submit" class="btn btn-primary">
        Guardar
    </button>
</form>
@endsection
