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
}
