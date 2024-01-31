<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    use HasFactory;

    protected $table = "categorias";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('categorias.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=', 'categorias.created_by')
        ->where('categorias.esta_eliminado', '=', 0)
        ->orderBy('categorias.id', 'desc')
        ->paginate(20);
    }
}
