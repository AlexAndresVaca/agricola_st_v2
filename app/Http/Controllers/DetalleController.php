<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Producto;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class DetalleController extends Controller
{
    //
    public function add_prod_det(Request $request, $tipo, $id)
    {
        // return $request->tipo_prod;
        if ($request->clave_prod != '') {
            $request->validate([
                'clave_prod' => 'required|exists:productos,clave_prod',
                'cant_prod' => 'required|numeric|min:1',
            ], [
                'clave_prod.exists' => 'Esta clave no esta asociada a ningún producto',
                'cant_prod.required' => 'Campo obligatorio',
                'cant_prod.min' => 'Cantidad debe ser mayor a 0',
            ]);
            $producto = Producto::where('clave_prod',  $request->clave_prod)->first();
        } else {
            $request->validate([
                'tipo_prod' => 'required',
                'color_prod' => 'required',
                'destino_prod' => 'required',
                'tamano_prod' => 'required',
                'cant_prod' => 'required|numeric|min:1',
            ], [
                'cant_prod.required' => 'Campo obligatorio',
                'cant_prod.min' => 'Cantidad debe ser mayor a 0',
            ]);
            $producto = Producto::where('tipo_prod',  $request->tipo_prod)
                ->where('color_prod',  $request->color_prod)
                ->where('destino_prod', $request->destino_prod)
                ->where('tamano_prod', $request->tamano_prod)
                ->first();
        }
        // Validar que el producto escogido exista
        if ($producto == '') {
            return back()->withErrors(['prod_no_encontrado' => true])->withInput();
        }
        // Comprobar que tengo el stock suficiente para realizar la venta
        if ($producto->stock_prod < $request->cant_prod and $tipo == 'venta') {
            return back()->withErrors(['stock_insuficiente' => true])->withInput()->with(['cantidad_actual' => $producto->stock_prod]);
        }

        // Creear nueva tabla
        $add_detalle = new Detalle;
        $add_detalle->fk_cod_trans_det = $id;
        $add_detalle->fk_cod_prod_det = $producto->cod_prod;
        $add_detalle->cantidad_det = $request->cant_prod;

        // Actualizar productos en stock
        if ($tipo == 'produccion' or $tipo == 'compra') {
            $producto->stock_prod = intval($producto->stock_prod) + intval($request->cant_prod);
            $add_detalle->cantidad_existencia_det = $producto->stock_prod;
            $producto->save();
        } elseif ($tipo == 'venta') {
            $producto->stock_prod = intval($producto->stock_prod) - intval($request->cant_prod);
            $add_detalle->cantidad_existencia_det = $producto->stock_prod;
            $producto->save();
        }

        $add_detalle->save();
        return back()->with(['add_prod_det' => true]);
    }
    public function delete_prod_det(Request $request, $tipo, $id, $id_det)
    {
        // Recuperar id de detalle
        $delete_det = Detalle::findOrFail($id_det);
        // Devolver
        // Actualizar producto
        $producto = Producto::findOrFail($delete_det->fk_cod_prod_det);
        if ($tipo == 'produccion' or $tipo == 'compra') {
            $producto->stock_prod = intval($producto->stock_prod) - intval($delete_det->cantidad_det);
            $producto->save();
        } elseif ($tipo == 'venta') {
            $producto->stock_prod = intval($producto->stock_prod) + intval($delete_det->cantidad_det);
            $producto->save();
        }
        $delete_det->delete();
        return back()->with(['delete_prod_det' => true]);
    }
    public function autocompletar_productos(Request $request, $tipo)
    {
        $term = $request->get('term');
        $querys = Producto::where('clave_prod', 'LIKE', '%' . $term . '%')->get();
        // 
        $response = array();
        if ($tipo == 'venta') {
            foreach ($querys as $productos) {
                $response[] = array(
                    "label" => $productos->clave_prod . ': (' . $productos->tipo_prod . ' ' . $productos->color_prod . ' ' . $productos->destino_prod . ' ' . $productos->tamano_prod . ')'.', Unidades existentes = '.$productos->stock_prod,
                    "value" => $productos->cod_prod,
                    "clave" => $productos->clave_prod
                );
            }
        } else {
            foreach ($querys as $productos) {
                $response[] = array(
                    "label" => $productos->clave_prod . ': (' . $productos->tipo_prod . ' ' . $productos->color_prod . ' ' . $productos->destino_prod . ' ' . $productos->tamano_prod . ')',
                    "value" => $productos->cod_prod,
                    "clave" => $productos->clave_prod
                );
            }
        }
        return response()->json($response);
    }
}
