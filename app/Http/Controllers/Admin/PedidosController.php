<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EstadoPedidoMail;
use App\Models\PedidosModel;
use Illuminate\Http\Request;
use Mail;

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

    public function estado_pedido(Request $request)
    {
        $getPedido = PedidosModel::getSingle($request->pedido_id);
        $getPedido->estado = $request->estado;
        $getPedido->save();

        Mail::to($getPedido->email)->send(new EstadoPedidoMail($getPedido));

        $json['message'] = "Estado actualizado exitosamente";
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
}
