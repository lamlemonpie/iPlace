<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaOrganizadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_organizadors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_empresa')->unsigned();
            $table->integer('id_organizador')->unsigned();
            $table->timestamps();


            $table->foreign('id_empresa')->references('id')
                ->on('empresas');

            $table->foreign('id_organizador')->references('id')
                ->on('organizadors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_organizadors');
    }
}
