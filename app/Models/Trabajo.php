<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajo extends Model
{
    use SoftDeletes;

    protected $table = 'trabajos';

    protected $fillable = [
        'tipo_servicio',
        'direccion',
        'nombre_cliente',
        'telefono',
        'estado'
    ];

    // Obtener todos los trabajos (solo activos)
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

    // Eliminar un trabajo (SOFT DELETE)
    public static function deleteTrabajo(Trabajo $trabajo)
    {
        $trabajo->delete();
    }
}
