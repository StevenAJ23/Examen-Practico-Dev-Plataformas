<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    // Mostrar listado de trabajos
    public function index()
    {
        $trabajos = Trabajo::getTrabajos();
        return view('trabajos.index', compact('trabajos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('trabajos.create');
    }

    // Guardar nuevo trabajo
    public function store(Request $request)
    {
        $request->validate([
            'tipo_servicio'   => 'required',
            'direccion'       => 'required',
            'nombre_cliente'  => 'required',
            'telefono'        => 'required',
            'estado'          => 'required'
        ]);

        Trabajo::createTrabajo($request->all());

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo registrado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Trabajo $trabajo)
    {
        return view('trabajos.edit', compact('trabajo'));
    }

    // Actualizar trabajo existente
    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate([
            'tipo_servicio'   => 'required',
            'direccion'       => 'required',
            'nombre_cliente'  => 'required',
            'telefono'        => 'required',
            'estado'          => 'required'
        ]);

        $trabajo->update($request->all());

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo actualizado correctamente.');
    }

    // Eliminar trabajo
    public function destroy(Trabajo $trabajo)
    {
        // Recomendación del sistema:
        // No eliminar trabajos completados o cobrados (facturación)
        if (in_array($trabajo->estado, ['completado', 'cobrado'])) {
            return redirect()->route('trabajos.index')
                ->with('error', 'No se puede eliminar un trabajo finalizado.');
        }

        $trabajo->delete();

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo eliminado.');
    }
}
