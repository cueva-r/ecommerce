<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;

class CalificacionProductoModel extends Model
{
    use HasFactory;

    protected $table = "calificacion_productos";

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getCalificacion($producto_id, $pedido_id, $user_id)
    {
        return self::select('*')
            ->where('producto_id', '=', $producto_id)
            ->where('pedido_id', '=', $pedido_id)
            ->where('user_id', '=', $user_id)
            ->first();
    }
}
