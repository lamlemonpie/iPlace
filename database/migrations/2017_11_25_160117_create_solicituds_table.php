<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_organizador_propietario')->unsigned();
            $table->integer('id_usuario_solicitante')->unsigned();
            $table->integer('id_empresa')->unsigned();

            $table->foreign('id_usuario_solicitante')->references('id')
              ->on('users');
            $table->foreign('id_organizador_propietario')->references('id')
              ->on('organizadors');
            $table->foreign('id_empresa')->references('id')
              ->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
