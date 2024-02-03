<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriaModel;
use App\Models\SubCategoriaModel;
use Illuminate\Http\Request;
use Auth;

class SubCategoriaController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = SubCategoriaModel::getRecord();
        $data['header_title'] = 'Subcategorías';
        return view('admin.subcategorias.list', $data);
    }

    public function agregar()
    {
        $data['getCategorias'] = CategoriaModel::getRecord();
        $data['header_title'] = 'Agregar subcategorías';
        return view('admin.subcategorias.agregar', $data);
    }

    public function insertar(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:subcategorias'
        ]);

        $subcategoria = new SubCategoriaModel;
        $subcategoria->categoria_id = trim($request->categoria_id);
        $subcategoria->nombre = trim($request->nombre);
        $subcategoria->slug = trim($request->slug);
        $subcategoria->estado = trim($request->estado);
        $subcategoria->meta_titulo = trim($request->meta_titulo);
        $subcategoria->meta_descripcion = trim($request->meta_descripcion);
        $subcategoria->meta_p_clave = trim($request->meta_p_clave);
        $subcategoria->created_by = Auth::user()->id;
        $subcategoria->save();

        return redirect('admin/subcategorias/listar')->with('success', 'Sub categoría agregada exitosamente');
    }

    public function editar($id)
    {
        $data['getCategorias'] = CategoriaModel::getRecord();
        $data['getRecord'] = SubCategoriaModel::getSingle($id);
        $data['header_title'] = 'Editar sub categorías';
        return view('admin.subcategorias.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:subcategorias,slug,' . $id
        ]);

        $subcategoria = SubCategoriaModel::getSingle($id);
        $subcategoria->categoria_id = trim($request->categoria_id);
        $subcategoria->nombre = trim($request->nombre);
        $subcategoria->slug = trim($request->slug);
        $subcategoria->estado = trim($request->estado);
        $subcategoria->meta_titulo = trim($request->meta_titulo);
        $subcategoria->meta_descripcion = trim($request->meta_descripcion);
        $subcategoria->meta_p_clave = trim($request->meta_p_clave);
        $subcategoria->save();

        return redirect('admin/subcategorias/listar')->with('success', 'Sub categoría actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $categoria = SubCategoriaModel::getSingle($id);
        $categoria->esta_eliminado = 1;
        $categoria->save();

        return redirect()->back()->with('success', 'Sub categoría eliminada exitosamente');
    }

    public function get_subcategorias(Request $request)
    {
        $categoria_id = $request->id;
        $get_subcategorias = SubCategoriaModel::getRecordSubCategoria($categoria_id);
        $html = '';
        $html .= '<option value="">Seleccionar</option>';
        foreach ($get_subcategorias as $valor) {
            $html .= '<option value="' . $valor->id . '">' . $valor->nombre . '</option>';
        }

        $json['html'] = $html;
        echo json_encode($json);
    }
}
