<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $table = 'trabajos';

    protected $fillable = [
        'tipo_servicio',
        'direccion',
        'nombre_cliente',
        'telefono',
        'estado'
    ];

    // Obtener todos los trabajos
    public static function getTrabajos()
    {
        return self::all();
    }

    // Obtener un trabajo por ID
    public static function getTrabajoById($id)
    {
        return self::find($id);
    }

    // Crear un nuevo trabajo
    public static function createTrabajo($data)
    {
        return self::create($data);
    }

    // Actualizar un trabajo existente
    public static function updateTrabajo($id, $data)
    {
        return self::where('id', $id)->update($data);
    }

    // Eliminar un trabajo
    public static function deleteTrabajo(Trabajo $trabajo)
    {
        $trabajo->delete();
    }
}
