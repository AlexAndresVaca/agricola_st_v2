<?php

namespace App\Http\Controllers;

use App\Models\Negociante;
use App\Models\Transaccion;
use Illuminate\Http\Request;

class NegociantesController extends Controller
{
    //
    public function negociantes(){
        $list_negociantes = Negociante::get();
        return view('dashboard.negociantes.index',compact('list_negociantes'));
    }
    public function negociantes_add(Request $request){
        $request->validate([
            'ci_neg' => 'required|regex:/[0-9]/|string|min:10|max:13|unique:negociantes,ci_neg',
            'apellido_neg' => 'required|regex:/[A-Za-z\s]/|max:50',
            'nombre_neg' => 'required|regex:/[A-Za-z\s]/|max:50',
            'celular_neg' => 'nullable|regex:/[0-9]/|size:9',
            'direccion_neg' => 'nullable|regex:/[A-Za-z0-9\s]/|max:150',
            'correo_neg' => 'required|email|unique:negociantes,correo_neg',
        ], [
            // 'ci_usu.required' => 'Campo obligatorio',
        ]);
        if(strlen($request->ci_neg) != 10 AND strlen($request->ci_neg) != 13){
            return back()->withErrors(['ci_neg'=>'No es una CI/ID o RUC válida'])->withInput();
        }
        $new_negociante = new Negociante;
        $new_negociante->ci_neg = $request->ci_neg;
        $new_negociante->apellido_neg = $request->apellido_neg;
        $new_negociante->nombre_neg = $request->nombre_neg;
        $new_negociante->celular_neg = $request->celular_neg;
        $new_negociante->direccion_neg = $request->direccion_neg;
        $new_negociante->correo_neg = $request->correo_neg;
        $new_negociante->save();
        // 
        $negociante_add = Negociante::where('ci_neg','=',$request->ci_neg)->first();
        return back()->with(['add_negociante'=> true,
                            'id_neg'  => $negociante_add->cod_neg]);
    }
    public function negociantes_info($id){
        $read_neg = Negociante::findOrFail($id);
        $historial = Transaccion::where('fk_cod_neg_trans',$id)
                                ->get();
        return view('dashboard.negociantes.info',compact('read_neg','historial'));
    }
    public function negociantes_update(Request $request,$id){
        $request->validate([
            'ci_neg' => 'required|regex:/[0-9]/|string|min:10|max:13|unique:negociantes,ci_neg,'.$id.',cod_neg',
            'apellido_neg' => 'required|regex:/[A-Za-z\s]/|max:50',
            'nombre_neg' => 'required|regex:/[A-Za-z\s]/|max:50',
            'celular_neg' => 'nullable|regex:/[0-9]/|size:9',
            'direccion_neg' => 'nullable|regex:/[A-Za-z0-9\s]/|max:150',
            'correo_neg' => 'required|email|unique:negociantes,correo_neg,'.$id.',cod_neg',
        ], [
            // 'ci_usu.required' => 'Campo obligatorio',
        ]);
        if(strlen($request->ci_neg) != 10 AND strlen($request->ci_neg) != 13){
            return back()->withErrors(['ci_neg'=>'No es una CI/ID o RUC válida'])->withInput();
        }
        $update_negociante = Negociante::findOrFail($id);
        $update_negociante->ci_neg = $request->ci_neg;
        $update_negociante->apellido_neg = $request->apellido_neg;
        $update_negociante->nombre_neg = $request->nombre_neg;
        $update_negociante->celular_neg = $request->celular_neg;
        $update_negociante->direccion_neg = $request->direccion_neg;
        $update_negociante->correo_neg = $request->correo_neg;
        $update_negociante->save();
        // 
        return back()->with(['update_negociante'=> true]);
    }
    public function negociantes_delete($id){
        if($id == 1){
            return back()->with(['error'=>true]);
        }
        $delete_neg = Negociante::findOrFail($id);
        $delete_neg->delete();
        return redirect()->route('negociantes')->with(['delete_negociante'=> true]);
    }

}