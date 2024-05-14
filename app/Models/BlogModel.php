<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = "blog";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
        ->where('blog.esta_eliminado', '=', 0)
        ->where('blog.estado', '=', 0)
        ->first();
    }

    static function getRecord()
    {
        return self::select('blog.*')
        ->where('blog.esta_eliminado', '=', 0)
        ->orderBy('blog.id', 'desc')
        ->get();
    }

    static function getRecordActive()
    {
        return self::select('blog.*')
        ->where('blog.esta_eliminado', '=', 0)
        ->where('blog.estado', '=', 0)
        ->orderBy('blog.nombre', 'asc')
        ->get();
    }

    public function getImagen()
    {
        if (!empty($this->nombre_imagen) && file_exists('upload/blog/' . $this->nombre_imagen)) {
            return url('upload/blog/' . $this->nombre_imagen);
        } else {
            return "";
        }
    }
}