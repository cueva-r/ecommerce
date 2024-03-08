<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoDescuentoModel extends Model
{
    use HasFactory;

    protected $table = "codigo_descuento";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('codigo_descuento.*')
            ->where('codigo_descuento.esta_eliminado', '=', 0)
            ->orderBy('codigo_descuento.id', 'desc')
            ->paginate(20);
    }

    static function CheckDescuento($codigo_descuento)
    {
        return self::select('codigo_descuento.*')
            ->where('codigo_descuento.esta_eliminado', '=', 0)
            ->where('codigo_descuento.estado', '=', 0)
            ->where('codigo_descuento.nombre', '=', $codigo_descuento)
            ->where('codigo_descuento.fecha_expiracion', '>=', date('Y-m-d'))
            ->first();
    }
}
