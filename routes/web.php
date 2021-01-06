<?php

use App\Http\Controllers\CompraController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerNavegacion;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NegociantesController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VentaController;

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
// Tanto la producción, la compra y la venta, comparte una misma tabla que es la de transacción
// Pero cada tipo de transacción tendrá su propio controlador
// Producción
Route::get('dashboard/produccion',[ProduccionController::class, 'produccion'] )->middleware('logeado')->name('produccion');
Route::POST('dashboard/produccion/add',[ProduccionController::class, 'produccion_add'] )->middleware('logeado')->name('produccion_add');
Route::get('dashboard/produccion/informacion={id}',[ProduccionController::class, 'produccion_info'] )->middleware('logeado')->name('produccionInfo');
Route::POST('dashboard/produccion/informacion={id}/delete',[ProduccionController::class, 'produccion_delete'] )->middleware('logeado')->name('produccion_delete');
Route::POST('dashboard/produccion/informacion={id}/close',[ProduccionController::class, 'produccion_cerrar'] )->middleware('logeado')->name('produccion_cerrar');

// Compra
Route::get('dashboard/compra',[CompraController::class, 'compra'] )->middleware('logeado')->name('compra');
Route::POST('dashboard/compra/negociante={id}/add',[CompraController::class, 'compra_add'] )->middleware('logeado')->name('compra_add');
Route::get('dashboard/compra/informacion={id}',[CompraController::class, 'compra_info'] )->middleware('logeado')->name('compraInfo');
Route::POST('dashboard/compra/informacion={id}/close',[CompraController::class, 'compra_cerrar'] )->middleware('logeado')->name('compra_cerrar');
Route::POST('dashboard/compra/informacion={id}/delete',[CompraController::class, 'compra_delete'] )->middleware('logeado')->name('compra_delete');

// Venta
Route::get('dashboard/venta',[VentaController::class, 'venta'] )->middleware('logeado')->name('venta');
Route::get('dashboard/venta/informacion={id}',[VentaController::class, 'venta_info'] )->middleware('logeado')->name('ventaInfo');
Route::POST('dashboard/venta/informacion={id}/add',[VentaController::class, 'venta_add'] )->middleware('logeado')->name('venta_add');
Route::POST('dashboard/venta/informacion={id}/close',[VentaController::class, 'venta_cerrar'] )->middleware('logeado')->name('venta_cerrar');
Route::POST('dashboard/venta/informacion={id}/delete',[VentaController::class, 'venta_delete'] )->middleware('logeado')->name('venta_delete');

// Detalle
Route::POST('dashboard/{tipo}/informacion={id}/add_product',[DetalleController::class, 'add_prod_det'] )->middleware('logeado')->name('add_prod_det');
Route::POST('dashboard/{tipo}/informacion={id}/{id_det}/delete_product',[DetalleController::class, 'delete_prod_det'] )->middleware('logeado')->name('delete_prod_det');

// 
Route::get('/register',[ControllerNavegacion::class, 'register'] )->middleware('logeado')->name('register');
Route::get('dashboard/',[ControllerNavegacion::class, 'dashboard'] )->middleware('logeado')->name('dashboard');