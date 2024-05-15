<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategoriaModel extends Model
{
    use HasFactory;

    protected $table = "blog_categoria";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
        ->where('blog_categoria.esta_eliminado', '=', 0)
        ->where('blog_categoria.estado', '=', 0)
        ->first();
    }

    static function getRecord()
    {
        return self::select('blog_categoria.*')
        ->where('blog_categoria.esta_eliminado', '=', 0)
        ->orderBy('blog_categoria.id', 'desc')
        ->get();
    }

    static function getRecordActive()
    {
        return self::select('blog_categoria.*')
        ->where('blog_categoria.esta_eliminado', '=', 0)
        ->where('blog_categoria.estado', '=', 0)
        ->orderBy('blog_categoria.nombre', 'asc')
        ->get();
    }

    static function getRecordActiveInicio()
    {
        return self::select('blog_categoria.*')
        ->where('blog_categoria.esta_inicio', '=', 1)
        ->where('blog_categoria.esta_eliminado', '=', 0)
        ->where('blog_categoria.estado', '=', 0)
        ->orderBy('blog_categoria.id', 'asc')
        ->get();
    }

    public function getBlogCount()
    {
        return $this->hasMany(BlogModel::class, 'blogcategoria_id')
        ->where('blog.esta_eliminado', '=', 0)
        ->where('blog.estado', '=', 0)
        ->count();
    }
}
