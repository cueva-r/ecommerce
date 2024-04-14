<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PedidosModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $data['totalPedidos'] = PedidosModel::mostrarTotalPedidos();
        $data['totalPedidosHoy'] = PedidosModel::mostrarTotalPedidosHoy();
        $data['cantidadTotal'] = PedidosModel::mostrarCantidadTotal();
        $data['cantidadTotalHoy'] = PedidosModel::mostrarCantidadTotalHoy();
        $data['totalClientes'] = User::mostrarTotalClientes();
        $data['totalClientesHoy'] = User::mostrarTotalClientesHoy();

        $data['mostrarUltimosPedidos'] = PedidosModel::mostrarUltimosPedidos();

        if (!empty($request->año)) {
            $año = $request->año;
        } else {
            $año = date('Y');
        }

        $mostrarTotalClientesPorMes = '';
        $mostrarTotalPedidosPorMes = '';
        $mostrarTotalCantidadPedidosPorMes = '';

        $cantidadTotal = 0;

        for ($mes = 1; $mes <= 12; $mes++) {
            $fechaInicio = new \DateTime("$año-$mes-01");
            $fechaFin = new \DateTime("$año-$mes-01");
            $fechaFin->modify('last day of this month');

            $fecha_inicio = $fechaInicio->format('Y-m-d');
            $fecha_fin = $fechaFin->format('Y-m-d');

            $cliente = User::mostrarTotalClientesPorMes($fecha_inicio, $fecha_fin);
            $mostrarTotalClientesPorMes .= $cliente . ',';

            $pedidos = PedidosModel::mostrarTotalPedidosPorMes($fecha_inicio, $fecha_fin);
            $mostrarTotalPedidosPorMes .= $pedidos . ',';

            $pagoPedidos = PedidosModel::mostrarTotalCantidadPedidosPorMes($fecha_inicio, $fecha_fin);
            $mostrarTotalCantidadPedidosPorMes .= $pagoPedidos . ',';

            $cantidadTotal = $cantidadTotal + $pagoPedidos;
        }

        $data['mostrarTotalClientesPorMes'] = rtrim($mostrarTotalClientesPorMes, ",");
        $data['mostrarTotalPedidosPorMes'] = rtrim($mostrarTotalPedidosPorMes, ",");
        $data['mostrarTotalCantidadPedidosPorMes'] = rtrim($mostrarTotalCantidadPedidosPorMes, ",");
        $data['cantidadTotal'] = $cantidadTotal;
        $data['año'] = $año;

        $data['header_title'] = "Dashboard";
        return view('admin.dashboard', $data);
    }
}
