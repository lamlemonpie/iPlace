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
    return view('index');

});

Route::get('/Inicio', function () {
    return view('index');
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('usuarios','UsuarioController', ['parameters' => [
    'user' => 'user'
]]);
