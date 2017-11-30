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


Route::group(['prefix'=>'usuarios'], function(){
  Route::get('/register', function () {
    return view('auth.register');
  });

  Route::get('/login', function () {
    return view('auth.login');
  });

  Route::get('/editar', function () {
    return view('usuarios.edit');
  });

  Route::get('/mostrar', function () {
    return view('usuarios.mostrar');
  });


});


/*Route::group(['prefix'=>'organizadores'], function(){

  Route::get('/crear', function () {
      return view('organizadores.crear');
  });

  Route::get('/editar', function () {
      return view('organizadores.editar');
  });

  Route::get('/eliminar', function () {
      return view('organizadores.borrar');
  });

});

});*/


Route::group(['prefix'=>'eventos'], function(){

  Route::get('/crear', function () {
      return view('eventos.crear');
  });

  Route::get('/editar', function () {
      return view('eventos.editar');
  });

  Route::get('/mostrar', function () {
      return view('eventos.mostrar');
  });

  Route::get('/ver', function () {
      return view('eventos.ver');
  });

});

Route::resource('organizadors','OrganizadorController');
Route::group(['prefix'=>'organizadors'], function(){



});


Route::group(['prefix'=>'empresas'], function(){

  Route::get('/createAjx', 'EmpresaController@createAjx');
  Route::post('/storeAjx', 'EmpresaController@storeAjx');



});
Route::resource('empresas','EmpresaController');



Route::group(['prefix'=>'solicituds'], function(){

  Route::post('{solicitud}/accept', 'SolicitudController@aceptarSolicitud');
  Route::get('/enviado','SolicitudController@indexEnviado');

});
Route::resource('solicituds','SolicitudController');






Route::resource('users','UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('prueba','UserController@prueba');
