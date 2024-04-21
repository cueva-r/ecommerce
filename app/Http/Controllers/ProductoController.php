<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\ColorModel;
use App\Models\MarcaModel;
use App\Models\ProductoModel;
use App\Models\SubCategoriaModel;
use Illuminate\Http\Request;
use Auth;

class ProductoController extends Controller
{
    public function mi_lista_de_deseos()
    {
        $data['meta_titulo'] = 'Mi lista de deseos';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        $data['getProducto'] = ProductoModel::getMiLIstaDeDeseos(Auth::user()->id);

        return view('productos.mi_lista_de_deseos', $data);
    }

    public function getProductoBuscar(Request $request)
    {
        $data['meta_titulo'] = 'Buscar';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        $getProducto = ProductoModel::getProducto();

        $page = 0;
        if (!empty($getProducto->nextPageUrl())) {
            $parse_url = parse_url($getProducto->nextPageUrl());
            if (!empty($parse_url['query'])) {
                parse_str($parse_url['query'], $get_array);
                $page = !empty($get_array['page']) ? $get_array['page'] : 0;
            }
        }
        $data['page'] = $page;
        $data['getProducto'] = $getProducto;
        
        $data['getColor'] = ColorModel::getRecordActive();
        $data['getMarca'] = MarcaModel::getRecordActive();
        return view('productos.listar', $data);
    }

    public function getCategoria($slug, $subslug = '')
    {
        $getProductoSingle = ProductoModel::getSingleSlug($slug);

        $getCategoria = CategoriaModel::getSingleSlug($slug);
        $getSubCategoria = SubCategoriaModel::getSingleSlug($subslug);

        $data['getColor'] = ColorModel::getRecordActive();
        $data['getMarca'] = MarcaModel::getRecordActive();

        if (!empty($getProductoSingle)) {
            $data['meta_titulo'] = $getProductoSingle->titulo;
            $data['meta_descripcion'] = $getProductoSingle->descripcion_corta;
            $data['getProducto'] = $getProductoSingle;

            $data['getRelatedProducto'] = ProductoModel::getRelatedProducto($getProductoSingle->id, $getProductoSingle->subcategoria_id);

            return view('productos.detalle', $data);
        } else if (!empty($getCategoria) && !empty($getSubCategoria)) {
            $data['meta_titulo'] = $getSubCategoria->meta_titulo;
            $data['meta_descripcion'] = $getSubCategoria->meta_descripcion;
            $data['meta_p_clave'] = $getSubCategoria->meta_p_clave;

            $data['getSubCategoria'] = $getSubCategoria;
            $data['getCategoria'] = $getCategoria;

            $getProducto = ProductoModel::getProducto($getCategoria->id, $getSubCategoria->id);

            $page = 0;
            if (!empty($getProducto->nextPageUrl())) {
                $parse_url = parse_url($getProducto->nextPageUrl());
                if (!empty($parse_url['query'])) {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;

            $data['getProducto'] = $getProducto;

            $data['getSubcategoriaFiltro'] = SubCategoriaModel::getRecordSubCategoria($getCategoria->id);

            return view('productos.listar', $data);
        } else if (!empty($getCategoria)) {
            $data['getSubcategoriaFiltro'] = SubCategoriaModel::getRecordSubCategoria($getCategoria->id);

            $data['getCategoria'] = $getCategoria;

            $data['meta_titulo'] = $getCategoria->meta_titulo;
            $data['meta_descripcion'] = $getCategoria->meta_descripcion;
            $data['meta_p_clave'] = $getCategoria->meta_p_clave;

            $getProducto = ProductoModel::getProducto($getCategoria->id);

            $page = 0;
            if (!empty($getProducto->nextPageUrl())) {
                $parse_url = parse_url($getProducto->nextPageUrl());
                if (!empty($parse_url['query'])) {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;

            $data['getProducto'] = $getProducto;

            return view('productos.listar', $data);
        } else {
            abort(404);
        }
    }

    public function getFiltroProductoAjax(Request $request)
    {
        $getProducto = ProductoModel::getProducto();

        $page = 0;
        if (!empty($getProducto->nextPageUrl())) {
            $parse_url = parse_url($getProducto->nextPageUrl());
            if (!empty($parse_url['query'])) {
                parse_str($parse_url['query'], $get_array);
                $page = !empty($get_array['page']) ? $get_array['page'] : 0;
            }
        }

        return response()->json([
            "estado" => true,
            "page" => $page,
            "success" => view("productos._listar", ["getProducto" => $getProducto])->render(),
        ], 200);
    }
}
