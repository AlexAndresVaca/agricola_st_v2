<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Producto;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class DetalleController extends Controller
{
    //
    public function add_prod_det(Request $request, $tipo, $id){
        // return $request->tipo_prod;
        $request->validate([
            'tipo_prod' => 'required',
            'color_prod' => 'required',
            'destino_prod' => 'required',
            'tamano_prod' => 'required',
            'cant_prod' => 'required|min:0',
        ]);
        $producto = Producto::where('tipo_prod',  $request->tipo_prod)
                                ->where('color_prod',  $request->color_prod)
                                ->where('destino_prod',$request->destino_prod)
                                ->where('tamano_prod', $request->tamano_prod)
                                ->first();
        // Validar que el producto escogido exista
        if($producto == ''){
            return back()->withErrors(['prod_no_encontrado'=>true])->withInput();
        }
        // Comprobar que tengo el stock suficiente para realizar la venta
        if($producto->stock_prod < $request->cant_prod AND $tipo == 'venta'){
            return back()->withErrors(['stock_insuficiente'=>true])->withInput();
        }
        
        // Creear nueva tabla
        $add_detalle = new Detalle;
        $add_detalle->fk_cod_trans_det = $id;
        $add_detalle->fk_cod_prod_det = $producto->cod_prod;
        $add_detalle->cantidad_det = $request->cant_prod;
        
        // Actualizar productos en stock
        if($tipo == 'produccion' OR $tipo == 'compra'){
            $producto->stock_prod = intval($producto->stock_prod) + intval($request->cant_prod);
            $add_detalle->cantidad_existencia_det = $producto->stock_prod;
            $producto->save();  
        }
        elseif($tipo == 'venta'){
            $producto->stock_prod = intval($producto->stock_prod) - intval($request->cant_prod);
            $add_detalle->cantidad_existencia_det = $producto->stock_prod;
            $producto->save();  
        }

        $add_detalle->save();
        return back()->with(['add_prod_det'=>true]);
        
    }
    public function delete_prod_det(Request $request, $tipo,$id, $id_det){
        // Recuperar id de detalle
        $delete_det = Detalle::findOrFail($id_det);
        // Devolver
        // Actualizar producto
        $producto = Producto::findOrFail($delete_det->fk_cod_prod_det);
        if($tipo == 'produccion' OR $tipo == 'compra' ){
            $producto->stock_prod = intval($producto->stock_prod) - intval($delete_det->cantidad_det);
            $producto->save();  
        }
        elseif($tipo == 'venta' ){
            $producto->stock_prod = intval($producto->stock_prod) + intval($delete_det->cantidad_det);
            $producto->save();  
        }
        $delete_det->delete();
        return back()->with(['delete_prod_det'=>true]);
        
    }
}