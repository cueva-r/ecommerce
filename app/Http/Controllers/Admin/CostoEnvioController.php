<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CostoEnvioModel;
use Illuminate\Http\Request;

class CostoEnvioController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = CostoEnvioModel::getRecord();
        $data['header_title'] = 'Costo de envío';
        return view('admin.costoenvio.lista', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar costo de envío';
        return view('admin.costoenvio.agregar', $data);
    }

    public function insertar(Request $request)
    {
        $costoenvio = new CostoEnvioModel();
        $costoenvio->nombre = trim($request->nombre);
        $costoenvio->precio = trim($request->precio);
        $costoenvio->estado = trim($request->estado);
        $costoenvio->save();

        return redirect('admin/costo_envio/listar')->with('success', 'Costo de envío agregado exitosamente');
    }

    public function editar($id)
    {
        $data['getRecord'] = CostoEnvioModel::getSingle($id);
        $data['header_title'] = 'Editar costo de envío';
        return view('admin.costoenvio.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        $costoenvio = CostoEnvioModel::getSingle($id);
        $costoenvio->nombre = trim($request->nombre);
        $costoenvio->precio = trim($request->precio);
        $costoenvio->estado = trim($request->estado);
        $costoenvio->save();

        return redirect('admin/costo_envio/listar')->with('success', 'Costo de envío actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $costoenvio = CostoEnvioModel::getSingle($id);
        $costoenvio->esta_eliminado = 1;
        $costoenvio->save();

        return redirect()->back()->with('success', 'Costo de envío eliminado exitosamente');
    }
}
