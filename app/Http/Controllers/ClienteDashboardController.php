<?php

namespace App\Http\Controllers;

use App\Models\PedidosModel;
use Illuminate\Http\Request;
use Auth;

class ClienteDashboardController extends Controller
{
    public function dashboard()
    {
        $data['meta_titulo'] = 'Dashboard';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        $data['totalPedidosCliente'] = PedidosModel::mostrarTotalPedidosCliente(Auth::user()->id);
        $data['totalPedidosHoyCliente'] = PedidosModel::mostrarTotalPedidosHoyCliente(Auth::user()->id);
        $data['cantidadTotalCliente'] = PedidosModel::mostrarCantidadTotalCliente(Auth::user()->id);
        $data['cantidadTotalHoyCliente'] = PedidosModel::mostrarCantidadTotalHoyCliente(Auth::user()->id);


        $data['estadoPedidoClientePendiente'] = PedidosModel::mostrarEstadoPedidoCliente(Auth::user()->id, 0);
        $data['estadoPedidoClienteEnProgreso'] = PedidosModel::mostrarEstadoPedidoCliente(Auth::user()->id, 1);
        $data['estadoPedidoClienteCompletado'] = PedidosModel::mostrarEstadoPedidoCliente(Auth::user()->id, 3);
        $data['estadoPedidoClienteCancelado'] = PedidosModel::mostrarEstadoPedidoCliente(Auth::user()->id, 4);

        return view('cliente.dashboard', $data);
    }

    public function pedidos()
    {
        $data['meta_titulo'] = 'Pedidos';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        return view('cliente.pedidos', $data);
    }

    public function editar_perfil()
    {
        $data['meta_titulo'] = 'Editar perfil';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        return view('cliente.editar_perfil', $data);
    }

    public function cambiar_contrasena()
    {
        $data['meta_titulo'] = 'Dashboard';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        return view('cliente.cambiar_contrasena', $data);
    }
}
