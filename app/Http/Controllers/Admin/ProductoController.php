<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriaModel;
use App\Models\ProductoModel;
use Illuminate\Http\Request;

use Str;
use Auth;

class ProductoController extends Controller
{
    public function listar()
    {
        $data['header_title'] = 'Productos';
        return view('admin.productos.list', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar productos';
        return view('admin.productos.agregar', $data);
    }

    public function insertar(Request $request)
    {
        $titulo = trim($request->titulo);
        $productos = new ProductoModel();
        $productos->titulo = $titulo;
        $productos->creado_por = Auth::user()->id;
        $productos->save();

        $slug = Str::slug($titulo, '-');
        $checkSlug = ProductoModel::checkSlug($slug);
        if (empty($checkSlug)) {
            $productos->slug = $slug;
            $productos->save();
        } else {
            $nuevo_slug = $slug . '-' . $productos->id;
            $productos->slug = $nuevo_slug;
            $productos->save();
        }

        return redirect('admin/productos/editar' . $productos->id);
    }

    public function editar($producto_id)
    {
        $productos = ProductoModel::getSingle($producto_id);
        if (!empty($productos)) {
            $data['productos'] = $productos;
            $data['header_title'] = 'Editar productos';
            return view('admin.productos.editar', $data);
        }
    }
}
