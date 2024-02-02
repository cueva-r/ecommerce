<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ColorModel;
use Illuminate\Http\Request;
use Auth;

class ColorController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = ColorModel::getRecord();
        $data['header_title'] = 'Colores';
        return view('admin.colores.list', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar colores';
        return view('admin.colores.agregar', $data);
    }

    public function insertar(Request $request)
    {
        $colores = new ColorModel;
        $colores->nombre = trim($request->nombre);
        $colores->codigo = trim($request->codigo);
        $colores->estado = trim($request->estado);
        $colores->creado_por = Auth::user()->id;
        $colores->save();

        return redirect('admin/colores/listar')->with('success', 'Color agregado exitosamente');
    }

    public function editar($id)
    {
        $data['getRecord'] = ColorModel::getSingle($id);
        $data['header_title'] = 'Editar colores';
        return view('admin.colores.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        $colores = ColorModel::getSingle($id);
        $colores->nombre = trim($request->nombre);
        $colores->codigo = trim($request->codigo);
        $colores->estado = trim($request->estado);
        $colores->save();

        return redirect('admin/colores/listar')->with('success', 'Color actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $colores = ColorModel::getSingle($id);
        $colores->esta_eliminado = 1;
        $colores->save();

        return redirect()->back()->with('success', 'Color eliminado exitosamente');
    }
}
