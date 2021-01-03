<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\PseudoTypes\True_;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('cod_usu');
            $table->string('ci_usu',10)->unique();
            $table->string('apellido_usu',50);
            $table->string('nombre_usu',50);
            $table->string('cargo_usu',13)->default('Empleado');
            $table->string('celular_usu',9)->nullable();
            $table->string('direccion_usu',150)->nullable();
            $table->string('correo_usu',60)->unique();
            $table->string('clave_usu');
            $table->boolean('estado_usu')->default(True);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
