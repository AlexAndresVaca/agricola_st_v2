<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Negociante;
use App\Models\Producto;
use App\Models\Transaccion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    //
    public function compra(){
        $list_compras = Transaccion::select('transaccions.*','negociantes.apellido_neg','negociantes.nombre_neg')
                                        ->join('negociantes', 'negociantes.cod_neg', '=', 'transaccions.fk_cod_neg_trans')
                                        ->where('tipo_trans','compra')
                                        ->get();
        // return $list_compras_sn_personas;
        $list_negociantes = Negociante::all();
        return view('dashboard.compras.index',compact('list_compras','list_negociantes'));
    }
    public function compra_add(Request $request, $id){
        $add_compra = new Transaccion;
        $add_compra->tipo_trans = 'compra';
        $add_compra->estado_trans = 'en curso';
        $add_compra->fk_cod_usu_trans = $request->session()->get('usuario_activo');
        $add_compra->fk_cod_neg_trans = intval($id);
        $add_compra->save();
        $new_compra = Transaccion::where('tipo_trans','compra')
                                    ->where('estado_trans','en curso')
                                    ->where('fk_cod_usu_trans',$request->session()->get('usuario_activo'))
                                    ->where('fk_cod_neg_trans',intval($id))
                                    ->orderBy('cod_trans','desc')
                                    ->first();
        return redirect()->route('compraInfo',$new_compra)->with(['add_compra'=>true]);
    }
    public function compra_info($id){
        // return "CompraInfo";
        $read_compra = Transaccion::where('cod_trans',$id)->where('tipo_trans','compra')->first();
        if($read_compra == ''){
            return redirect()->route('compra');
        }
        $read_usuario = User::find($read_compra->fk_cod_usu_trans);
        $read_negociante = Negociante::find($read_compra->fk_cod_neg_trans);
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
        return view('dashboard.compras.info',compact('read_compra','read_usuario','read_negociante','tipo','color','destino','tamano','detalle'));
    }
    public function compra_cerrar($id){
        $update_compra = Transaccion::findOrFail($id);
        $update_compra->estado_trans = 'realizado';
        $update_compra->save();
        return redirect()->route('compra')->with(['update_compra'=>true]);
    }
    public function compra_delete($id){
        $delete_compra = Transaccion::findOrFail($id);
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
        $delete_compra->delete();
        return redirect()->route('compra')->with(['delete_compra'=>true]);
    }
}