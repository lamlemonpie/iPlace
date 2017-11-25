<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned()->nullable();
            $table->integer('id_evento')->unsigned()->nullable();
            $table->integer('id_pago')->unsigned()->nullable();
            $table->dateTime('fecha_registro')->nullable();
            $table->timestamps();


            $table->foreign('id_usuario')->references('id')
                ->on('users');

            $table->foreign('id_evento')->references('id')
                ->on('eventos');

            $table->foreign('id_pago')->references('id')
                ->on('pagos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_eventos');
    }
}
