<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerNavegacion extends Controller
{
    //
    public function index(){
        
        return view('welcome');
    }
    public function login(){
        
        return view('dashboard.login');
    }
    public function register(){
        return "Estas en el registro!";
        // return view('dashboard.login');
    }
    public function dashboard(){
        // return "dash";
        return view('dashboard.inicio');
    }
    public function productos(){
        // return "dash";
        return view('dashboard.productos.index');
        
    }
    public function productos_info(){
        // return "dash";
        return view('dashboard.productos.info');
        
    }
    public function negociantes(){
        // return "dash";
        return view('dashboard.negociantes.index');
    }
    public function negociantes_info(){
        // return "dash";
        return view('dashboard.negociantes.info');
    }
    public function produccion(){
        // return "dash";
        return view('dashboard.produccion.index');
    }
    public function produccion_info(){
        // return "dash";
        return view('dashboard.produccion.info');
    }
    public function compra(){
        // return "Compra";
        return view('dashboard.compras.index');
    }
    public function compra_info(){
        // return "CompraInfo";
        return view('dashboard.compras.info');
    }
    public function perfil_usuario(){
        // return "Perfil usuario";
        return view('dashboard.opciones_admin.info');
    }
    public function usuarios(){
        // return "Perfil usuario";
        return view('dashboard.opciones_admin.index');
    }
    public function usuarios_info(){
        // return "Perfil usuario";
        return view('dashboard.opciones_admin.usuariosInfo');
    }

}