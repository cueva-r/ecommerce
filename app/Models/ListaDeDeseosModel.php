<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaDeDeseosModel extends Model
{
    use HasFactory;

    protected $table = 'lista_de_deseos';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function eliminarRecord($producto_id, $user_id)
    {
        self::where('producto_id', '=', $producto_id)->where('user_id', '=', $user_id)->delete();
    }

    static public function revisarExistente($producto_id, $user_id)
    {
        return self::where('producto_id', '=', $producto_id)->where('user_id', '=', $user_id)->count();
    }
}
