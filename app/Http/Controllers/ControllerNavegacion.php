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
        return view('dashboard.productos');
        
    }
    public function negociantes(){
        // return "dash";
        return view('dashboard.negociantes');
    }

}
