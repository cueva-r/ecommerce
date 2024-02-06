<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio()
    {
        $data['meta_titulo'] = 'E-commerce';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        return view('inicio', $data);
    }
}
