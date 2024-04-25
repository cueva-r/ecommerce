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

    public function contactenos()
    {
        return view('pages.contactenos');
    }

    public function sobre_nosotros()
    {
        return view('pages.sobre_nosotros');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function metodo_pago()
    {
        return view('pages.metodo_pago');
    }

    public function garantias()
    {
        return view('pages.garantias');
    }

    public function devoluciones()
    {
        return view('pages.devoluciones');
    }

    public function envios()
    {
        return view('pages.envios');
    }

    public function terminos_condiciones()
    {
        return view('pages.terminos_condiciones');
    }

    public function politica_privacidad()
    {
        return view('pages.politica_privacidad');
    }  
}
