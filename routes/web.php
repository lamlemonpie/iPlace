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


Route::group(['prefix'=>'organizadores'], function(){


});

Route::get('/Inicio', function () {
    return view('home');
});



Route::group(['prefix'=>'empresas'], function(){

  Route::get('/crearNuevaEmpresaAjx', 'EmpresaController@crearNuevaEmpresaAjx');
  Route::post('/storeAjx', 'EmpresaController@storeAjx');
  Route::get('/ver', function () { 
      return view('empresa.ver'); 
  });

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('users','UserController');
Route::resource('organizadors','OrganizadorController');
Route::resource('empresas','EmpresaController');
Route::get('prueba','UserController@prueba');
