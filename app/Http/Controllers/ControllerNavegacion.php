<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ControllerNavegacion extends Controller
{
    //
    public function index(){
        
        return view('welcome');
    }
    
    public function register(){
        return "Estas en el registro!";
        // return view('dashboard.login');
    }
    public function dashboard(Request $request){
        
        return view('dashboard.inicio')->with('nombre_usu_comp','Alex Vaca');
        
    }
    
    public function venta(){
        // return "Compra";
        return view('dashboard.ventas.index');
    }
    public function venta_info(){
        // return "CompraInfo";
        return view('dashboard.ventas.info');
    }
    
    

}