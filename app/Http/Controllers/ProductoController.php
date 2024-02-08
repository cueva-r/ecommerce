<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\ColorModel;
use App\Models\MarcaModel;
use App\Models\ProductoModel;
use App\Models\SubCategoriaModel;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function getCategoria($slug, $subslug = '')
    {
        $getCategoria = CategoriaModel::getSingleSlug($slug);
        $getSubCategoria = SubCategoriaModel::getSingleSlug($subslug);

        $data['getColor'] = ColorModel::getRecordActive();
        $data['getMarca'] = MarcaModel::getRecordActive();

        if (!empty($getCategoria) && !empty($getSubCategoria)) {
            $data['meta_titulo'] = $getSubCategoria->meta_titulo;
            $data['meta_descripcion'] = $getSubCategoria->meta_descripcion;
            $data['meta_p_clave'] = $getSubCategoria->meta_p_clave;

            $data['getSubCategoria'] = $getSubCategoria;
            $data['getCategoria'] = $getCategoria;

            $data['getProducto'] = ProductoModel::getProducto($getCategoria->id, $getSubCategoria->id);

            $data['getSubcategoriaFiltro'] = SubCategoriaModel::getRecordSubCategoria($getCategoria->id);

            return view('productos.listar', $data);
        } else if (!empty($getCategoria)) {
            $data['getSubcategoriaFiltro'] = SubCategoriaModel::getRecordSubCategoria($getCategoria->id);

            $data['meta_titulo'] = $getCategoria->meta_titulo;
            $data['meta_descripcion'] = $getCategoria->meta_descripcion;
            $data['meta_p_clave'] = $getCategoria->meta_p_clave;

            $data['getCategoria'] = $getCategoria;

            $data['getProducto'] = ProductoModel::getProducto($getCategoria->id);

            return view('productos.listar', $data);
        } else {
            abort(404);
        }
    }
}
