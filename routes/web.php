<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('home');

});

Route::get('/Inicio', function () {
    return view('home');
});


Route::group(['prefix'=>'usuarios'],function(){

  Route::get('/','pacientesController@todos' );
  //Route::get('todos','pacientesController@todos');

  Route::get('{id}/editar','UserController@edit' );

  Route::post('guardar','UserController@update');


});



Route::get('/usuarios/login', function () {
    return view('auth.login');
});

Route::get('/usuarios/register', function () {
    return view('auth.register');
});

Route::get('/usuarios/editar', function () {
    return view('usuarios.edit');
});

Route::get('/usuarios/mostrar', function () {
    return view('usuarios.mostrar');
});


Route::get('/organizadores/crear', function () {
    return view('organizadores.crear');
});

Route::get('/organizadores/editar', function () {
    return view('organizadores.editar');
});

Route::get('/organizadores/eliminar', function () {
    return view('organizadores.borrar');
});

Route::get('/empresa/crear', function () {
    return view('empresa.crear');
});

Route::get('/empresa/editar', function () {
    return view('empresa.editar');
});

Route::get('/eventos/crear', function () {
    return view('eventos.crear');
});

Route::get('/eventos/editar', function () {
    return view('eventos.editar');
});

Route::get('/eventos/mostrar', function () {
    return view('eventos.mostrar');
});

Route::get('/eventos/ver', function () {
    return view('eventos.ver');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('usuarios','UsuarioController', ['parameters' => [
    'user' => 'user'
]]);


Route::get('prueba','UserController@prueba');
