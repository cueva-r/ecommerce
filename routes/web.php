<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\MarcaController;
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

    // RUTAS DE LOS ADMINS
    Route::get('admin/admin/listar', [AdminController::class, 'listar']);
    Route::get('admin/admin/agregar', [AdminController::class, 'agregar']);
    Route::post('admin/admin/agregar', [AdminController::class, 'insertar']);
    Route::get('admin/admin/editar/{id}', [AdminController::class, 'editar']);
    Route::post('admin/admin/editar/{id}', [AdminController::class, 'actualizar']);
    Route::get('admin/admin/eliminar/{id}', [AdminController::class, 'eliminar']);

    //Ruta de las categorías
    Route::get('admin/categorias/listar', [CategoriaController::class, 'listar']);
    Route::get('admin/categorias/agregar', [CategoriaController::class, 'agregar']);
    Route::post('admin/categorias/agregar', [CategoriaController::class, 'insertar']);
    Route::get('admin/categorias/editar/{id}', [CategoriaController::class, 'editar']);
    Route::post('admin/categorias/editar/{id}', [CategoriaController::class, 'actualizar']);
    Route::get('admin/categorias/eliminar/{id}', [CategoriaController::class, 'eliminar']);

    //Ruta de las subcategorías
    Route::get('admin/subcategorias/listar', [SubCategoriaController::class, 'listar']);
    Route::get('admin/subcategorias/agregar', [SubCategoriaController::class, 'agregar']);
    Route::post('admin/subcategorias/agregar', [SubCategoriaController::class, 'insertar']);
    Route::get('admin/subcategorias/editar/{id}', [SubCategoriaController::class, 'editar']);
    Route::post('admin/subcategorias/editar/{id}', [SubCategoriaController::class, 'actualizar']);
    Route::get('admin/subcategorias/eliminar/{id}', [SubCategoriaController::class, 'eliminar']);

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
});

Route::get('/', [InicioController::class, 'inicio']);

Route::get('carrito', [PagoController::class, 'carrito']);
Route::get('carrito/eliminar/{id}', [PagoController::class, 'eliminar_carrito']);

Route::post('producto/agregar-al-carrito', [PagoController::class, 'agregar_al_carrito']);

Route::get('buscar', [ProductoFront::class, 'getProductoBuscar']);
Route::post('get_filtro_producto_ajax', [ProductoFront::class, 'getFiltroProductoAjax']);
Route::get('{categoria?}/{subcategoria?}', [ProductoFront::class, 'getCategoria']);

// Route::get('/', function () {
//     return view('welcome');
// });
