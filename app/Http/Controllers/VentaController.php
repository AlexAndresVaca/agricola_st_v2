<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Negociante;
use App\Models\Producto;
use App\Models\Transaccion;
use App\Models\User;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    //
    public function venta(){

        $list_ventas = Transaccion::select('transaccions.*','negociantes.apellido_neg','negociantes.nombre_neg')
                                    ->join('negociantes', 'negociantes.cod_neg', '=', 'transaccions.fk_cod_neg_trans')
                                    ->where('tipo_trans','venta')
                                    ->get();

        $list_ventas_sn_personas = Transaccion::where('tipo_trans', '=', 'venta')
                                                ->where(function ($query) {
                                                    $query->whereNull('fk_cod_neg_trans');
                                                    })
                                                ->get();
        $list_negociantes = Negociante::where('tipo_neg','=','Cliente')->get();
        return view('dashboard.ventas.index',compact('list_ventas','list_ventas_sn_personas','list_negociantes'));
    }
    public function venta_add(Request $request, $id){
        $add_compra = new Transaccion;
        $add_compra->tipo_trans = 'venta';
        $add_compra->estado_trans = 'en curso';
        $add_compra->fk_cod_usu_trans = $request->session()->get('usuario_activo');
        $add_compra->fk_cod_neg_trans = intval($id);
        $add_compra->save();
        $new_compra = Transaccion::where('tipo_trans','venta')
                                    ->where('estado_trans','en curso')
                                    ->where('fk_cod_usu_trans',$request->session()->get('usuario_activo'))
                                    ->where('fk_cod_neg_trans',intval($id))
                                    ->orderBy('cod_trans','desc')
                                    ->first();
        return redirect()->route('ventaInfo',$new_compra)->with(['add_venta'=>true]);
    }
    public function venta_info($id){
        $read_venta = Transaccion::where('cod_trans',$id)->where('tipo_trans','venta')->first();
        if($read_venta == ''){
            return redirect()->route('venta');
        }
        $read_usuario = User::find($read_venta->fk_cod_usu_trans);
        $read_negociante = Negociante::find($read_venta->fk_cod_neg_trans);
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
        return view('dashboard.ventas.info',compact('read_venta','read_usuario','read_negociante','tipo','color','destino','tamano','detalle'));
    }
    public function venta_cerrar($id){
        $update_venta = Transaccion::findOrFail($id);
        $update_venta->estado_trans = 'realizado';
        $update_venta->save();
        return redirect()->route('venta')->with(['update_venta'=>true]);
    }
    
    public function venta_delete($id){
        $delete_venta = Transaccion::findOrFail($id);
        // Devolucion de productos
        // Localizamos el detalle
        $detalle = Detalle::where('fk_cod_trans_det',$id)->get();
        foreach ($detalle as $item) {
            // Localizamos el producto
            $producto = Producto::findOrFail($item->fk_cod_prod_det);
            $producto->stock_prod = $producto->stock_prod + $item->cantidad_det; 
            $producto->save(); 
        }
        // 
        $delete_venta->delete();
        return redirect()->route('venta')->with(['delete_venta'=>true]);
    }
}