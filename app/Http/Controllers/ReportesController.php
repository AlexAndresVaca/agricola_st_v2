<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class ReportesController extends Controller
{
    //
    public function reporte_kardex(){
        // Rellenar campos par la seleccion de productos
        $tipo = Producto::select('tipo_prod')->groupBy('tipo_prod')->get();
        $color = Producto::select('color_prod')->groupBy('color_prod')->get();
        $destino = Producto::select('destino_prod')->groupBy('destino_prod')->get();
        $tamano = Producto::select('tamano_prod')->groupBy('tamano_prod')->get();
        // Estados
        $mostrar_tabla = false;
        return view('dashboard.reportes.kardex',compact('tipo','color','destino','tamano','mostrar_tabla'));
    }
    public function generar_reporte(Request $request){
        $request->validate([
            'tipo_prod' => 'required',
            'color_prod' => 'required',
            'destino_prod' => 'required',
            'tamano_prod' => 'required',
            'desde' => 'required|date_format:Y-m-d|before:tomorrow|after:2020-01-01',
            'hasta' => 'required|date_format:Y-m-d|before:tomorrow|after:2020-01-01',
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
        // Obtener datos
        $reporte = Producto::select('negociantes.*','transaccions.updated_at as fecha','transaccions.tipo_trans as tipo','transaccions.fk_cod_neg_trans as negociante','detalles.cantidad_det as cantidad','detalles.cantidad_existencia_det as existencia', 'detalles.cod_det as scope')
                            ->join('detalles','detalles.fk_cod_prod_det','=','productos.cod_prod')
                            ->join('transaccions','transaccions.cod_trans','=','detalles.fk_cod_trans_det')
                            ->join('negociantes','negociantes.cod_neg','=','transaccions.fk_cod_neg_trans')
                            ->where('productos.cod_prod',$producto->cod_prod)
                            ->whereDate('transaccions.created_at','>=',$request->desde)
                            ->whereDate('transaccions.created_at','<=',$request->hasta)
                            ->get();
        // Guardar datos en sesión para posible impresión;
        // 
        $request->session()->put('codigo_producto', $producto->cod_prod);
        $request->session()->put('desde', $request->desde);
        $request->session()->put('hasta', $request->hasta);
        // Rellenar campos par la seleccion de productos
        $tipo = Producto::select('tipo_prod')->groupBy('tipo_prod')->get();
        $color = Producto::select('color_prod')->groupBy('color_prod')->get();
        $destino = Producto::select('destino_prod')->groupBy('destino_prod')->get();
        $tamano = Producto::select('tamano_prod')->groupBy('tamano_prod')->get();
        //Estados
        $mostrar_tabla = true; 
        $desde = $request->desde;
        $hasta = $request->hasta;
        return view('dashboard.reportes.kardex',compact('tipo','color','destino','tamano','reporte','producto','mostrar_tabla','desde' , 'hasta'));
    }
    public function download_reporte(Request $request){
        // INFO PDF
        // $nombre_pdf = 'lista de clientes';
        $pdf = app('dompdf.wrapper');
        // SQL
        $reporte = Producto::select('negociantes.*','transaccions.updated_at as fecha','transaccions.tipo_trans as tipo','transaccions.fk_cod_neg_trans as negociante','detalles.cantidad_det as cantidad','detalles.cantidad_existencia_det as existencia', 'detalles.cod_det as scope')
                            ->join('detalles','detalles.fk_cod_prod_det','=','productos.cod_prod')
                            ->join('transaccions','transaccions.cod_trans','=','detalles.fk_cod_trans_det')
                            ->join('negociantes','negociantes.cod_neg','=','transaccions.fk_cod_neg_trans')
                            ->where('productos.cod_prod',$request->session()->get('codigo_producto'))
                            ->whereDate('transaccions.created_at','>=',$request->session()->get('desde'))
                            ->whereDate('transaccions.created_at','<=',$request->session()->get('hasta'))
                            ->orderBy('transaccions.cod_trans','desc')
                            ->get();
        $producto = Producto::findOrFail($request->session()->get('codigo_producto'));
        $desde = $request->session()->get('desde');
        $hasta =$request->session()->get('hasta');
        $ahora = now();
        // Cargamos al pdf una vista y sus datos
        $pdf->loadView('dashboard.reportes.HTML.reporte', compact('reporte','producto','desde','hasta','ahora'));
        return $pdf->stream();
    }
}