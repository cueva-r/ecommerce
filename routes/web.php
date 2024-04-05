<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CodigoDescuentoController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CostoEnvioController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\Admin\PedidosController;
use App\Http\Controllers\Admin\SubCategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\AuthController;
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

    //Ruta de las categorías
    Route::get('admin/categorias/listar', [CategoriaController::class, 'listar']);
    Route::get('admin/categorias/agregar', [CategoriaController::class, 'agregar']);
    Route::post('admin/categorias/agregar', [CategoriaController::class, 'insertar']);
    Route::get('admin/categorias/editar/{id}', [CategoriaController::class, 'editar']);
    Route::post('admin/categorias/editar/{id}', [CategoriaController::class, 'actualizar']);
    Route::get('admin/categorias/eliminar/{id}', [CategoriaController::class, 'eliminar']);
    Route::get('admin/categorias/reingresar/{id}', [CategoriaController::class, 'reingresar']);

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
});

Route::get('/', [InicioController::class, 'inicio']);
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
