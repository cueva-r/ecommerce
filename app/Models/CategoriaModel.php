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

    static function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
            ->where('categorias.esta_eliminado', '=', 0)
            ->where('categorias.estado', '=', 0)
            ->first();
    }

    static function getRecord()
    {
        return self::select('categorias.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'categorias.created_by')
            //->where('categorias.esta_eliminado', '=', 0)
            ->orderBy('categorias.id', 'desc')
            ->get();
    }

    static function getRecordActive()
    {
        return self::select('categorias.*')
            ->join('users', 'users.id', '=', 'categorias.created_by')
            ->where('categorias.esta_eliminado', '=', 0)
            ->where('categorias.estado', '=', 0)
            ->orderBy('categorias.nombre', 'asc')
            ->get();
    }

    static function getRecordActiveInicio()
    {
        return self::select('categorias.*')
            ->join('users', 'users.id', '=', 'categorias.created_by')
            ->where('categorias.esta_inicio', '=', 1)
            ->where('categorias.esta_eliminado', '=', 0)
            ->where('categorias.estado', '=', 0)
            ->orderBy('categorias.id', 'asc')
            ->get();
    }

    static function getRecordMenu()
    {
        return self::select('categorias.*')
            ->join('users', 'users.id', '=', 'categorias.created_by')
            ->where('categorias.esta_eliminado', '=', 0)
            ->where('categorias.estado', '=', 0)
            ->get();
    }

    static function getRecordMenuHeader()
    {
        return self::select('categorias.*')
            ->join('users', 'users.id', '=', 'categorias.created_by')
            ->where('categorias.esta_eliminado', '=', 0)
            ->where('categorias.estado', '=', 0)
            ->where('categorias.esta_menu', '=', 1)
            ->limit(3)
            ->get();
    }

    public function getSubcategoria()
    {
        return $this->hasMany(SubCategoriaModel::class, "categoria_id")
            ->where('subcategorias.estado', '=', 0)
            ->where('subcategorias.esta_eliminado', '=', 0);
    }

    public function getImagen()
    {
        if (!empty($this->nombre_imagen) && file_exists('upload/categorias/' . $this->nombre_imagen)) {
            return url('upload/categorias/' . $this->nombre_imagen);
        } else {
            return "";
        }
    }
}
