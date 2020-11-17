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
        $b = 1 + 3;
        return view('dashboard.login');
    }
}
