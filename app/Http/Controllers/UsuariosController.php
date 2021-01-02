<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// Encriptar
use Illuminate\Support\Facades\Crypt;

class UsuariosController extends Controller
{
    // Gestión Usuarios
    public function usuarios(Request $request){
        $list_usuarios = User::get();
        return view('dashboard.opciones_admin.index',compact('list_usuarios'));
    }
    public function usuarios_add(Request $request){
        $request->validate([
            'ci_usu' => 'required|regex:/[0-9]/|size:10|unique:users,ci_usu',
            'apellido_usu' => 'required|regex:/[A-Za-z\s]/|max:50',
            'nombre_usu' => 'required|regex:/[A-Za-z\s]/|max:50',
            'cargo_usu' => '',
            'telefono_usu' => 'nullable|regex:/[0-9]/|min:9|max:13',
            'direccion_usu' => 'nullable|regex:/[A-Za-z0-9\s]/|max:150',
            'correo_usu' => 'required|email|unique:users,correo_usu',
            'clave_usu' => 'required|min:8',
            'clave_usu_rep' => 'required|same:clave_usu',
        ], [
            // 'ci_usu.required' => 'Campo obligatorio',
        ]);
        $new_user = new User;
        $new_user->ci_usu = $request->ci_usu;
        $new_user->apellido_usu = $request->apellido_usu;
        $new_user->nombre_usu = $request->nombre_usu;
        $new_user->cargo_usu = $request->cargo_usu;
        $new_user->telefono_usu = $request->telefono_usu;
        $new_user->direccion_usu = $request->direccion_usu;
        $new_user->correo_usu = $request->correo_usu;
        $new_user->clave_usu = Crypt::encrypt($request->clave_usu);
        $new_user->save();
        // 
        $read_user = User::where('ci_usu','=',$new_user->ci_usu)->first();
        // 
        return back()->with(['add_user'=> true,
                            'id_user'  => $read_user->cod_usu]);
    }
    public function usuarios_info(Request $request, $id){
        $read_user = User::findOrFail($id);
        return view('dashboard.opciones_admin.usuariosInfo',compact('read_user'));
    }
    public function usuarios_quitar_acceso($id){
        $update_user = User::findOrFail($id);
        $update_user->estado_usu = false; 
        $update_user->save(); 
        return back();
    }
    public function usuarios_dar_acceso($id){
        $update_user = User::findOrFail($id);
        $update_user->estado_usu = true; 
        $update_user->save(); 
        return back();
    }
    public function usuarios_editar_clave(Request $request, $id){
        // return $update_user;
        $request->validate([
            'clave_act_usu' => 'required|min:8',
            'clave_rep_usu' => 'required|same:clave_act_usu',
        ],[
            'clave_rep_usu.same' => 'Las contraseñas no coinciden'
            ]);

        $update_user = User::findOrFail($id);
        $update_user->clave_usu = Crypt::encrypt($request->clave_act_usu); 
        $update_user->save(); 
        return back()->with(['update_pass'=>true]);
    }
    public function usuarios_update(Request $request, $id){
        $request->validate([
            'ci_usu' => 'required|regex:/[0-9]/|size:10|unique:users,ci_usu,'.$id.',cod_usu',
            'apellido_usu' => 'required|regex:/[A-Za-z\s]/|max:50',
            'nombre_usu' => 'required|regex:/[A-Za-z\s]/|max:50',
            'cargo_usu' => '',
            'telefono_usu' => 'nullable|regex:/[0-9]/|min:9|max:13',
            'direccion_usu' => 'nullable|regex:/[A-Za-z0-9\s]/|max:150',
            'correo_usu' => 'required|email|unique:users,correo_usu,'.$id.',cod_usu',
        ], [
            'ci_usu.unique' => 'Este CI/ID ya existe y pertenece a otra persona',
            'correo_usu.unique' => 'Este correo ya existe y pertenece a otra persona',
        ]);
        $update_user = User::findOrFail($id);
        // 
        $update_user->ci_usu = $request->ci_usu;
        $update_user->apellido_usu = $request->apellido_usu;
        $update_user->nombre_usu = $request->nombre_usu;
        $update_user->cargo_usu = $request->cargo_usu;
        $update_user->telefono_usu = $request->telefono_usu;
        $update_user->direccion_usu = $request->direccion_usu;
        $update_user->correo_usu = $request->correo_usu;
        $update_user->save();
        //
        return back()->with(['update_user'=> true]);
    }
    public function usuarios_eliminar($id){
        $update_user = User::findOrFail($id);
        // 
        $update_user->delete();
        return redirect()->route('usuarios')->with(['delete_user'=> true]);
    }
    // Perfil Usuario
    public function perfil_usuario(Request $request){
        $read_user = User::findOrFail($request->session()->get('usuario_activo'));
        return view('dashboard.opciones_admin.info',compact('read_user'));
    }
}