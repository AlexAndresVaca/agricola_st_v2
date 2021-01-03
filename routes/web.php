<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerNavegacion;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NegociantesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;

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
// Controlar login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::POST('login/access',[LoginController::class,'login_access'])->name('login_access');
Route::POST('login/out',[LoginController::class,'logout'])->name('logout');
// Usuarios
Route::get('dashboard/usuarios',[UsuariosController::class, 'usuarios'] )->middleware('logeado','cargo')->name('usuarios');
Route::POST('dashboard/usuarios/add',[UsuariosController::class, 'usuarios_add'] )->middleware('logeado','cargo')->name('usuarios_add');
Route::get('dashboard/usuarios/perfil={id}/',[UsuariosController::class, 'usuarios_info'] )->middleware('logeado','cargo')->name('usuariosInfo');
Route::POST('dashboard/usuarios/perfil={id}/update',[UsuariosController::class, 'usuarios_update'] )->middleware('logeado','cargo')->name('usuarios_update');
Route::POST('dashboard/usuarios/perfil={id}/quitar_acceso',[UsuariosController::class, 'usuarios_quitar_acceso'] )->middleware('logeado','cargo')->name('usuario_quitar_acceso');
Route::POST('dashboard/usuarios/perfil={id}/dar_acceso',[UsuariosController::class, 'usuarios_dar_acceso'] )->middleware('logeado','cargo')->name('usuario_dar_acceso');
Route::POST('dashboard/usuarios/perfil={id}/editar_clave',[UsuariosController::class, 'usuarios_editar_clave'] )->middleware('logeado','cargo')->name('usuarios_editar_clave');
Route::POST('dashboard/usuarios/perfil={id}/eliminar',[UsuariosController::class, 'usuarios_eliminar'] )->middleware('logeado','cargo')->name('usuarios_eliminar');
// Perfil
Route::get('dashboard/perfil',[UsuariosController::class, 'perfil_usuario'] )->middleware('logeado')->name('perfil_usuario');
// Negociantes
Route::get('dashboard/negociantes',[NegociantesController::class, 'negociantes'] )->middleware('logeado')->name('negociantes');
Route::POST('dashboard/negociantes/add',[NegociantesController::class, 'negociantes_add'] )->middleware('logeado')->name('negociantes_add');
Route::get('dashboard/negociantes/informacion={id}',[NegociantesController::class, 'negociantes_info'] )->middleware('logeado')->name('negociantesInfo');
Route::POST('dashboard/negociantes/informacion={id}/update',[NegociantesController::class, 'negociantes_update'] )->middleware('logeado')->name('negociantes_update');
Route::POST('dashboard/negociantes/informacion={id}/delete',[NegociantesController::class, 'negociantes_delete'] )->middleware('logeado')->name('negociantes_delete');
// Producto
Route::get('dashboard/productos/',[ProductosController::class, 'productos'] )->middleware('logeado')->name('productos');
Route::POST('dashboard/productos/add',[ProductosController::class, 'productos_add'] )->middleware('logeado')->name('productos_add');
Route::get('dashboard/productos/informacion_pdt={id}/',[ProductosController::class, 'productos_info'] )->middleware('logeado')->name('productosInfo');
Route::POST('dashboard/productos/informacion_pdt={id}/update',[ProductosController::class, 'productos_update'] )->middleware('logeado')->name('productos_update');
Route::POST('dashboard/productos/informacion_pdt={id}/delete',[ProductosController::class, 'productos_delete'] )->middleware('logeado')->name('productos_delete');
// 
Route::get('/register',[ControllerNavegacion::class, 'register'] )->name('register');
Route::get('dashboard/',[ControllerNavegacion::class, 'dashboard'] )->middleware('logeado')->name('dashboard');
Route::get('dashboard/produccion',[ControllerNavegacion::class, 'produccion'] )->name('produccion');
Route::get('dashboard/produccion/informacion',[ControllerNavegacion::class, 'produccion_info'] )->name('produccionInfo');
Route::get('dashboard/compra',[ControllerNavegacion::class, 'compra'] )->name('compra');
Route::get('dashboard/compra/informacion',[ControllerNavegacion::class, 'compra_info'] )->name('compraInfo');
Route::get('dashboard/venta',[ControllerNavegacion::class, 'venta'] )->name('venta');
Route::get('dashboard/venta/informacion',[ControllerNavegacion::class, 'venta_info'] )->name('ventaInfo');
