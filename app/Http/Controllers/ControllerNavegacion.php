<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerNavegacion extends Controller
{
    //
    public function index(){
        $a=1+3;
        return view('welcome');
    }
    public function login(){
        return view('dashboard.login');
    }
}
