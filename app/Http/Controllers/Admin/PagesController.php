<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfiguracionSistemaModel;
use App\Models\PagesModel;
use Illuminate\Http\Request;
use Str;

class PagesController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = PagesModel::getRecord();
        $data['header_title'] = 'Páginas';
        return view('admin.paginas.lista', $data);
    }

    public function editar($id)
    {
        $data['getRecord'] = PagesModel::getSingle($id);
        $data['header_title'] = 'Editar página';
        return view('admin.paginas.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        $page = PagesModel::getSingle($id);
        $page->nombre = trim($request->nombre);
        $page->titulo = trim($request->titulo);
        $page->descripcion = trim($request->descripcion);
        $page->meta_titulo = trim($request->meta_titulo);
        $page->meta_descripcion = trim($request->meta_descripcion);
        $page->meta_p_clave = trim($request->meta_p_clave);
        $page->save();

        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = $page->id . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/pages/', $filename);
            $page->nombre_imagen = trim($filename);

            $page->save();
        }

        return redirect('admin/paginas/listar')->with('success', 'Página actualizado exitosamente');
    }

    public function configuracion_sistema()
    {
        $data['getRecord'] = ConfiguracionSistemaModel::getSingle();
        $data['header_title'] = 'Configuración del sistema';
        return view('admin.configuracion.configuracion_sistema', $data);
    }

    public function actualizar_configuracion_sistema(Request $request)
    {
        $guardar = ConfiguracionSistemaModel::getSingle();
        $guardar->nombre_sitioweb = trim($request->nombre_sitioweb);
        $guardar->descripcion_pie_pagina = trim($request->descripcion_pie_pagina);
        $guardar->direccion = trim($request->direccion);
        $guardar->telefono = trim($request->telefono);
        $guardar->telefono_dos = trim($request->telefono_dos);
        $guardar->enviar_email = trim($request->enviar_email);
        $guardar->email = trim($request->email);
        $guardar->email_dos = trim($request->email_dos);
        $guardar->hora_trabajo = trim($request->hora_trabajo);
        $guardar->facebook_link = trim($request->facebook_link);
        $guardar->twitter_link = trim($request->twitter_link);
        $guardar->instagram_link = trim($request->instagram_link);
        $guardar->github_link = trim($request->github_link);
        $guardar->linkedin_link = trim($request->linkedin_link);

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/configuracion/', $filename);
            $guardar->logo = trim($filename);
        }

        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/configuracion/', $filename);
            $guardar->favicon = trim($filename);
        }

        if ($request->file('pie_pagina_pagos_icono')) {
            $file = $request->file('pie_pagina_pagos_icono');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/configuracion/', $filename);
            $guardar->pie_pagina_pagos_icono = trim($filename);
        }

        $guardar->save();

        return redirect()->back()->with('success', 'Configuración del sistema actualizado exitosamente');
    }
}
