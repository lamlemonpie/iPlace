<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizadorEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizador_eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_organizador')->unsigned();
            $table->integer('id_evento')->unsigned();
            $table->dateTime('fecha_ingreso');
            $table->timestamps();
            $table->char('ruc', 16);

            $table->foreign('id_organizador')->references('id')
                ->on('organizadors');

            $table->foreign('id_evento')->references('id')
                ->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizador_eventos');
    }
}
