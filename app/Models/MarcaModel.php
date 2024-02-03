<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarcaModel extends Model
{
    use HasFactory;

    protected $table = "marcas";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('marcas.*', 'users.name as creado_por_nombre')
            ->join('users', 'users.id', '=', 'marcas.creado_por')
            ->where('marcas.esta_eliminado', '=', 0)
            ->orderBy('marcas.id', 'desc')
            ->paginate(20);
    }

    static function getRecordActive()
    {
        return self::select('marcas.*')
            ->join('users', 'users.id', '=', 'marcas.creado_por')
            ->where('marcas.esta_eliminado', '=', 0)
            ->where('marcas.estado', '=', 0)
            ->orderBy('marcas.nombre', 'asc')
            ->get();
    }
}
