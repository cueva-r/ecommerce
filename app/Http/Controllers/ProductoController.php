<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\SubCategoriaModel;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function getCategoria($slug, $subslug = '')
    {
        $getCategoria = CategoriaModel::getSingleSlug($slug);
        $getSubCategoria = SubCategoriaModel::getSingleSlug($subslug);

        if (!empty($getCategoria) && !empty($getSubCategoria)) {
            $data['meta_titulo'] = $getSubCategoria->meta_titulo;
            $data['meta_descripcion'] = $getSubCategoria->meta_descripcion;
            $data['meta_p_clave'] = $getSubCategoria->meta_p_clave;

            $data['getSubCategoria'] = $getSubCategoria;
            $data['getCategoria'] = $getCategoria;
            return view('productos.listar', $data);
        } else if (!empty($getCategoria)) {
            $data['meta_titulo'] = $getCategoria->meta_titulo;
            $data['meta_descripcion'] = $getCategoria->meta_descripcion;
            $data['meta_p_clave'] = $getCategoria->meta_p_clave;

            $data['getCategoria'] = $getCategoria;
            return view('productos.listar', $data);
        } else {
            abort(404);
        }
    }
}
