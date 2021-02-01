<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Negociante;
use App\Models\Producto;
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
        $estado = false;
        foreach($list_producciones as $item){
            // Si encuentra una produccion con la fecha de hoy, 
            // se debe ocultar el boton crear nueva produccion
            if ($hoy->isoFormat('D-M-Y') == $item->created_at->isoFormat('D-M-Y')){
                $produccion_exists_hoy = true;
                $id_exists_hoy = $item->cod_trans;
                $estado = $item->estado_trans;
            }
        }

        return view('dashboard.produccion.index',compact('list_producciones','produccion_exists_hoy','id_exists_hoy','estado'));
    }

    public function produccion_add(Request $request){
        $add_produccion = new Transaccion;
        $add_produccion->tipo_trans = 'produccion';
        $add_produccion->estado_trans = 'en curso';
        $add_produccion->fk_cod_usu_trans = $request->session()->get('usuario_activo');
        $add_produccion->fk_cod_neg_trans = 1;
        $add_produccion->save();
        return back()->with(['add_produccion'=> true]);
    }

    public function produccion_info($id){
        $read_produccion = Transaccion::where('cod_trans',$id)->where('tipo_trans','produccion')->first();
        // Si no es una produccion;
        if($read_produccion == ''){
            return redirect()->route('produccion');
        }
        $read_usuario = User::find($read_produccion->fk_cod_usu_trans);
        $read_negociante = Negociante::find($read_produccion->fk_cod_neg_trans);
        // Rellenar campos par la seleccion de productos
        $tipo = Producto::select('tipo_prod')->groupBy('tipo_prod')->get();
        $color = Producto::select('color_prod')->groupBy('color_prod')->get();
        $destino = Producto::select('destino_prod')->groupBy('destino_prod')->get();
        $tamano = Producto::select('tamano_prod')->groupBy('tamano_prod')->get();
        // 
        // Detalle
        $detalle = Detalle::select('cod_det','tipo_prod','color_prod','destino_prod','tamano_prod','cantidad_det')
                            ->join('productos','productos.cod_prod','=','detalles.fk_cod_prod_det')
                            ->where('fk_cod_trans_det',$id)
                            ->get();
        // return $detalle;
        return view('dashboard.produccion.info',compact('read_produccion','read_usuario','read_negociante','tipo','color','destino','tamano','detalle'));
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
        // Localizamos el detalle
        $detalle = Detalle::where('fk_cod_trans_det',$id)->get();
        foreach ($detalle as $item) {
            // Localizamos el producto
            $producto = Producto::findOrFail($item->fk_cod_prod_det);
            $producto->stock_prod = $producto->stock_prod - $item->cantidad_det; 
            $producto->save(); 
        }
        // 
        $delete_produccion->delete();
        return redirect()->route('produccion')->with(['delete_produccion'=>true]);
    }
}