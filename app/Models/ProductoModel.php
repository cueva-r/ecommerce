<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

class ProductoModel extends Model
{
    use HasFactory;

    protected $table = "productos";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static public function getMiLIstaDeDeseos($user_id)
    {
        $return = ProductoModel::select('productos.*', 'users.name as creado_por_nombre', 'categorias.nombre as categoria_nombre', 'categorias.slug as categoria_slug', 'subcategorias.nombre as subcategoria_nombre', 'subcategorias.slug as subcategoria_slug')
            ->join('users', 'users.id', '=', 'productos.creado_por')
            ->join('categorias', 'categorias.id', '=', 'productos.categoria_id')
            ->join('subcategorias', 'subcategorias.id', '=', 'productos.subcategoria_id')
            ->join('lista_de_deseos', 'lista_de_deseos.producto_id', '=', 'productos.id')
            ->where('lista_de_deseos.user_id', '=', $user_id)
            ->where('productos.esta_eliminado', '=', 0)
            ->where('productos.estado', '=', 0)
            ->groupBy('productos.id')
            ->orderBy('productos.id', 'desc')
            ->paginate(20);

        return $return;
    }

    static function getRecord()
    {
        return self::select('productos.*', 'users.name as creado_por_nombre')
            ->join('users', 'users.id', '=', 'productos.creado_por')
            ->where('productos.esta_eliminado', '=', 0)
            ->orderBy('productos.id', 'desc')
            ->get();
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

        if (!empty(Request::get('sub_categoria_id'))) {

            $sub_categoria_id = rtrim(Request::get('sub_categoria_id'), ',');
            $sub_categoria_id_array = explode(",", $sub_categoria_id);
            $return = $return->whereIn('productos.subcategoria_id', $sub_categoria_id_array);
        } else {
            if (!empty(Request::get('old_categoria_id'))) {
                $return = $return->where('productos.categoria_id', '=', Request::get('old_categoria_id'));
            }

            if (!empty(Request::get('old_sub_categoria_id'))) {
                $return = $return->where('productos.subcategoria_id', '=', Request::get('old_sub_categoria_id'));
            }
        }

        if (!empty(Request::get('color_id'))) {

            $color_id = rtrim(Request::get('color_id'), ',');
            $color_id_array = explode(",", $color_id);
            $return = $return->join('productos_colores', 'productos_colores.producto_id', '=', 'productos.id');
            $return = $return->whereIn('productos_colores.color_id', $color_id_array);
        }

        if (!empty(Request::get('marca_id'))) {

            $marca_id = rtrim(Request::get('marca_id'), ',');
            $marca_id_array = explode(",", $marca_id);
            $return = $return->whereIn('productos.marca_id', $marca_id_array);
        }

        if (!empty(Request::get('inicio_precio') && !empty(Request::get('fin_precio')))) {
            $inicio_precio = str_replace('S/.', '', Request::get('inicio_precio'));
            $fin_precio = str_replace('S/.', '', Request::get('fin_precio'));

            $return = $return->where('productos.precio', '>=', $inicio_precio);
            $return = $return->where('productos.precio', '<=', $fin_precio);
        }

        if (!empty(Request::get('q'))) {
            $return = $return->where('productos.titulo', 'like', '%' . Request::get('q') . '%');
        }

        $return = $return->where('productos.esta_eliminado', '=', 0)
            ->where('productos.estado', '=', 0)
            ->groupBy('productos.id')
            ->orderBy('productos.id', 'desc')
            ->paginate(20);

        return $return;
    }

    static public function getRelatedProducto($producto_id, $subcategoria_id)
    {
        $return = ProductoModel::select('productos.*', 'users.name as creado_por_nombre', 'categorias.nombre as categoria_nombre', 'categorias.slug as categoria_slug', 'subcategorias.nombre as subcategoria_nombre', 'subcategorias.slug as subcategoria_slug')
            ->join('users', 'users.id', '=', 'productos.creado_por')
            ->join('categorias', 'categorias.id', '=', 'productos.categoria_id')
            ->join('subcategorias', 'subcategorias.id', '=', 'productos.subcategoria_id')
            ->where('productos.id', '!=', $producto_id)
            ->where('productos.subcategoria_id', '=', $subcategoria_id)
            ->where('productos.esta_eliminado', '=', 0)
            ->where('productos.estado', '=', 0)
            ->groupBy('productos.id')
            ->orderBy('productos.id', 'desc')
            ->limit(10)
            ->get();

        return $return;
    }

    static public function getImagenSingle($producto_id)
    {
        return ProductoImagenModel::where('producto_id', '=', $producto_id)
            ->orderBy('ordenar_por', 'asc')
            ->first();
    }

    static function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
            ->where('productos.esta_eliminado', '=', 0)
            ->where('productos.estado', '=', 0)
            ->first();
    }

    static function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }

    static function revisarListaDeDeseos($producto_id)
    {
        return ListaDeDeseosModel::revisarExistente($producto_id, Auth::user()->id);
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

    public function getCategoria()
    {
        return $this->belongsTo(CategoriaModel::class, 'categoria_id');
    }

    public function getSubCategoria()
    {
        return $this->belongsTo(SubCategoriaModel::class, 'subcategoria_id');
    }
}
