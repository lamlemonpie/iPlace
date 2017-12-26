<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambitos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nombre', 30);
            $table->text('descripcion');
            $table->string('link_foto')->nullable();
            $table->timestamps();
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_modificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ambitos');
    }
}
