<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
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

    // RUTAS DE LOS ADMINS :'v
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/listar', [AdminController::class, 'listar']);
    Route::get('admin/admin/agregar', [AdminController::class, 'agregar']);
    Route::post('admin/admin/agregar', [AdminController::class, 'insertar']);

    Route::get('admin/admin/editar/{id}', [AdminController::class, 'editar']);
    Route::post('admin/admin/editar/{id}', [AdminController::class, 'actualizar']);
    Route::get('admin/admin/eliminar/{id}', [AdminController::class, 'eliminar']);
});

Route::get('/', function () {
    return view('welcome');
});
