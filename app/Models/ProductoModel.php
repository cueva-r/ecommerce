<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    use HasFactory;

    protected $table = "productos";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('productos.*', 'users.name as creado_por_nombre')
            ->join('users', 'users.id', '=', 'productos.creado_por')
            ->where('productos.esta_eliminado', '=', 0)
            ->orderBy('productos.id', 'desc')
            ->paginate(20);
    }

    static function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }

    public function getColor()
    {
        return $this->hasMany(ProductoColorModel::class, "producto_id");
    }

    public function getTamano()
    {
        return $this->hasMany(ProductoTamanoModel::class, "producto_id");
    }

    public function getImagen()
    {
        return $this->hasMany(ProductoImagenModel::class, "producto_id")->orderBy('ordenar_por', 'asc');
    }
}
