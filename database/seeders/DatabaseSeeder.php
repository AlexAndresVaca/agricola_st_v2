<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Negociante;
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
        $usuario->telefono_usu = '';
        $usuario->direccion_usu = '';
        $usuario->correo_usu = 'alex@gmail.com';
        $usuario->clave_usu = Crypt::encrypt('12341234');
        $usuario->estado_usu = true;
        $usuario->save();

        // 

        $negociante = new Negociante;
        $negociante->ci_neg = '1712121212';
        $negociante->apellido_neg = 'Banda';
        $negociante->nombre_neg = 'Monica';
        $negociante->telefono_neg = '0987654321';
        $negociante->direccion_neg = '';
        $negociante->correo_neg = 'mony@gmail.com';
        $negociante->save();
    }
}
