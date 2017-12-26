<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizadors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->boolean('admin')->default(0);
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')
              ->on('users');


        });

        DB::table('organizadors')->insert(
          array(
              'id_usuario' => 1,
              'admin'=> 0
              )
          );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizadors');
    }
}
