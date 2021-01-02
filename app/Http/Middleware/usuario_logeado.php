<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class usuario_logeado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(is_null($request->session()->get('usuario_activo'))){
            return redirect(route('login'));
        }
        else{
            $login = User::findOrFail($request->session()->get('usuario_activo'));
            if($login->estado_usu == false){
                return redirect(route('login'));
            }
        }
        $login = User::findOrFail($request->session()->get('usuario_activo'));
        $request->session()->put('apellido_usuario_activo', $login->apellido_usu);
        $request->session()->put('nombre_usuario_activo', $login->nombre_usu);
        $request->session()->put('cargo_usuario_activo', $login->cargo_usu);
        return $next($request);
    }
}
