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

    static public function getCalificacionProducto($producto_id)
    {
        return self::select('calificacion_productos.*', 'users.name')
            ->join('users', 'users.id', 'calificacion_productos.user_id')
            ->where('calificacion_productos.producto_id', '=', $producto_id)
            ->orderBy('calificacion_productos.id', 'desc')
            ->paginate(20);
    }

    public function getPorcentaje()
    {
        $rating = $this->rating;

        if ($rating == 1) {
            return 20;
        } elseif ($rating == 2) {
            return 40;
        } elseif ($rating == 3) {
            return 60;
        } elseif ($rating == 4) {
            return 80;
        } elseif ($rating == 5) {
            return 100;
        } else {
            return 0;
        }
    }

    static public function getRatingAVG($producto_id)
    {
        return self::select('calificacion_productos.rating')
        ->join('users', 'users.id', 'calificacion_productos.user_id')
        ->where('calificacion_productos.producto_id', '=', $producto_id)
        ->avg('calificacion_productos.rating');
    }
}
