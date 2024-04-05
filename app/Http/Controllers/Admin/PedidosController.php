<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PedidosModel;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = PedidosModel::getRecord();
        $data['header_title'] = 'Pedidos';
        return view('admin.pedidos.lista', $data);
    }

    public function detalles_pedido($id)
    {
        $data['getRecord'] = PedidosModel::getSingle($id);
        $data['header_title'] = 'Destalles del pedido';
        return view('admin.pedidos.detalles', $data);
    }
}
