<?php

namespace App\Http\Controllers;

use App\Models\Negociante;
use App\Models\Transaccion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    //
    public function produccion(){
        $list_producciones = Transaccion::where('tipo_trans','produccion')->get();
        $hoy = Carbon::now();
        $produccion_exists_hoy = false;
        $id_exists_hoy = false;
        foreach($list_producciones as $item){
            // Si encuentra una produccion con la fecha de hoy, 
            // se debe ocultar el boton crear nueva produccion
            if ($hoy->isoFormat('D-M-Y') == $item->created_at->isoFormat('D-M-Y')){
                $produccion_exists_hoy = true;
                $id_exists_hoy = $item->cod_trans;
            }
        }

        return view('dashboard.produccion.index',compact('list_producciones','produccion_exists_hoy','id_exists_hoy'));
    }

    public function produccion_add(Request $request){
        $add_produccion = new Transaccion;
        $add_produccion->tipo_trans = 'produccion';
        $add_produccion->estado_trans = 'en curso';
        $add_produccion->fk_cod_usu_trans = $request->session()->get('usuario_activo');
        $add_produccion->fk_cod_neg_trans = 1;
        $add_produccion->save();
        return back();
    }

    public function produccion_info($id){
        $read_produccion = Transaccion::findOrFail($id);
        $read_usuario = User::find($read_produccion->fk_cod_usu_trans);
        $read_negociante = Negociante::find($read_produccion->fk_cod_neg_trans);
        return view('dashboard.produccion.info',compact('read_produccion','read_usuario','read_negociante'));
    }

    public function produccion_cerrar($id){
        $update_produccion = Transaccion::findOrFail($id);
        $update_produccion->estado_trans = 'realizado';
        $update_produccion->save();
        return redirect()->route('produccion')->with(['update_produccion'=>true]);
    }
    public function produccion_delete($id){
        $delete_produccion = Transaccion::findOrFail($id);
        // Devolucion de productos
        // 
        $delete_produccion->delete();
        return redirect()->route('produccion')->with(['delete_produccion'=>true]);
    }
}