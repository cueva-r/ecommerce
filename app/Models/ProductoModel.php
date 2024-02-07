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

    static function getProducto($categoria_id = '', $subcategoria_id = '')
    {
        $return = ProductoModel::select('productos.*', 'users.name as creado_por_nombre', 'categorias.nombre as categoria_nombre', 'categorias.slug as categoria_slug', 'subcategorias.nombre as subcategoria_nombre', 'subcategorias.slug as subcategoria_slug')
            ->join('users', 'users.id', '=', 'productos.creado_por')
            ->join('categorias', 'categorias.id', '=', 'productos.categoria_id')
            ->join('subcategorias', 'subcategorias.id', '=', 'productos.subcategoria_id');

        if (!empty($categoria_id)) {
            $return = $return->where('productos.categoria_id', '=', $categoria_id);
        }

        if (!empty($subcategoria_id)) {
            $return = $return->where('productos.subcategoria_id', '=', $subcategoria_id);
        }

        $return = $return->where('productos.esta_eliminado', '=', 0)

            ->where('productos.estado', '=', 0)
            ->orderBy('productos.id', 'desc')
            ->paginate(20);

        return $return;
    }

    static public function getImagenSingle($producto_id)
    {
        return ProductoImagenModel::where('producto_id', '=', $producto_id)
        ->orderBy('ordenar_por', 'asc')
        ->first();
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
