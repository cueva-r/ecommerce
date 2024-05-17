<?php

namespace App\Http\Controllers;

use App\Mail\ContactenosMail;
use App\Models\BlogCategoriaModel;
use App\Models\BlogComentarioModel;
use App\Models\BlogModel;
use App\Models\CategoriaModel;
use App\Models\ConfiguracionSistemaModel;
use App\Models\ContactenosModel;
use App\Models\PagesModel;
use App\Models\ProductoModel;
use App\Models\SlidersModel;
use App\Models\SociosModel;
use Illuminate\Http\Request;
use Auth;
use Mail;
use Session;

class InicioController extends Controller
{
    public function inicio()
    {
        $getPage = PagesModel::getSlug('inicio');
        $data['getPage'] = $getPage;

        $data['getSliders'] = SlidersModel::getRecordActive();
        $data['getSocios'] = SociosModel::getRecordActive();
        $data['getCategorias'] = CategoriaModel::getRecordActiveInicio();

        $data['getProducto'] = ProductoModel::getRecienAgregados();
        $data['getProductoTendencia'] = ProductoModel::getProductoTendencia();

        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('inicio', $data);
    }

    public function recien_agregados_categoria_producto(Request $request)
    {
        $getProducto = ProductoModel::getRecienAgregados();
        $getCategoria = CategoriaModel::getSingle($request->categoria_id);

        return response()->json([
            "estado" => true,
            "success" => view(
                "productos._listar_recien_agregados",
                [
                    "getProducto" => $getProducto,
                    "getCategoria" => $getCategoria,
                ]
            )->render(),
        ], 200);
    }

    public function contactenos()
    {
        $primer_numero = mt_rand(0, 9);
        $segundo_numero = mt_rand(0, 9);

        $data['primer_numero'] = $primer_numero;
        $data['segundo_numero'] = $segundo_numero;

        Session::put('suma_total', $primer_numero + $segundo_numero);

        $getPage = PagesModel::getSlug('contactenos');
        $data['getPage'] = $getPage;

        $data['configuracionSistema'] = ConfiguracionSistemaModel::getSingle();

        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('pages.contactenos', $data);
    }

    public function enviar_contactenos(Request $request)
    {
        if (!empty($request->verificacion) && !empty(Session::get('suma_total'))) {
            if (trim(Session::get('suma_total')) == trim($request->verificacion)) {
                $guardar = new ContactenosModel;
                if (!empty(Auth::check())) {
                    $guardar->user_id = Auth::user()->id;
                }
                $guardar->nombre = trim($request->nombre);
                $guardar->email = trim($request->email);
                $guardar->telefono = trim($request->telefono);
                $guardar->subjeto = trim($request->subjeto);
                $guardar->mensaje = trim($request->mensaje);
                $guardar->save();

                $getConfiguracionSistema = ConfiguracionSistemaModel::getSingle();
                Mail::to($getConfiguracionSistema->enviar_email)->send(new ContactenosMail($guardar));

                return redirect()->back()->with('success', "Tu mensaje ha sido enviado correctamente");
            } else {
                return redirect()->back()->with('error', "Su suma de verificación es incorrecta");
            }
        } else {
            return redirect()->back()->with('error', "Su suma de verificación es incorrecta");
        }
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

    public function blog()
    {
        $getPage = PagesModel::getSlug('blog');
        $data['getPage'] = $getPage;

        $data['getBlog'] = BlogModel::getBlog();
        $data['getBlogCategoria'] = BlogCategoriaModel::getRecordActive();
        $data['getPopular'] = BlogModel::getPopular();

        $data['meta_titulo'] = $getPage->meta_titulo;
        $data['meta_descripcion'] = $getPage->meta_descripcion;
        $data['meta_p_clave'] = $getPage->meta_p_clave;

        return view('blog.lista', $data);
    }

    public function detalle_blog($slug)
    {
        $getBlog = BlogModel::getSingleSlug($slug);
        if (!empty($getBlog)) {
            $total_vistas = $getBlog->total_vistas;
            $getBlog->total_vistas = $total_vistas + 1;
            $getBlog->save();

            $data['getBlog'] = $getBlog;
            $data['meta_titulo'] = $getBlog->meta_titulo;
            $data['meta_descripcion'] = $getBlog->meta_descripcion;
            $data['meta_p_clave'] = $getBlog->meta_p_clave;

            $data['getBlogCategoria'] = BlogCategoriaModel::getRecordActive();
            $data['getPopular'] = BlogModel::getPopular();

            $data['getPostRelacionado'] = BlogModel::getPostRelacionado($getBlog->blogcategoria_id, $getBlog->id);

            return view('blog.detalles', $data);
        } else {
            abort(404);
        }
    }

    public function enviar_comentario(Request $request)
    {
        $comentario = new BlogComentarioModel();
        $comentario->user_id = Auth::user()->id;
        $comentario->blog_id = $request->blog_id;
        $comentario->comentario = trim($request->comentario);
        $comentario->save();

        return redirect()->back()->with('success', 'Tu cometario se ha publicado exitosamente');
    }
}
