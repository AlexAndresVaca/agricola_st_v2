<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Producto;
use App\Models\Transaccion;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //
    public function productos(Request $request)
    {
        $list_productos = Producto::all();

        return view('dashboard.productos.index', compact('list_productos'));
    }
    public function productos_add(Request $request)
    {
        $request->validate([
            'tipo_prod' => 'required|regex:/[A-Za-z\s]/|max:15',
            'color_prod' => 'required|regex:/[A-Za-z\s]/|max:5',
            'destino_prod' => 'required|regex:/[A-Za-z\s]/|max:10',
            'tamano_prod' => 'required|regex:/[A-Za-z\s]/|max:10',
        ], [
            // 'ci_usu.required' => 'Campo obligatorio',
        ]);
        // Obtener clave
        $clave = substr($request->tipo_prod, 0, 3) . '-' . substr($request->color_prod, 0, 1) . substr($request->destino_prod, 0, 1) . substr($request->tamano_prod, 0, 1);
        $clave =  strtoupper($clave);
        $ya_existente_clave = Producto::where('clave_prod', '=', $clave)->get();
        if (count($ya_existente_clave) > 0) {
            return back()->withErrors(['tipo_prod' => 'Existe un conflicto por claves repetidas'])->withInput();
        }
        //
        // Comprobar si ese producto ya existe
        $ya_existente = Producto::where('tipo_prod', $request->tipo_prod)
            ->where('color_prod', $request->color_prod)
            ->where('destino_prod', $request->destino_prod)
            ->where('tamano_prod', $request->tamano_prod)
            ->first();

        if ($ya_existente != []) {
            return back()->withErrors(['tipo_prod' => 'Este producto existe'])->withInput();
        }
        // 
        $add_prod = new Producto;
        $add_prod->clave_prod = $clave;
        $add_prod->tipo_prod = $request->tipo_prod;
        $add_prod->color_prod = $request->color_prod;
        $add_prod->destino_prod = $request->destino_prod;
        $add_prod->tamano_prod = $request->tamano_prod;
        $add_prod->stock_prod = 0;
        $add_prod->save();
        $new_prod = Producto::where('tipo_prod', $add_prod->tipo_prod)
            ->where('color_prod', $add_prod->color_prod)
            ->where('destino_prod', $add_prod->destino_prod)
            ->where('tamano_prod', $add_prod->tamano_prod)
            ->first();

        return back()->with([
            'add_producto' => true,
            'id_producto' => $new_prod->cod_prod
        ]);
    }
    public function productos_update(Request $request, $id)
    {
        $request->validate([
            'tipo_prod' => 'required|regex:/[A-Za-z\s]/|max:15',
            'color_prod' => 'required|regex:/[A-Za-z\s]/|max:5',
            'destino_prod' => 'required|regex:/[A-Za-z\s]/|max:10',
            'tamano_prod' => 'required|regex:/[A-Za-z\s]/|max:10',
        ], [
            // 'ci_usu.required' => 'Campo obligatorio',
        ]);
        // Comprobar si ese producto ya existe
        $ya_existente = Producto::where('tipo_prod', $request->tipo_prod)
            ->where('color_prod', $request->color_prod)
            ->where('destino_prod', $request->destino_prod)
            ->where('tamano_prod', $request->tamano_prod)
            ->get();

        foreach ($ya_existente as $item) {
            if ($item->cod_prod != $id) {
                return back()->withErrors(['producto_existente' => true])->withInput();
            }
        }
        $update_prod = Producto::findOrFail($id);
        // Obtener clave
        $clave = substr($request->tipo_prod, 0, 3) . '-' . substr($request->color_prod, 0, 1) . substr($request->destino_prod, 0, 1) . substr($request->tamano_prod, 0, 1);
        $clave =  strtoupper($clave);
        $ya_existente_clave = Producto::where('clave_prod', '=', $clave)->get()->except($id);
        if (count($ya_existente_clave) > 0) {
            return back()->withErrors(['tipo_prod' => 'Existe un conflicto por claves repetidas'])->withInput();
        }
        //
        $update_prod->clave_prod = $clave;
        $update_prod->tipo_prod = $request->tipo_prod;
        $update_prod->color_prod = $request->color_prod;
        $update_prod->destino_prod = $request->destino_prod;
        $update_prod->tamano_prod = $request->tamano_prod;
        $update_prod->save();

        return back()->with([
            'update_producto' => true,
        ]);
    }
    public function productos_info($id)
    {
        $read_producto = Producto::findOrFail($id);
        $num_transaccciones = Detalle::where('fk_cod_prod_det', $id)->get();
        return view('dashboard.productos.info', compact('read_producto', 'num_transaccciones'));
    }
    public function productos_delete($id)
    {
        $read_producto = Producto::findOrFail($id);
        $read_producto->delete();
        return redirect()->route('productos')->with(['delete_producto' => true]);
    }
    public function productos_update_stock(Request $request, $id)
    {
        // return 
        // return $request;
        // Capturo informacion del producto;
        $producto = Producto::findOrFail($id);
        // Valido datos ingresados
        $request->validate([
            'tipo_trans' => 'required',
            'edit_stock' => 'required|numeric|min:1|max:' . $producto->stock_prod . '',
        ], [
            'edit_stock.min' => 'Debe ser mayor a 0 unidades.',
            'edit_stock.max' => 'Debe ser menor a ' . $producto->stock_prod . ' unidades.',
        ]);
        // Creamos una nueva transaccion
        $add_transaccion = new Transaccion;
        $add_transaccion->tipo_trans = $request->tipo_trans;
        $add_transaccion->estado_trans = 'realizado';
        $add_transaccion->fk_cod_usu_trans = $request->session()->get('usuario_activo');
        $add_transaccion->fk_cod_neg_trans = 1;
        $add_transaccion->save();

        $transaccion = Transaccion::where([
            'fk_cod_neg_trans' => '1',
            'fk_cod_usu_trans' => $request->session()->get('usuario_activo'),
            'tipo_trans' => $request->tipo_trans
        ])
            ->orderBy('created_at', 'desc')
            ->first();

        // Actualizar producto
        if ($request->tipo_trans == 'Devolución venta') {
            $producto->stock_prod = $producto->stock_prod + $request->edit_stock;
        } else {
            $producto->stock_prod = $producto->stock_prod - $request->edit_stock;
        }
        $producto->save();
        //  Recargo la información del producto
        $producto = Producto::findOrFail($id);
        // Crear detalle
        $add_detalle = new Detalle;
        $add_detalle->fk_cod_trans_det =  $transaccion->cod_trans;
        $add_detalle->fk_cod_prod_det = $producto->cod_prod;
        $add_detalle->cantidad_existencia_det = $producto->stock_prod;
        $add_detalle->cantidad_det = $request->edit_stock;
        $add_detalle->save();
        return back()->with([
            'update_producto' => true,
        ]);
    }
}
