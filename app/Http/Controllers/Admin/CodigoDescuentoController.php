<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CodigoDescuentoModel;
use Illuminate\Http\Request;
use Auth;

class CodigoDescuentoController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = CodigoDescuentoModel::getRecord();
        $data['header_title'] = 'Código de descuento';
        return view('admin.codigodescuento.lista', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar código de descuento';
        return view('admin.codigodescuento.agregar', $data);
    }

    public function insertar(Request $request)
    {
        $codigodescuento = new CodigoDescuentoModel();
        $codigodescuento->nombre = trim($request->nombre);
        $codigodescuento->tipo = trim($request->tipo);
        $codigodescuento->porcentaje_cantidad = trim($request->porcentaje_cantidad);
        $codigodescuento->fecha_expiracion = trim($request->fecha_expiracion);
        $codigodescuento->estado = trim($request->estado);
        $codigodescuento->save();

        return redirect('admin/codigo_descuento/listar')->with('success', 'Código de descuento agregado exitosamente');
    }

    public function editar($id)
    {
        $data['getRecord'] = CodigoDescuentoModel::getSingle($id);
        $data['header_title'] = 'Editar código de descuento';
        return view('admin.codigodescuento.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        $codigodescuento = CodigoDescuentoModel::getSingle($id);
        $codigodescuento->nombre = trim($request->nombre);
        $codigodescuento->tipo = trim($request->tipo);
        $codigodescuento->porcentaje_cantidad = trim($request->porcentaje_cantidad);
        $codigodescuento->fecha_expiracion = trim($request->fecha_expiracion);
        $codigodescuento->estado = trim($request->estado);
        $codigodescuento->save();

        return redirect('admin/codigo_descuento/listar')->with('success', 'Código de descuento actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $codigodescuento = CodigoDescuentoModel::getSingle($id);
        $codigodescuento->esta_eliminado = 1;
        $codigodescuento->save();

        return redirect()->back()->with('success', 'Código de descuento eliminado exitosamente');
    }
}
