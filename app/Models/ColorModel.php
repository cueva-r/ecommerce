<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorModel extends Model
{
    use HasFactory;

    protected $table = "colores";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('colores.*', 'users.name as creado_por_nombre')
            ->join('users', 'users.id', '=', 'colores.creado_por')
            ->where('colores.esta_eliminado', '=', 0)
            ->orderBy('colores.id', 'desc')
            ->paginate(20);
    }

    static function getRecordActive()
    {
        return self::select('colores.*')
            ->join('users', 'users.id', '=', 'colores.creado_por')
            ->where('colores.esta_eliminado', '=', 0)
            ->where('colores.estado', '=', 0)
            ->orderBy('colores.nombre', 'asc')
            ->get();
    }
}
