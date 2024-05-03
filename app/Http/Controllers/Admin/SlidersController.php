<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SlidersModel;
use Illuminate\Http\Request;
use Str;

class SlidersController extends Controller
{
    public function lista()
    {
        $data['getRecord'] = SlidersModel::getRecord();
        $data['header_title'] = 'Sliders';
        return view('admin.sliders.lista', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar slider';
        return view('admin.sliders.agregar', $data);
    }

    public function insertar(Request $request)
    {
        $sliders = new SlidersModel();
        $sliders->titulo = trim($request->titulo);
        $sliders->nombre_button = trim($request->nombre_button);
        $sliders->link_button = trim($request->link_button);

        $file = $request->file('nombre_imagen');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('upload/sliders/', $filename);

        $sliders->estado = trim($request->estado);
        $sliders->nombre_imagen = $filename;
        $sliders->save();

        return redirect('admin/sliders/lista')->with('success', 'Slider agregado exitosamente');
    }

    public function editar($id)
    {
        $data['getRecord'] = SlidersModel::getSingle($id);
        $data['header_title'] = 'Editar slider';
        return view('admin.sliders.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        $sliders = SlidersModel::getSingle($id);
        $sliders->titulo = trim($request->titulo);
        $sliders->nombre_button = trim($request->nombre_button);
        $sliders->link_button = trim($request->link_button);

        if (!empty($request->file('nombre_imagen'))) {
            $file = $request->file('nombre_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/sliders/', $filename);
            $sliders->nombre_imagen = $filename;
        }

        $sliders->estado = trim($request->estado);
        $sliders->save();

        return redirect('admin/sliders/lista')->with('success', 'Slider actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $sliders = SlidersModel::getSingle($id);
        $sliders->esta_eliminado = 1;
        $sliders->save();

        return redirect()->back()->with('success', 'Slider eliminado exitosamente');
    }
}
