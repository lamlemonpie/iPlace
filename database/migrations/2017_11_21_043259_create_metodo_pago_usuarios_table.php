<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetodoPagoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodo_pago_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_metodo_pago')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->dateTime('fecha_agrego');
            $table->timestamps();

            $table->foreign('id_metodo_pago')->references('id')
                ->on('metodo_pagos');

            $table->foreign('id_usuario')->references('id')
                ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metodo_pago_usuarios');
    }
}
