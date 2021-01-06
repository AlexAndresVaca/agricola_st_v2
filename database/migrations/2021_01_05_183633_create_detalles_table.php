<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id('cod_det');
            $table->unsignedBigInteger('fk_cod_trans_det')->nullable();
            $table->foreign('fk_cod_trans_det')->references('cod_trans')->on('transaccions')->onDelete('cascade');
            $table->unsignedBigInteger('fk_cod_prod_det')->nullable();
            $table->foreign('fk_cod_prod_det')->references('cod_prod')->on('productos')->onDelete('cascade');
            $table->unsignedInteger('cantidad_existencia_det')->nullable();
            $table->unsignedInteger('cantidad_det');
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
        Schema::dropIfExists('detalles');
    }
}
