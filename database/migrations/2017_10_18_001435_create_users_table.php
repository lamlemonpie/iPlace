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
            $table->increments('id')->unsigned()->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('password');
            $table->integer('id_ultima_ubicacion')->unsigned()->nullable();
            $table->char('sexo', 1);
            $table->string('email')->unique();
            $table->string('link_foto')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_ultima_ubicacion')->references('id')
                ->on('ubicacions');

        });

        DB::table('users')->insert(
          array(
              'nombres' => 'Admin',
              'apellidos'=> 'Admin Admin',
              'password' => bcrypt('admin'),
              'sexo' => 'O',
              'email' => 'admin@admin.com'
              )
          );

        DB::table('users')->insert(
          array(
              'nombres' => 'Alejandro',
              'apellidos'=> 'Larraondo Lamchog',
              'password' => bcrypt('123456'),
              'sexo' => 'M',
              'email' => 'jano@admin.com'
              )
          );

        DB::table('users')->insert(
          array(
              'nombres' => 'Diego',
              'apellidos'=> 'Amable Romero',
              'password' => bcrypt('123456'),
              'sexo' => 'M',
              'email' => 'diego@admin.com'
              )
          );

        DB::table('users')->insert(
          array(
              'nombres' => 'Katherine',
              'apellidos'=> 'Uñapilco Chambi',
              'password' => bcrypt('123456'),
              'sexo' => 'F',
              'email' => 'kat@admin.com'
              )
          );

        DB::table('users')->insert(
          array(
              'nombres' => 'Crhistian',
              'apellidos'=> 'Turpo Apaza',
              'password' => bcrypt('123456'),
              'sexo' => 'M',
              'email' => 'crhis@admin.com'
              )
          );

        DB::table('users')->insert(
          array(
              'nombres' => 'Alexis',
              'apellidos'=> 'Mendoza Villaroel',
              'password' => bcrypt('123456'),
              'sexo' => 'M',
              'email' => 'alexis@admin.com'
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
        Schema::dropIfExists('users');
    }
}
