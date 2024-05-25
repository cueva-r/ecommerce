<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoriaController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CodigoDescuentoController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CostoEnvioController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PedidosController;
use App\Http\Controllers\Admin\SubCategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\SociosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteDashboardController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController as ProductoFront;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('admin', function () {
//     return view('admin.auth.login');
// });

Route::get('admin', [AuthController::class, 'login_admin']);
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::get('admin/cerrar-sesion', [AuthController::class, 'cerrar_sesion_admin']);

// cliente :)
Route::group(['middleware' => 'cliente'], function () {
    Route::get('cliente/dashboard', [ClienteDashboardController::class, 'dashboard']);
    Route::get('cliente/pedidos', [ClienteDashboardController::class, 'pedidos']);
    Route::get('cliente/editar-perfil', [ClienteDashboardController::class, 'editar_perfil']);
    Route::post('cliente/editar-perfil', [ClienteDashboardController::class, 'actualizar_perfil']);
    Route::get('cliente/cambiar-contrasena', [ClienteDashboardController::class, 'cambiar_contrasena']);
    Route::post('cliente/cambiar-contrasena', [ClienteDashboardController::class, 'actualizar_contrasena']);

    Route::get('cliente/pedidos/detalles/{id}', [ClienteDashboardController::class, 'detalle_pedido']);

    Route::get('cliente/notificaciones', [ClienteDashboardController::class, 'notificaciones']);

    Route::post('agregar_a_la_lista_de_deseos', [ClienteDashboardController::class, 'agregar_a_la_lista_de_deseos']);
    Route::post('cliente/enviar-calificacion', [ClienteDashboardController::class, 'enviar_calificacion']);

    Route::get('mi-lista-de-deseos', [ProductoFront::class, 'mi_lista_de_deseos']);
});
 
// admin .-.
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    // Rutas de los asdmins
    Route::get('admin/admin/listar', [AdminController::class, 'listar']);
    Route::get('admin/admin/agregar', [AdminController::class, 'agregar']);
    Route::post('admin/admin/agregar', [AdminController::class, 'insertar']);
    Route::get('admin/admin/editar/{id}', [AdminController::class, 'editar']);
    Route::post('admin/admin/editar/{id}', [AdminController::class, 'actualizar']);
    Route::get('admin/admin/eliminar/{id}', [AdminController::class, 'eliminar']);
    Route::get('admin/admin/reingresar/{id}', [AdminController::class, 'reingresar']);

    // Ruta para los pedidos
    Route::get('admin/pedidos/listar', [PedidosController::class, 'listar']);
    Route::get('admin/pedidos/detalles/{id}', [PedidosController::class, 'detalles_pedido']);
    Route::get('admin/estado_pedido', [PedidosController::class, 'estado_pedido']);

    // Ruta para los clientes 
    Route::get('admin/clientes/listar', [AdminController::class, 'lista_clientes']);
    Route::get('admin/admin/eliminar_cliente/{id}', [AdminController::class, 'eliminar_cliente']);
    Route::get('admin/admin/reingresar_cliente/{id}', [AdminController::class, 'reingresar_cliente']);

    //Ruta de las categorías
    Route::get('admin/categorias/listar', [CategoriaController::class, 'listar']);
    Route::get('admin/categorias/agregar', [CategoriaController::class, 'agregar']);
    Route::post('admin/categorias/agregar', [CategoriaController::class, 'insertar']);
    Route::get('admin/categorias/editar/{id}', [CategoriaController::class, 'editar']);
    Route::post('admin/categorias/editar/{id}', [CategoriaController::class, 'actualizar']);
    Route::get('admin/categorias/eliminar/{id}', [CategoriaController::class, 'eliminar']);
    Route::get('admin/categorias/reingresar/{id}', [CategoriaController::class, 'reingresar']);

    // Ruta para el blog de categoría
    Route::get('admin/blogcategoria/listar', [BlogCategoriaController::class, 'listar']);
    Route::get('admin/blogcategoria/agregar', [BlogCategoriaController::class, 'agregar']);
    Route::post('admin/blogcategoria/agregar', [BlogCategoriaController::class, 'insertar']);
    Route::get('admin/blogcategoria/editar/{id}', [BlogCategoriaController::class, 'editar']);
    Route::post('admin/blogcategoria/editar/{id}', [BlogCategoriaController::class, 'actualizar']);
    Route::get('admin/blogcategoria/eliminar/{id}', [BlogCategoriaController::class, 'eliminar']);

    // Ruta para los blogs
    Route::get('admin/blog/listar', [BlogController::class, 'listar']);
    Route::get('admin/blog/agregar', [BlogController::class, 'agregar']);
    Route::post('admin/blog/agregar', [BlogController::class, 'insertar']);
    Route::get('admin/blog/editar/{id}', [BlogController::class, 'editar']);
    Route::post('admin/blog/editar/{id}', [BlogController::class, 'actualizar']);
    Route::get('admin/blog/eliminar/{id}', [BlogController::class, 'eliminar']);

    //Ruta de las subcategorías
    Route::get('admin/subcategorias/listar', [SubCategoriaController::class, 'listar']);
    Route::get('admin/subcategorias/agregar', [SubCategoriaController::class, 'agregar']);
    Route::post('admin/subcategorias/agregar', [SubCategoriaController::class, 'insertar']);
    Route::get('admin/subcategorias/editar/{id}', [SubCategoriaController::class, 'editar']);
    Route::post('admin/subcategorias/editar/{id}', [SubCategoriaController::class, 'actualizar']);
    Route::get('admin/subcategorias/eliminar/{id}', [SubCategoriaController::class, 'eliminar']);
    Route::get('admin/subcategorias/reingresar/{id}', [SubCategoriaController::class, 'reingresar']);

    Route::post('admin/get_subcategorias', [SubCategoriaController::class, 'get_subcategorias']);

    // Ruta para los productos
    Route::get('admin/productos/listar', [ProductoController::class, 'listar']);
    Route::get('admin/productos/agregar', [ProductoController::class, 'agregar']);
    Route::post('admin/productos/agregar', [ProductoController::class, 'insertar']);
    Route::get('admin/productos/editar/{id}', [ProductoController::class, 'editar']);
    Route::post('admin/productos/editar/{id}', [ProductoController::class, 'actualizar']);
    Route::get('admin/productos/eliminar_imagen/{id}', [ProductoController::class, 'eliminar_imagen']);

    Route::post('admin/producto_imagen_sortable', [ProductoController::class, 'producto_imagen_sortable']);

    //Ruta para las marcas
    Route::get('admin/marcas/listar', [MarcaController::class, 'listar']);
    Route::get('admin/marcas/agregar', [MarcaController::class, 'agregar']);
    Route::post('admin/marcas/agregar', [MarcaController::class, 'insertar']);
    Route::get('admin/marcas/editar/{id}', [MarcaController::class, 'editar']);
    Route::post('admin/marcas/editar/{id}', [MarcaController::class, 'actualizar']);
    Route::get('admin/marcas/eliminar/{id}', [MarcaController::class, 'eliminar']);

    //Ruta para los colores
    Route::get('admin/colores/listar', [ColorController::class, 'listar']);
    Route::get('admin/colores/agregar', [ColorController::class, 'agregar']);
    Route::post('admin/colores/agregar', [ColorController::class, 'insertar']);
    Route::get('admin/colores/editar/{id}', [ColorController::class, 'editar']);
    Route::post('admin/colores/editar/{id}', [ColorController::class, 'actualizar']);
    Route::get('admin/colores/eliminar/{id}', [ColorController::class, 'eliminar']);

    //Ruta para el codigo de descuento
    Route::get('admin/codigo_descuento/listar', [CodigoDescuentoController::class, 'listar']);
    Route::get('admin/codigo_descuento/agregar', [CodigoDescuentoController::class, 'agregar']);
    Route::post('admin/codigo_descuento/agregar', [CodigoDescuentoController::class, 'insertar']);
    Route::get('admin/codigo_descuento/editar/{id}', [CodigoDescuentoController::class, 'editar']);
    Route::post('admin/codigo_descuento/editar/{id}', [CodigoDescuentoController::class, 'actualizar']);
    Route::get('admin/codigo_descuento/eliminar/{id}', [CodigoDescuentoController::class, 'eliminar']);

    //Ruta para el costo de envío
    Route::get('admin/costo_envio/listar', [CostoEnvioController::class, 'listar']);
    Route::get('admin/costo_envio/agregar', [CostoEnvioController::class, 'agregar']);
    Route::post('admin/costo_envio/agregar', [CostoEnvioController::class, 'insertar']);
    Route::get('admin/costo_envio/editar/{id}', [CostoEnvioController::class, 'editar']);
    Route::post('admin/costo_envio/editar/{id}', [CostoEnvioController::class, 'actualizar']);
    Route::get('admin/costo_envio/eliminar/{id}', [CostoEnvioController::class, 'eliminar']);

    // Ruta para las paginas(pages :'v)
    Route::get('admin/paginas/listar', [PagesController::class, 'listar']);
    Route::get('admin/paginas/editar/{id}', [PagesController::class, 'editar']);
    Route::post('admin/paginas/editar/{id}', [PagesController::class, 'actualizar']);

    // Ruta configuración del sistema
    Route::get('admin/configuracion-sistema', [PagesController::class, 'configuracion_sistema']);
    Route::post('admin/configuracion-sistema', [PagesController::class, 'actualizar_configuracion_sistema']);
    
    Route::get('admin/smtp-configuracion', [PagesController::class, 'smtp_configuracion']);
    Route::post('admin/smtp-configuracion', [PagesController::class, 'actualizar_smtp_configuracion']);

    // Ruta configuración del inicio
    Route::get('admin/configuracion-inicio', [PagesController::class, 'configuracion_inicio']);
    Route::post('admin/configuracion-inicio', [PagesController::class, 'actualizar_configuracion_inicio']);

    // Ruta contactenos
    Route::get('admin/contactenos', [PagesController::class, 'contactenos']);
    Route::get('admin/contactenos/eliminar/{id}', [PagesController::class, 'eliminar_contactenos']);

    // Ruta sliders
    Route::get('admin/sliders/lista', [SlidersController::class, 'lista']);
    Route::get('admin/sliders/agregar', [SlidersController::class, 'agregar']);
    Route::post('admin/sliders/agregar', [SlidersController::class, 'insertar']);
    Route::get('admin/sliders/editar/{id}', [SlidersController::class, 'editar']);
    Route::post('admin/sliders/editar/{id}', [SlidersController::class, 'actualizar']);
    Route::get('admin/sliders/eliminar/{id}', [SlidersController::class, 'eliminar']);

    // Ruta socios
    Route::get('admin/socios/lista', [SociosController::class, 'lista']);
    Route::get('admin/socios/agregar', [SociosController::class, 'agregar']);
    Route::post('admin/socios/agregar', [SociosController::class, 'insertar']);
    Route::get('admin/socios/editar/{id}', [SociosController::class, 'editar']);
    Route::post('admin/socios/editar/{id}', [SociosController::class, 'actualizar']);
    Route::get('admin/socios/eliminar/{id}', [SociosController::class, 'eliminar']);

    Route::get('admin/notificaciones', [PagesController::class, 'notificaciones']);
});

