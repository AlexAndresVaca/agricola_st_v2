<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerNavegacion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rutas navegación por el sistema
Route::get('/', [ControllerNavegacion::class, 'index'])->name('index');
Route::get('/login', [ControllerNavegacion::class, 'login'])->name('login');
Route::get('/register',[ControllerNavegacion::class, 'register'] )->name('register');
Route::get('dashboard/',[ControllerNavegacion::class, 'dashboard'] )->name('dashboard');
Route::get('dashboard/productos/',[ControllerNavegacion::class, 'productos'] )->name('productos');
Route::get('dashboard/productos/informacion/',[ControllerNavegacion::class, 'productos_info'] )->name('productosInfo');
Route::get('dashboard/negociantes',[ControllerNavegacion::class, 'negociantes'] )->name('negociantes');
Route::get('dashboard/negociantes/informacion',[ControllerNavegacion::class, 'negociantes_info'] )->name('negociantesInfo');
Route::get('dashboard/produccion',[ControllerNavegacion::class, 'produccion'] )->name('produccion');
Route::get('dashboard/produccion/informacion',[ControllerNavegacion::class, 'produccion_info'] )->name('produccionInfo');
Route::get('dashboard/compra',[ControllerNavegacion::class, 'compra'] )->name('compra');
Route::get('dashboard/compra/informacion',[ControllerNavegacion::class, 'compra_info'] )->name('compraInfo');
Route::get('dashboard/usuarios',[ControllerNavegacion::class, 'usuarios'] )->name('usuarios');
Route::get('dashboard/usuarios/perfil',[ControllerNavegacion::class, 'usuarios_info'] )->name('usuariosInfo');
Route::get('dashboard/perfil',[ControllerNavegacion::class, 'perfil_usuario'] )->name('perfil_usuario');