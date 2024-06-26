<?php

namespace App\Models;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

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
    
    static function getRecordActiveInicio()
    {
        return self::select('blog.*')
            ->where('blog.esta_eliminado', '=', 0)
            ->where('blog.estado', '=', 0)
            ->limit(5)
            ->orderBy('blog.id', 'desc')
            ->get();
    }

    static function getBlog($blogcategoria_id = '')
    {
        $return = self::select('blog.*');

        if (!empty(Request::get('buscar'))) {
            $return = $return->where('blog.titulo', 'like', '%' . Request::get('buscar') . '%');
        }
        if (!empty($blogcategoria_id)) {
            $return = $return->where('blog.blogcategoria_id', '=', $blogcategoria_id);
        }

        $return = $return->where('blog.esta_eliminado', '=', 0)
            ->where('blog.estado', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(8);

        return $return;
    }

    static function getPopular()
    {
        $return = self::select('blog.*');

        $return = $return->where('blog.esta_eliminado', '=', 0)
            ->where('blog.estado', '=', 0)
            ->orderBy('blog.total_vistas', 'desc')
            ->limit(6)
            ->get();

        return $return;
    }

    static function getPostRelacionado($blogcategoria_id, $blog_id)
    {
        $return = self::select('blog.*');

        $return = $return->where('blog.esta_eliminado', '=', 0)
            ->where('blog.estado', '=', 0)
            ->where('blog.blogcategoria_id', '=', $blogcategoria_id)
            ->where('blog.id', '!=', $blog_id)
            ->orderBy('blog.total_vistas', 'desc')
            ->limit(6)
            ->get();

        return $return;
    }

    public function getImagen()
    {
        if (!empty($this->nombre_imagen) && file_exists('upload/blog/' . $this->nombre_imagen)) {
            return url('upload/blog/' . $this->nombre_imagen);
        } else {
            return "";
        }
    }

    public function getCategoria()
    {
        return $this->belongsTo(BlogCategoriaModel::class, 'blogcategoria_id');
    }

    public function getComentario()
    {
        return $this->hasMany(BlogComentarioModel::class, 'blog_id')
            ->select('blog_comentarios.*')
            ->join('users', 'users.id', '=', 'blog_comentarios.user_id')
            ->orderBy('blog_comentarios.id', 'desc');
    }

    public function getComentarioCount()
    {
        return $this->hasMany(BlogComentarioModel::class, 'blog_id')
            ->select('blog_comentarios.id')
            ->join('users', 'users.id', '=', 'blog_comentarios.user_id')
            ->count();
    }
}
