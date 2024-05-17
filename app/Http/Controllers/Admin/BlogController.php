<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategoriaModel;
use App\Models\BlogModel;
use Illuminate\Http\Request;
use Str;

class BlogController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = BlogModel::getRecord();
        $data['header_title'] = 'Blogs';
        return view('admin.blog.listar', $data);
    }

    public function agregar()
    {
        $data['getCategoria'] = BlogCategoriaModel::getRecordActive();
        $data['header_title'] = 'Agregar blog';
        return view('admin.blog.agregar', $data);
    }

    public function insertar(Request $request)
    {
        $blog = new BlogModel;
        $blog->titulo = trim($request->titulo);
        $blog->blogcategoria_id = trim($request->blogcategoria_id);
        $blog->descripcion_corta = trim($request->descripcion_corta);
        $blog->descripcion = trim($request->descripcion);
        $blog->estado = trim($request->estado);
        $blog->meta_titulo = trim($request->meta_titulo);
        $blog->meta_descripcion = trim($request->meta_descripcion);
        $blog->meta_p_clave = trim($request->meta_p_clave);
        $blog->save();

        if (!empty($request->file('nombre_imagen'))) {
            $file = $request->file('nombre_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/blog/', $filename);
            $blog->nombre_imagen = $filename;
        }

        $slug = Str::slug($request->titulo);
        $count = BlogModel::where('slug', '=', $slug)->count();

        if (!empty($count)) {
            $blog->slug = $slug . '-' . $blog->slug;
        } else {
            $blog->slug = trim($slug);
        }
        
        $blog->save();

        return redirect('admin/blog/listar')->with('success', 'Blog agregado exitosamente');
    }

    public function editar($id)
    {
        $data['getCategoria'] = BlogCategoriaModel::getRecordActive();
        $data['getRecord'] = BlogModel::getSingle($id);
        $data['header_title'] = 'Editar blog';
        return view('admin.blog.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        $blog = BlogModel::getSingle($id);
        $blog->titulo = trim($request->titulo);
        $blog->blogcategoria_id = trim($request->blogcategoria_id);
        $blog->descripcion_corta = trim($request->descripcion_corta);
        $blog->descripcion = trim($request->descripcion);
        $blog->estado = trim($request->estado);
        $blog->meta_titulo = trim($request->meta_titulo);
        $blog->meta_descripcion = trim($request->meta_descripcion);
        $blog->meta_p_clave = trim($request->meta_p_clave);
        $blog->save();

        if (!empty($request->file('nombre_imagen'))) {
            if (!empty($blog->getImagen())){
                unlink('upload/blog/' . $blog->nombre_imagen);
            }
            $file = $request->file('nombre_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/blog/', $filename);
            $blog->nombre_imagen = $filename;
            $blog->save();
        }

        return redirect('admin/blog/listar')->with('success', 'Blog actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $blog = BlogModel::getSingle($id);
        $blog->esta_eliminado = 1;
        $blog->save();

        return redirect()->back()->with('success', 'Blog eliminado exitosamente');
    }
}
