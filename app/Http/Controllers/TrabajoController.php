<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    public function index()
    {
        $trabajos = Trabajo::getTrabajos();
        return view('trabajos.index', compact('trabajos'));
    }

    public function create()
    {
        return view('trabajos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_servicio' => 'required|string|max:100',
            'direccion'     => 'required|string|max:255',

            'nombre_cliente' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
            ],

            'telefono' => [
                'required',
                'regex:/^[0-9]+$/',
                'digits_between:7,10'
            ],

            'estado' => 'required|in:pendiente,en_camino,completado,cobrado'
        ], [
            'nombre_cliente.regex' => 'El nombre solo debe contener letras y espacios.',
            'telefono.regex' => 'El teléfono solo debe contener números.',
            'telefono.digits_between' => 'El teléfono debe tener entre 7 y 10 dígitos.'
        ]);

        // ✅ GUARDADO CORRECTO
        Trabajo::create([
            'tipo_servicio'  => $request->tipo_servicio,
            'direccion'      => $request->direccion,
            'nombre_cliente' => $request->nombre_cliente,
            'telefono'       => $request->telefono,
            'estado'         => $request->estado,
        ]);

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo registrado correctamente.');
    }

    public function edit(Trabajo $trabajo)
    {
        if (in_array($trabajo->estado, ['completado', 'cobrado'])) {
            return redirect()->route('trabajos.index')
                ->with('error', 'No se puede editar un trabajo completado o cobrado.');
        }

        return view('trabajos.edit', compact('trabajo'));
    }

    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate([
            'tipo_servicio' => 'required|string|max:100',
            'direccion'     => 'required|string|max:255',

            'nombre_cliente' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
            ],

            'telefono' => [
                'required',
                'regex:/^[0-9]+$/',
                'digits_between:7,10'
            ],

            'estado' => 'required|in:pendiente,en_camino,completado,cobrado'
        ], [
            'nombre_cliente.regex' => 'El nombre solo debe contener letras y espacios.',
            'telefono.regex' => 'El teléfono solo debe contener números.',
            'telefono.digits_between' => 'El teléfono debe tener entre 7 y 10 dígitos.'
        ]);

        // ✅ ACTUALIZACIÓN CORRECTA
        $trabajo->update([
            'tipo_servicio'  => $request->tipo_servicio,
            'direccion'      => $request->direccion,
            'nombre_cliente' => $request->nombre_cliente,
            'telefono'       => $request->telefono,
            'estado'         => $request->estado,
        ]);

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo actualizado correctamente.');
    }

    public function destroy(Trabajo $trabajo)
    {
        if (in_array($trabajo->estado, ['completado', 'cobrado'])) {
            return redirect()->route('trabajos.index')
                ->with('error', 'No se puede eliminar un trabajo finalizado.');
        }

        $trabajo->delete();

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo eliminado.');
    }
}
