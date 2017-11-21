<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('password');
            $table->integer('id_ultima_ubicacion')->unsigned();
            $table->char('sexo', 1);
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_ultima_ubicacion')->references('id')
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
        Schema::dropIfExists('users');
    }
}
