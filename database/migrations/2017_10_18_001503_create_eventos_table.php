<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_ubicacion')->unsigned();
            //$table->integer('id_organizador_evento')->unsigned();
            $table->integer('id_empresa')->unsigned();
            $table->float('precio', 8, 2);
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->timestamps();

            $table->foreign('id_ubicacion')->references('id')
                ->on('ubicacions');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
