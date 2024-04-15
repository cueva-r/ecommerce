<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteDashboardController extends Controller
{
    public function dashboard()
    {
        $data['meta_titulo'] = 'Dashboard';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

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
