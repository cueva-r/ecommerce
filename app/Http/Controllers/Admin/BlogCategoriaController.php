<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategoriaModel;
use Illuminate\Http\Request;
use Auth;
use Str;

class BlogCategoriaController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = BlogCategoriaModel::getRecord();
        $data['header_title'] = 'Blog de categorías';
        return view('admin.blogcategoria.listar', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar blog de categoría';
        return view('admin.blogcategoria.agregar', $data);
    }

    public function insertar(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:categorias'
        ]);

        $blogcategoria = new BlogCategoriaModel;
        $blogcategoria->nombre = trim($request->nombre);
        $blogcategoria->slug = trim($request->slug);
        $blogcategoria->estado = trim($request->estado);
        $blogcategoria->meta_titulo = trim($request->meta_titulo);
        $blogcategoria->meta_descripcion = trim($request->meta_descripcion);
        $blogcategoria->meta_p_clave = trim($request->meta_p_clave);
        $blogcategoria->save();

        return redirect('admin/blogcategoria/listar')->with('success', 'Blog de categoría agregada exitosamente');
    }

    public function editar($id)
    {
        $data['getRecord'] = BlogCategoriaModel::getSingle($id);
        $data['header_title'] = 'Editar blog de categorías';
        return view('admin.blogcategoria.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:categorias,slug,' . $id
        ]);

        $blogcategoria = BlogCategoriaModel::getSingle($id);
        $blogcategoria->nombre = trim($request->nombre);
        $blogcategoria->slug = trim($request->slug);
        $blogcategoria->estado = trim($request->estado);
        $blogcategoria->meta_titulo = trim($request->meta_titulo);
        $blogcategoria->meta_descripcion = trim($request->meta_descripcion);
        $blogcategoria->meta_p_clave = trim($request->meta_p_clave);
        $blogcategoria->save();

        return redirect('admin/blogcategoria/listar')->with('success', 'Blog de categoría actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $blogcategoria = BlogCategoriaModel::getSingle($id);
        $blogcategoria->esta_eliminado = 1;
        $blogcategoria->save();

        return redirect()->back()->with('success', 'Blog de categoría eliminada exitosamente');
    }
}
