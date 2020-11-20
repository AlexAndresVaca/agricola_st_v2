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
Route::get('dashboard/negociantes',[ControllerNavegacion::class, 'negociantes'] )->name('negociantes');