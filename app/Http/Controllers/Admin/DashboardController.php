<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PedidosModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['totalPedidos'] = PedidosModel::mostrarTotalPedidos();
        $data['totalPedidosHoy'] = PedidosModel::mostrarTotalPedidosHoy();
        $data['cantidadTotal'] = PedidosModel::mostrarCantidadTotal();
        $data['cantidadTotalHoy'] = PedidosModel::mostrarCantidadTotalHoy();
        $data['totalClientes'] = User::mostrarTotalClientes();
        $data['totalClientesHoy'] = User::mostrarTotalClientesHoy();

        $data['mostrarUltimosPedidos'] = PedidosModel::mostrarUltimosPedidos();

        $data['header_title'] = "Dashboard";
        return view('admin.dashboard', $data);
    }
}
