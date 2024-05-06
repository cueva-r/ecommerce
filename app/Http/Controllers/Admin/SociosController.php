<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SociosModel;
use Illuminate\Http\Request;
use Str;

class SociosController extends Controller
{
    public function lista()
    {
        $data['getRecord'] = SociosModel::getRecord();
        $data['header_title'] = 'Socios';
        return view('admin.socios.lista', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar socio';
        return view('admin.socios.agregar', $data);
    }

    public function insertar(Request $request)
    {
        $socios = new SociosModel();
        $socios->link_button = trim($request->link_button);

        $file = $request->file('nombre_imagen');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('upload/socios/', $filename);

        $socios->estado = trim($request->estado);
        $socios->nombre_imagen = $filename;
        $socios->save();

        return redirect('admin/socios/lista')->with('success', 'Socio agregado exitosamente');
    }

    public function editar($id)
    {
        $data['getRecord'] = SociosModel::getSingle($id);
        $data['header_title'] = 'Editar socio';
        return view('admin.socios.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        $socios = SociosModel::getSingle($id);
        $socios->link_button = trim($request->link_button);

        if (!empty($request->file('nombre_imagen'))) {
            $file = $request->file('nombre_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/socios/', $filename);
            $socios->nombre_imagen = $filename;
        }

        $socios->estado = trim($request->estado);
        $socios->save();

        return redirect('admin/socios/lista')->with('success', 'Socio actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $socios = SociosModel::getSingle($id);
        $socios->esta_eliminado = 1;
        $socios->save();

        return redirect()->back()->with('success', 'Socio eliminado exitosamente');
    }
}
