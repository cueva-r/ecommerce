<?php

use App\Livewire\CartComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\HomeComponent;
use App\Livewire\ShopComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", HomeComponent::class);

Route::get("/shop", ShopComponent::class);

Route::get("/cart", CartComponent::class);

Route::get("/checkout", CheckoutComponent::class);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//para los usuarios
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

});

// para admin
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

});
