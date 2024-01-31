<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoriaModel extends Model
{
    use HasFactory;

    protected $table = "subcategorias";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('subcategorias.*', 'users.name as created_by_name', 'categorias.nombre as category_nombre')
        ->join('categorias', 'categorias.id', '=', 'subcategorias.categoria_id')
        ->join('users', 'users.id', '=', 'subcategorias.created_by')
        ->where('subcategorias.esta_eliminado', '=', 0)
        ->orderBy('subcategorias.id', 'desc')
        ->paginate(20);
    }
}
