<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Negociante;
use App\Models\Producto;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Crypt;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $usuario = new User;
        $usuario->ci_usu = '1727676676';
        $usuario->apellido_usu = 'Vaca';
        $usuario->nombre_usu = 'Alex';
        $usuario->cargo_usu = 'Administrador';
        $usuario->celular_usu = '';
        $usuario->direccion_usu = '';
        $usuario->correo_usu = 'alex@gmail.com';
        $usuario->clave_usu = Crypt::encrypt('12341234');
        $usuario->estado_usu = true;
        $usuario->save();



        $usuario1 = new User;
        $usuario1->ci_usu = '0503656902';
        $usuario1->apellido_usu = 'Vanessa';
        $usuario1->nombre_usu = 'Allison';
        $usuario1->cargo_usu = 'Administrador';
        $usuario1->celular_usu = '993223514';
        $usuario1->direccion_usu = '';
        $usuario1->correo_usu = 'allison@gmail.com';
        $usuario1->clave_usu = Crypt::encrypt('123456789');
        $usuario1->estado_usu = true;
        $usuario1->save();
        // 
        $usuario1 = new User;
        $usuario1->ci_usu = '1805259809';
        $usuario1->apellido_usu = 'Rovayo';
        $usuario1->nombre_usu = 'Katherine';
        $usuario1->cargo_usu = 'Administrador';
        $usuario1->celular_usu = '';
        $usuario1->direccion_usu = '';
        $usuario1->correo_usu = 'kathy.rovayo@gmail.com';
        $usuario1->clave_usu = Crypt::encrypt('1805259809');
        $usuario1->estado_usu = true;
        $usuario1->save();

        // 

        $negociante = new Negociante;
        $negociante->cod_neg = 1;
        $negociante->ci_neg = '0502402811';
        $negociante->apellido_neg = 'Banda';
        $negociante->nombre_neg = 'Monica';
        $negociante->tipo_neg = 'Productor';
        $negociante->celular_neg = '983413686';
        $negociante->direccion_neg = 'Tanicuchi';
        $negociante->correo_neg = 'mony@gmail.com';
        $negociante->save();
        
        // 

        $producto = new Producto;
        $producto->clave_prod = 'CREF';
        $producto->tipo_prod = 'Clavel';
        $producto->color_prod = 'Rojo';
        $producto->destino_prod = 'Extranjero';
        $producto->tamano_prod = 'Fancy';
        $producto->stock_prod = 140;
        $producto->save();
        
        $producto1 = new Producto;
        $producto1->clave_prod = 'CCNF';
        $producto1->tipo_prod = 'Clavel';
        $producto1->color_prod = 'Color';
        $producto1->destino_prod = 'Nacional';
        $producto1->tamano_prod = 'Fancy';
        $producto1->stock_prod = 880;
        $producto1->save();

    //     // Encabezado Produccion
    //     $produccion = new Transaccion;
    //     $produccion->tipo_trans = 'producción';
    //     $produccion->estado_trans = 'en curso';
    //     $produccion->fk_cod_usu_trans = 1;
    //     $produccion->fk_cod_neg_trans = 1;
    //     $produccion->save();
    //     // 
    //     $produccion1 = new Transaccion;
    //     $produccion1->tipo_trans = 'compra';
    //     $produccion1->estado_trans = 'en curso';
    //     $produccion1->fk_cod_usu_trans = 1;
    //     $produccion1->fk_cod_neg_trans = 1;
    //     $produccion1->save();
        
    //     $produccion_1 = new Transaccion;
    //     $produccion_1->tipo_trans = 'compra';
    //     $produccion_1->estado_trans = 'en curso';
    //     $produccion_1->fk_cod_usu_trans = null;
    //     $produccion_1->fk_cod_neg_trans = null;
    //     $produccion_1->save();
    //     // venta1
    //     $venta1 = new Transaccion;
    //     $venta1->tipo_trans = 'venta';
    //     $venta1->estado_trans = 'en curso';
    //     $venta1->fk_cod_usu_trans = 1;
    //     $venta1->fk_cod_neg_trans = 1;
    //     $venta1->save();
        
    //     // venta2
    //     $venta2 = new Transaccion;
    //     $venta2->tipo_trans = 'venta';
    //     $venta2->estado_trans = 'en curso';
    //     $venta2->fk_cod_usu_trans = 1;
    //     $venta2->fk_cod_neg_trans = 1;
    //     $venta2->save();
    //  
    }
}