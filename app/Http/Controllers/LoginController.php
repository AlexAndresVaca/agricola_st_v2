<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        if(!is_null($request->session()->get('usuario_activo'))){
            $login = User::findOrFail($request->session()->get('usuario_activo'));
            if($login->estado_usu == false){
                return view('dashboard.login');
            }
            else{
                return redirect(route('dashboard'));
            }
        }
        return view('dashboard.login');
        
    }
    public function logout(Request $request){
        if(!is_null($request->session()->get('usuario_activo'))){
            $request->session()->forget('usuario_activo');
            $request->session()->forget('apellido_usuario_activo');
            $request->session()->forget('nombre_usuario_activo');
        }
        return redirect(route('login'));
    }
    public function login_access(Request $request){
        // Opcion recordar
        if($request->op_recuerdame == 'yes'){
            $request->session()->put('op_recuerdame', $request->ci_usu);
        }
        else{
            $request->session()->forget('op_recuerdame');
        }
        $request->validate([
            'ci_usu' => 'required',
            'clave_usu' => 'required',
        ], [
            'ci_usu.required' => 'Campo obligatorio',
            'clave_usu.required' => 'Campo obligatorio',
        ]);
        // 
        
        $login = User::where('ci_usu','=',$request->ci_usu)
                    ->orWhere('correo_usu','=',$request->ci_usu)
                    ->first();

        if(empty($login)){
            return back()->withErrors(['ci_usu'=>'Revisa tus datos y vuelve a intentar!'])->withInput();
        }
        elseif($request->clave_usu !== Crypt::decrypt($login->clave_usu)){
            return back()->withErrors(['ci_usu'=>'Revisa tus datos y vuelve a intentar!'])->withInput();

        }
        elseif($login->estado_usu == false){
            return back()->withErrors(['ci_usu'=>'Sin acceso!'])->withInput();
        }
        else{
            $request->session()->put('usuario_activo', $login->cod_usu);
            return redirect(route('dashboard'));
        }
        
    }
}