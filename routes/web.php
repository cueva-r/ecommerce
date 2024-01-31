<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\SubCategoriaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

    // RUTAS DE LOS ADMINS
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
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
});

Route::get('/', function () {
    return view('welcome');
});
