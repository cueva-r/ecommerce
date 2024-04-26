<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PagesModel;
use Illuminate\Http\Request;
use Str;

class PagesController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = PagesModel::getRecord();
        $data['header_title'] = 'Páginas';
        return view('admin.paginas.lista', $data);
    }

    public function editar($id)
    {
        $data['getRecord'] = PagesModel::getSingle($id);
        $data['header_title'] = 'Editar página';
        return view('admin.paginas.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        $page = PagesModel::getSingle($id);
        $page->nombre = trim($request->nombre);
        $page->titulo = trim($request->titulo);
        $page->descripcion = trim($request->descripcion);
        $page->meta_titulo = trim($request->meta_titulo);
        $page->meta_descripcion = trim($request->meta_descripcion);
        $page->meta_p_clave = trim($request->meta_p_clave);
        $page->save();

        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = $page->id . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/pages/', $filename);
            $page->nombre_imagen = trim($filename);

            $page->save();
        }

        return redirect('admin/paginas/listar')->with('success', 'Página actualizado exitosamente');
    }
}
