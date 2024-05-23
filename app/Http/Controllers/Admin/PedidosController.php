<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EstadoPedidoMail;
use App\Models\NotificacionModel;
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

    public function detalles_pedido($id, Request $request)
    {
        if(!empty($request->noti_id))
        {
            NotificacionModel::updatedReadNoti($request->noti_id);
        }
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

        $user_id = $getPedido->id;
        $url = url('cliente/pedidos/' . $getPedido->id);
        $mensaje = "Tu pedido se actualizó - #" .  $getPedido->numero_pedido;
        NotificacionModel::insertRecord($user_id, $url, $mensaje);

        $json['message'] = "Estado actualizado exitosamente";
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
}
