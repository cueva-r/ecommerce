<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionSistemaModel;
use App\Models\PagesModel;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio()
    {
        $getPage = PagesModel::getSlug('inicio');
        $data['getPage'] = $getPage;
        
        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('inicio', $data);
    }

    public function contactenos()
    {
        $getPage = PagesModel::getSlug('contactenos');
        $data['getPage'] = $getPage;

        $data['configuracionSistema'] = ConfiguracionSistemaModel::getSingle();
        
        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('pages.contactenos', $data);
    }

    public function sobre_nosotros()
    {
        $getPage = PagesModel::getSlug('sobre-nosotros');
        $data['getPage'] = $getPage;

        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('pages.sobre_nosotros', $data);
    }

    public function faq()
    {
        $getPage = PagesModel::getSlug('faq');
        $data['getPage'] = $getPage;
        
        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;
        
        return view('pages.faq', $data);
    }

    public function metodo_pago()
    {
        $getPage = PagesModel::getSlug('metodo-pago');
        $data['getPage'] = $getPage;
        
        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('pages.metodo_pago', $data);
    }

    public function garantias()
    {
        $getPage = PagesModel::getSlug('garantias');
        $data['getPage'] = $getPage;
        
        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;
        
        return view('pages.garantias', $data);
    }

    public function devoluciones()
    {
        $getPage = PagesModel::getSlug('devoluciones');
        $data['getPage'] = $getPage;
        
        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('pages.devoluciones', $data);
    }

    public function envios()
    {
        $getPage = PagesModel::getSlug('envios');
        $data['getPage'] = $getPage;
        
        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('pages.envios', $data);
    }

    public function terminos_condiciones()
    {
        $getPage = PagesModel::getSlug('terminos-condiciones');
        $data['getPage'] = $getPage;
        
        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('pages.terminos_condiciones', $data);
    }

    public function politica_privacidad()
    {
        $getPage = PagesModel::getSlug('politica-privacidad');
        $data['getPage'] = $getPage;
        
        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('pages.politica_privacidad', $data);
    }  
}
