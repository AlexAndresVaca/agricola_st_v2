<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //
    public function productos(Request $request){
        $list_productos = Producto::all();
       
        return view('dashboard.productos.index',compact('list_productos'));
        
    }
    public function productos_add (Request $request){
        $request->validate([
            'tipo_prod' => 'required|regex:/[A-Za-z\s]/|max:15',
            'color_prod' => 'required|regex:/[A-Za-z\s]/|max:5',
            'destino_prod' => 'required|regex:/[A-Za-z\s]/|max:10',
            'tamano_prod' => 'required|regex:/[A-Za-z\s]/|max:10',
        ], [
            // 'ci_usu.required' => 'Campo obligatorio',
        ]);
        // Comprobar si ese producto ya existe
        $ya_existente = Producto::where('tipo_prod',$request->tipo_prod)
                                ->where('color_prod',$request->color_prod)
                                ->where('destino_prod',$request->destino_prod)
                                ->where('tamano_prod',$request->tamano_prod)
                                ->first();

        if($ya_existente != []){
            return back()->withErrors(['tipo_prod'=>'Este producto existe'])->withInput();
        }
        // Obtener clave
        $clave = substr($request->tipo_prod, 0 , 1).substr($request->color_prod, 0, 1).substr($request->destino_prod, 0 ,1 ).substr($request->tamano_prod, 0,1);
        $clave =  strtoupper($clave);
        //
        $add_prod = new Producto;
        $add_prod->clave_prod = $clave; 
        $add_prod->tipo_prod = $request->tipo_prod; 
        $add_prod->color_prod = $request->color_prod; 
        $add_prod->destino_prod = $request->destino_prod; 
        $add_prod->tamano_prod = $request->tamano_prod; 
        $add_prod->stock_prod = 0; 
        $add_prod->save();
        $new_prod = Producto::where('tipo_prod',$add_prod->tipo_prod)
                                ->where('color_prod',$add_prod->color_prod)
                                ->where('destino_prod',$add_prod->destino_prod)
                                ->where('tamano_prod',$add_prod->tamano_prod)
                                ->first();

        return back()->with(['add_producto'=>true,
                            'id_producto' => $new_prod->cod_prod]); 
    }
    public function productos_update (Request $request, $id){
        $request->validate([
            'tipo_prod' => 'required|regex:/[A-Za-z\s]/|max:15',
            'color_prod' => 'required|regex:/[A-Za-z\s]/|max:5',
            'destino_prod' => 'required|regex:/[A-Za-z\s]/|max:10',
            'tamano_prod' => 'required|regex:/[A-Za-z\s]/|max:10',
        ], [
            // 'ci_usu.required' => 'Campo obligatorio',
        ]);
        // Comprobar si ese producto ya existe
        $ya_existente = Producto::where('tipo_prod',$request->tipo_prod)
                                ->where('color_prod',$request->color_prod)
                                ->where('destino_prod',$request->destino_prod)
                                ->where('tamano_prod',$request->tamano_prod)
                                ->get();

        foreach ($ya_existente as $item) {
            if($item->cod_prod != $id ){
                return back()->withErrors(['producto_existente'=> true])->withInput();
            }
        }
        $update_prod = Producto::findOrFail($id);
        // Obtener clave
        $clave = substr($request->tipo_prod, 0 , 1).substr($request->color_prod, 0, 1).substr($request->destino_prod, 0 ,1 ).substr($request->tamano_prod, 0,1);
        $clave =  strtoupper($clave);
        //
        $update_prod->clave_prod = $clave; 
        $update_prod->tipo_prod = $request->tipo_prod; 
        $update_prod->color_prod = $request->color_prod; 
        $update_prod->destino_prod = $request->destino_prod; 
        $update_prod->tamano_prod = $request->tamano_prod; 
        $update_prod->save();

        return back()->with(['update_producto'=>true,
                            ]); 
    }
    public function productos_info($id){
        $read_producto = Producto::findOrFail($id);
        $num_transaccciones = Detalle::where('fk_cod_prod_det',$id)->get();
        return view('dashboard.productos.info',compact('read_producto','num_transaccciones'));
        
    }
    public function productos_delete($id){
        $read_producto = Producto::findOrFail($id);
        $read_producto->delete();
        return redirect()->route('productos')->with(['delete_producto'=>true]);
        
    }
}