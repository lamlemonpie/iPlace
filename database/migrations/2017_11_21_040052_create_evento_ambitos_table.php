<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoAmbitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_ambitos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_evento')->unsigned();
            $table->integer('id_ambito')->unsigned();
            $table->dateTime('fecha_agrego');
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
        Schema::dropIfExists('evento_ambitos');
    }
}
