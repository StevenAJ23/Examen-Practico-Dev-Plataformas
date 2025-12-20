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

    public static function getTrabajos()
    {
        return self::all();
    }

    
    public static function getTrabajoById($id)
    {
        return self::find($id);
    }

    
    public static function createTrabajo($data)
    {
        return self::create($data);
    }

    public static function updateTrabajo($id, $data)
    {
        return self::where('id', $id)->update($data);
    }

    
    public static function deleteTrabajo(Trabajo $trabajo)
    {
        $trabajo->delete();
    }
}
