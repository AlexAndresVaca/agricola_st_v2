<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id('cod_trans');
            $table->string('tipo_trans',10);
            $table->string('estado_trans',10);
            $table->unsignedBigInteger('fk_cod_usu_trans')->nullable();
            $table->foreign('fk_cod_usu_trans')->references('cod_usu')->on('users')->onDelete('set null');;
            $table->unsignedBigInteger('fk_cod_neg_trans')->nullable();
            $table->foreign('fk_cod_neg_trans')->references('cod_neg')->on('negociantes')->onDelete('set null');;
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
        Schema::dropIfExists('transaccions');
    }
}