Route::get('/', [InicioController::class, 'inicio']);

Route::post('recien_agregados_categoria_producto', [InicioController::class, 'recien_agregados_categoria_producto']);

Route::get('contactenos', [InicioController::class, 'contactenos']);
Route::post('contactenos', [InicioController::class, 'enviar_contactenos']);
Route::get('sobre-nosotros', [InicioController::class, 'sobre_nosotros']);

Route::get('blog', [InicioController::class, 'blog']);
Route::get('blog/{slug}', [InicioController::class, 'detalle_blog']);
Route::get('blog/categoria/{slug}', [InicioController::class, 'categoria_blog']);
Route::post('blog/enviar-comentario', [InicioController::class, 'enviar_comentario']);

Route::get('faq', [InicioController::class, 'faq']);
Route::get('metodo-pago', [InicioController::class, 'metodo_pago']);
Route::get('garantias', [InicioController::class, 'garantias']);
Route::get('devoluciones', [InicioController::class, 'devoluciones']);
Route::get('envios', [InicioController::class, 'envios']);
Route::get('terminos-condiciones', [InicioController::class, 'terminos_condiciones']);
Route::get('politica-privacidad', [InicioController::class, 'politica_privacidad']);

Route::post('registro', [AuthController::class, 'registro']);
Route::post('login', [AuthController::class, 'login']);

