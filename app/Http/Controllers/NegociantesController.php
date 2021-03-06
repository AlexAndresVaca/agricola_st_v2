<?php

namespace App\Http\Controllers;

use App\Models\Negociante;
use App\Models\Transaccion;
use Illuminate\Http\Request;
// Validar CI/RUC
use App\Rules\validacionCI as cedula;

class NegociantesController extends Controller
{
    //
    public function negociantes($negociantes)
    {   
        if($negociantes == 'proveedor'){
            $negociantes_upper = 'Proveedores';
            $list_negociantes = Negociante::where('tipo_neg','=','Proveedor')->get()->except([1]);
        }
        else{
            $negociantes_upper = 'Clientes';
            $list_negociantes = Negociante::where('tipo_neg','=','Cliente')->get()->except([1]);
        }

        return view('dashboard.negociantes.index', compact('list_negociantes','negociantes','negociantes_upper'));
    }
    public function negociantes_add(Request $request)
    {
        $request->validate([
            'ci_neg' => ['required','unique:negociantes,ci_neg', new cedula],
            'apellido_neg' => 'required|regex:/[A-Za-z\s]/|max:50',
            'nombre_neg' => 'required|regex:/[A-Za-z\s]/|max:50',
            'celular_neg' => 'nullable|digits:9',
            'direccion_neg' => 'nullable|regex:/[A-Za-z0-9\s]/|max:150',
            'correo_neg' => 'required|email|unique:negociantes,correo_neg',
            'tipo_neg' => 'required',
        ], [
            // 'ci_usu.required' => 'Campo obligatorio',
            'celular_neg.digits' => 'No es un numero celular',
        ]);
        if (strlen($request->ci_neg) != 10 and strlen($request->ci_neg) != 13) {
            return back()->withErrors(['ci_neg' => 'No es una CI/ID o RUC válida'])->withInput();
        }
        $new_negociante = new Negociante;
        $new_negociante->ci_neg = $request->ci_neg;
        $new_negociante->apellido_neg = $request->apellido_neg;
        $new_negociante->nombre_neg = $request->nombre_neg;
        $new_negociante->celular_neg = $request->celular_neg;
        $new_negociante->direccion_neg = $request->direccion_neg;
        $new_negociante->correo_neg = $request->correo_neg;
        $new_negociante->tipo_neg = $request->tipo_neg;
        $new_negociante->save();
        // 
        $negociante_add = Negociante::where('ci_neg', '=', $request->ci_neg)->first();
        return back()->with([
            'add_negociante' => true,
            'id_neg'  => $negociante_add->cod_neg,
            'tipo_neg'  => $negociante_add->tipo_neg,
        ]);
    }
    public function negociantes_info($negociantes,$id)
    {
        if ($id == 1) {
            return back();
        }

        $read_neg = Negociante::findOrFail($id);
        $historial = Transaccion::where('fk_cod_neg_trans', $id)
            ->get();
        $num_compras = Transaccion::where('tipo_trans', 'compra')
            ->where('fk_cod_neg_trans', $id)
            ->get();
        $num_ventas = Transaccion::where('tipo_trans', 'venta')
            ->where('fk_cod_neg_trans', $id)
            ->get();
        // return $num_ventas->count();
        // return $num_compras->count();
        return view('dashboard.negociantes.info', compact('read_neg', 'historial', 'num_compras', 'num_ventas'));
    }
    public function negociantes_update(Request $request, $id)
    {
        $request->validate([
            'ci_neg' => ['required','unique:negociantes,ci_neg,' . $id . ',cod_neg', new cedula],
            'apellido_neg' => 'required|regex:/[A-Za-z\s]/|max:50',
            'nombre_neg' => 'required|regex:/[A-Za-z\s]/|max:50',
            'celular_neg' => 'nullable|digits:9',
            'direccion_neg' => 'nullable|regex:/[A-Za-z0-9\s]/|max:150',
            'correo_neg' => 'required|email|unique:negociantes,correo_neg,' . $id . ',cod_neg',
            'tipo_neg' => 'required',
        ], [
            // 'ci_usu.required' => 'Campo obligatorio',
            'celular_neg.digits' => 'No es un numero celular',
        ]);
        if (strlen($request->ci_neg) != 10 and strlen($request->ci_neg) != 13) {
            return back()->withErrors(['ci_neg' => 'No es una CI/ID o RUC válida'])->withInput();
        }
        $update_negociante = Negociante::findOrFail($id);
        $update_negociante->ci_neg = $request->ci_neg;
        $update_negociante->apellido_neg = $request->apellido_neg;
        $update_negociante->nombre_neg = $request->nombre_neg;
        $update_negociante->celular_neg = $request->celular_neg;
        $update_negociante->direccion_neg = $request->direccion_neg;
        $update_negociante->correo_neg = $request->correo_neg;
        $update_negociante->tipo_neg = $request->tipo_neg;
        $update_negociante->save();
        // 
        return back()->with(['update_negociante' => true]);
    }
    public function negociantes_delete($id)
    {
        if ($id == 1) {
            return back()->with(['error' => true]);
        }
        $delete_neg = Negociante::findOrFail($id);
        $negociantes = $delete_neg->tipo_neg;
        $delete_neg->delete();
        return redirect()->route('negociantes',['negociantes'=> strtolower($negociantes)])->with(['delete_negociante' => true]);
    }
}
