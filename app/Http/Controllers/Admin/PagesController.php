<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfiguracionInicioModel;
use App\Models\ConfiguracionSistemaModel;
use App\Models\ContactenosModel;
use App\Models\NotificacionModel;
use App\Models\PagesModel;
use App\Models\SMTPModel;
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

    public function smtp_configuracion()
    {
        $data['getRecord'] = SMTPModel::getSingle();
        $data['header_title'] = 'Configuración de SMTP';
        return view('admin.configuracion.smtp_configuracion', $data);
    }

    public function actualizar_smtp_configuracion(Request $request)
    {
        $guardar = SMTPModel::getSingle();
        $guardar->name = trim($request->name);
        $guardar->mail_mailer = trim($request->mail_mailer);
        $guardar->mail_host = trim($request->mail_host);
        $guardar->mail_port = trim($request->mail_port);
        $guardar->mail_username = trim($request->mail_username);
        $guardar->mail_password = trim($request->mail_password);
        $guardar->mail_encryption = trim($request->mail_encryption);
        $guardar->mail_from_address = trim($request->mail_from_address);
        $guardar->save();

        return redirect()->back()->with('success', 'Configuración del SMTP actualizado exitosamente');
    }

    public function configuracion_inicio()
    {
        $data['getRecord'] = ConfiguracionInicioModel::getSingle();
        $data['header_title'] = 'Configuración del inicio';
        return view('admin.configuracion.configuracion_inicio', $data);
    }

    public function actualizar_configuracion_inicio(Request $request)
    {
        $guardar = ConfiguracionInicioModel::getSingle();
        $guardar->productos_tendencia_titulo = trim($request->productos_tendencia_titulo);
        $guardar->comprar_por_categorias_titulo = trim($request->comprar_por_categorias_titulo);
        $guardar->recien_agregados_tiutlo = trim($request->recien_agregados_tiutlo);
        $guardar->nuestro_blog_titulo = trim($request->nuestro_blog_titulo);
        $guardar->pago_entrega_titulo = trim($request->pago_entrega_titulo);
        $guardar->pago_entrega_descripcion = trim($request->pago_entrega_descripcion);

        $guardar->reembolso_titulo = trim($request->reembolso_titulo);
        $guardar->reembolso_descripcion = trim($request->reembolso_descripcion);

        $guardar->soporte_titulo = trim($request->soporte_titulo);
        $guardar->soporte_descripcion = trim($request->soporte_descripcion);

        $guardar->signup_titulo = trim($request->signup_titulo);
        $guardar->signup_descripcion = trim($request->signup_descripcion);

        if ($request->file('pago_entrega_imagen')) {
            $file = $request->file('pago_entrega_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/configuracion/', $filename);
            $guardar->pago_entrega_imagen = trim($filename);
        }

        if ($request->file('reembolso_imagen')) {
            $file = $request->file('reembolso_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/configuracion/', $filename);
            $guardar->reembolso_imagen = trim($filename);
        }

        if ($request->file('soporte_imagen')) {
            $file = $request->file('soporte_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/configuracion/', $filename);
            $guardar->soporte_imagen = trim($filename);
        }

        if ($request->file('signup_imagen')) {
            $file = $request->file('signup_imagen');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/configuracion/', $filename);
            $guardar->signup_imagen = trim($filename);
        }

        $guardar->save();

        return redirect()->back()->with('success', 'Configuración del inicio actualizado exitosamente');
    }

    public function contactenos()
    {
        $data['getRecord'] = ContactenosModel::getRecord();
        $data['header_title'] = 'Contáctenos';
        return view('admin.contactenos.lista', $data);
    }

    public function notificaciones()
    {
        $data['getRecord'] = NotificacionModel::getRecord();
        $data['header_title'] = 'Notificaciones';
        return view('admin.notificaciones.lista', $data);
    }

    public function eliminar_contactenos($id)
    {
        ContactenosModel::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', "Mensaje eliminado correctamente");
    }
}
