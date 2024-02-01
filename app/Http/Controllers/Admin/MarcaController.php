<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarcaModel;
use Illuminate\Http\Request;
use Auth;

class MarcaController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = MarcaModel::getRecord();
        $data['header_title'] = 'Marcas';
        return view('admin.marcas.list', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar marcas';
        return view('admin.marcas.agregar', $data);
    }

    public function insertar(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:marcas'
        ]);

        $marcas = new MarcaModel;
        $marcas->nombre = trim($request->nombre);
        $marcas->slug = trim($request->slug);
        $marcas->estado = trim($request->estado);
        $marcas->meta_titulo = trim($request->meta_titulo);
        $marcas->meta_descripcion = trim($request->meta_descripcion);
        $marcas->meta_p_clave = trim($request->meta_p_clave);
        $marcas->creado_por = Auth::user()->id;
        $marcas->save();

        return redirect('admin/marcas/listar')->with('success', 'Marca agregada exitosamente');
    }

    public function editar($id)
    {
        $data['getRecord'] = MarcaModel::getSingle($id);
        $data['header_title'] = 'Editar marcas';
        return view('admin.marcas.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:marcas,slug,' . $id
        ]);

        $marcas = MarcaModel::getSingle($id);
        $marcas->nombre = trim($request->nombre);
        $marcas->slug = trim($request->slug);
        $marcas->estado = trim($request->estado);
        $marcas->meta_titulo = trim($request->meta_titulo);
        $marcas->meta_descripcion = trim($request->meta_descripcion);
        $marcas->meta_p_clave = trim($request->meta_p_clave);
        $marcas->save();

        return redirect('admin/marcas/listar')->with('success', 'Marca actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $marcas = MarcaModel::getSingle($id);
        $marcas->esta_eliminado = 1;
        $marcas->save();

        return redirect()->back()->with('success', 'Marca eliminada exitosamente');
    }
}
