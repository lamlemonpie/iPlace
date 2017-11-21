<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioAmbitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_ambitos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_ambito')->unsigned();
            $table->dateTime('fecha_agrego');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')
                ->on('usuarios');

            $table->foreign('id_ambito')->references('id')
                ->on('ambitos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_ambitos');
    }
}
