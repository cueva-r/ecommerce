<?php

namespace App\Http\Controllers;

use App\Models\ListaDeDeseosModel;
use App\Models\PedidosModel;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

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

        $data['getRecord'] = PedidosModel::getRecordCliente(Auth::user()->id);

        return view('cliente.pedidos', $data);
    }

    public function detalle_pedido($id)
    {
        $data['getRecord'] = PedidosModel::getSingleCliente(Auth::user()->id, $id);

        if (!empty($data['getRecord'])) {
            $data['meta_titulo'] = 'Detalles del pedido';
            $data['meta_descripcion'] = '';
            $data['meta_p_clave'] = '';
        } else {
            abort(404);
        }

        return view('cliente.detalle_pedido', $data);
    }

    public function editar_perfil()
    {
        $data['meta_titulo'] = 'Editar perfil';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        $data['getRecord'] = User::getSingle(Auth::user()->id);

        return view('cliente.editar_perfil', $data);
    }

    public function actualizar_perfil(Request $request)
    {
        $cliente = User::getSingle(Auth::user()->id);
        $cliente->name = trim($request->nombres);
        $cliente->apellidos = trim($request->apellidos);
        $cliente->nombre_compania = trim($request->nombre_compania);
        $cliente->pais = trim($request->pais);
        $cliente->primera_direccion = trim($request->primera_direccion);
        $cliente->segunda_direccion = trim($request->segunda_direccion);
        $cliente->ciudad = trim($request->ciudad);
        $cliente->distrito = trim($request->distrito);
        $cliente->codigo_postal = trim($request->codigo_postal);
        $cliente->telefono = trim($request->telefono);
        $cliente->save();

        return redirect()->back()->with('success', "Perfil actualizado exitosamente");
    }

    public function cambiar_contrasena()
    {
        $data['meta_titulo'] = 'Dashboard';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        return view('cliente.cambiar_contrasena', $data);
    }

    public function actualizar_contrasena(Request $request)
    {
        $cliente = User::getSingle(Auth::user()->id);
        if (Hash::check($request->contrasena_anterior, $cliente->password)) {
            if ($request->contrasena == $request->ccontrasena) {
                $cliente->password = Hash::make($request->contrasena);
                $cliente->save();

                return redirect()->back()->with('success', "Contraseñas actualizada exitosamente");
            } else {
                return redirect()->back()->with('error', "Las contraseñas no coinciden");
            }
        } else {
            return redirect()->back()->with('error', "La contraseña anterior no es correcta");
        }
    }

    public function agregar_a_la_lista_de_deseos(Request $request)
    {
        $check = ListaDeDeseosModel::revisarExistente($request->producto_id, Auth::user()->id);

        if (empty($check)) {
            $guardar = new ListaDeDeseosModel;
            $guardar->producto_id = $request->producto_id;
            $guardar->user_id = Auth::user()->id;
            $guardar->save();

            $json['esta_en_la_lista'] = 1;
        } else {
            ListaDeDeseosModel::eliminarRecord($request->producto_id, Auth::user()->id);

            $json['esta_en_la_lista'] = 0;
        }

        $json['status'] = true;
        echo json_encode($json);
    }
}