Route::get('cambiar-contrasena', [AuthController::class, 'cambiar_contrasena']);
Route::post('cambiar-contrasena', [AuthController::class, 'verificar_cambiar_contrasena']);
Route::get('cambiar/{token}', [AuthController::class, 'cambiar']);
Route::post('cambiar/{token}', [AuthController::class, 'verificar_cambiar']);
Route::get('activar/{id}', [AuthController::class, 'activar_email']);

Route::get('carrito', [PagoController::class, 'carrito']);
Route::post('actualizar_carrito', [PagoController::class, 'actualizar_carrito']);

Route::get('pagar', [PagoController::class, 'pagar']);
Route::post('pagar/aplicar_codigo_descuento', [PagoController::class, 'aplicar_codigo_descuento']);

Route::post('pagar/realizar_pedido', [PagoController::class, 'realizar_pedido']);
Route::get('pagar/pago', [PagoController::class, 'verificar_pago']);
Route::get('paypal/success-payment', [PagoController::class, 'paypal_success_payment']);
Route::get('stripe/payment-success', [PagoController::class, 'stripe_success_payment']);

Route::get('carrito/eliminar/{id}', [PagoController::class, 'eliminar_carrito']);

Route::post('producto/agregar-al-carrito', [PagoController::class, 'agregar_al_carrito']);

Route::get('buscar', [ProductoFront::class, 'getProductoBuscar']);
Route::post('get_filtro_producto_ajax', [ProductoFront::class, 'getFiltroProductoAjax']);
Route::get('{categoria?}/{subcategoria?}', [ProductoFront::class, 'getCategoria']);

// Route::get('/', function () {
//     return view('welcome');
// });
