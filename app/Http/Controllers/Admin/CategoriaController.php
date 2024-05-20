<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaModel;
use Auth;
use Str;

class CategoriaController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = CategoriaModel::getRecord();
        $data['header_title'] = 'Categorías';
        return view('admin.categorias.list', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar categorías';
        return view('admin.categorias.agregar', $data);
    }

    public function insertar(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:categorias'
        ]);

        $categoria = new CategoriaModel;
        $categoria->nombre = trim($request->nombre);
        $categoria->slug = trim($request->slug);
        $categoria->estado = trim($request->estado);
        $categoria->meta_titulo = trim($request->meta_titulo);
        $categoria->meta_descripcion = trim($request->meta_descripcion);
        $categoria->meta_p_clave = trim($request->meta_p_clave);
        $categoria->created_by = Auth::user()->id;

        $categoria->nombre_button = trim($request->nombre_button);
        $categoria->esta_inicio = !empty($request->esta_inicio) ? 1 : 0;

        $categoria->esta_menu = !empty($request->esta_menu) ? 1 : 0;

        if (!empty($request->file('nombre_imagen'))) {
            $file = $request->file('nombre_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/categorias/', $filename);
            $categoria->nombre_imagen = $filename;
        }

        $categoria->save();

        return redirect('admin/categorias/listar')->with('success', 'Categoría agregada exitosamente');
    }

    public function editar($id)
    {
        $data['getRecord'] = CategoriaModel::getSingle($id);
        $data['header_title'] = 'Editar categorías';
        return view('admin.categorias.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:categorias,slug,' . $id
        ]);

        $categoria = CategoriaModel::getSingle($id);
        $categoria->nombre = trim($request->nombre);
        $categoria->slug = trim($request->slug);
        $categoria->estado = trim($request->estado);
        $categoria->meta_titulo = trim($request->meta_titulo);
        $categoria->meta_descripcion = trim($request->meta_descripcion);
        $categoria->meta_p_clave = trim($request->meta_p_clave);

        $categoria->nombre_button = trim($request->nombre_button);
        $categoria->esta_inicio = !empty($request->esta_inicio) ? 1 : 0;
        $categoria->esta_menu = !empty($request->esta_menu) ? 1 : 0;

        if (!empty($request->file('nombre_imagen'))) {
            $file = $request->file('nombre_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/categorias/', $filename);
            $categoria->nombre_imagen = $filename;
        }

        $categoria->save();

        return redirect('admin/categorias/listar')->with('success', 'Categoría actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $categoria = CategoriaModel::getSingle($id);
        $categoria->esta_eliminado = 1;
        $categoria->save();

        return redirect()->back()->with('success', 'Categoría eliminada exitosamente');
    }

    public function reingresar($id)
    {
        $categoria = CategoriaModel::getSingle($id);
        $categoria->esta_eliminado = 0;
        $categoria->save();

        return redirect()->back()->with('success', 'Categoría reingresada exitosamente');
    }
}
