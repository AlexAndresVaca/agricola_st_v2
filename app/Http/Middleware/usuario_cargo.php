<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class usuario_cargo
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
        $login = User::findOrFail($request->session()->get('usuario_activo'));
            if($login->cargo_usu != 'Administrador'){
                return redirect()->route('dashboard')->with(['error_sin_acceso'=>true]);
            }
        return $next($request);
    }
}
