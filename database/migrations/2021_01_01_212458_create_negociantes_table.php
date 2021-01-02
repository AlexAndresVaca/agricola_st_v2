<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negociantes', function (Blueprint $table) {
            $table->id('cod_neg');
            $table->string('ci_neg',13)->unique();
            $table->string('apellido_neg',50);
            $table->string('nombre_neg',50);
            $table->string('telefono_neg',13)->nullable();
            $table->string('direccion_neg',150)->nullable();
            $table->string('correo_neg',60)->unique();
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
        Schema::dropIfExists('negociantes');
    }
}
