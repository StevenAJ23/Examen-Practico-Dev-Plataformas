@extends('layouts.app')

@section('titulo', 'Nuevo Trabajo')

@section('contenido')
<h1>Registrar Trabajo de Cerrajería</h1>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('trabajos.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Tipo de Servicio *</label>
        <input
            type="text"
            name="tipo_servicio"
            class="form-control"
            value="{{ old('tipo_servicio') }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Dirección *</label>
        <input
            type="text"
            name="direccion"
            class="form-control"
            value="{{ old('direccion') }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre del Cliente *</label>
        <input
            type="text"
            name="nombre_cliente"
            class="form-control"
            value="{{ old('nombre_cliente') }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono *</label>
        <input
            type="text"
            name="telefono"
            class="form-control"
            value="{{ old('telefono') }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Estado *</label>
        <select name="estado" class="form-select" required>
            <option value="">Seleccione...</option>
            <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="en_camino" {{ old('estado') == 'en_camino' ? 'selected' : '' }}>En camino</option>
            <option value="completado" {{ old('estado') == 'completado' ? 'selected' : '' }}>Completado</option>
            <option value="cobrado" {{ old('estado') == 'cobrado' ? 'selected' : '' }}>Cobrado</option>
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

