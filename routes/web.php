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

use iPlace\Evento;
use Illuminate\Http\Request;
use Culqi\Culqi;
use Culqi\CulqiException;

Route::get('/', function () {
    return view('home');

});


/*Route::group(['prefix'=>'usuarios'], function(){
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


});*/


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

Route::get('upload', function () {
    return view('upload');
});

Route::get('pago/persona', function () {
    return view('pago.persona');
});

Route::get('pago/evento', function () {
    return view('pago.eventos');
});

Route::get('eventoss', function () {
    return view('eventos.mostrar');
});


Route::group(['prefix'=>'eventos'], function(){

  Route::get('/{evento}/asistir','UsuarioEventoController@create');
  Route::get('/{evento}/cancelar','UsuarioEventoController@cancel');
  Route::get('/{evento}/edit','EventoController@edit');
  Route::post('/{evento}','EventoController@update');
  Route::post('/{evento}/confirmarAsistencia','UsuarioEventoController@store');
  Route::post('/{evento}/cancelarAsistencia','UsuarioEventoController@destroy');
  Route::get('/misEventos','EventoController@misEventos');
  Route::get('/misEventosAsistente','EventoController@misEventosAsistente');

});
Route::resource('eventos','EventoController');

Route::resource('organizadors','OrganizadorController');
Route::group(['prefix'=>'organizadors'], function(){



});



Route::group(['prefix'=>'empresas'], function(){

  Route::get('/createAjx', 'EmpresaController@createAjx');
  Route::post('/storeAjx', 'EmpresaController@storeAjx');
  Route::delete('{empresa}/expellOrganizador/{organizador}','EmpresaController@expellOrganizador');
  Route::get('/organizador','EmpresaController@misEmpresasOrganizador');
  Route::get('/{empresa}/organizadors','EmpresaController@todosOrganizadores');


});
Route::resource('empresas','EmpresaController');



Route::group(['prefix'=>'solicituds'], function(){

  Route::post('{solicitud}/accept', 'SolicitudController@aceptarSolicitud');
  Route::get('/enviado','SolicitudController@indexEnviado');

});
Route::resource('solicituds','SolicitudController');

Route::group(['prefix'=>'BusquedaCategoria'], function(){

  Route::get('/buscar/{ambito}','BusquedaCategoriaController@buscar');

});

Route::get('/busqueda/nombre','BusquedaController@buscarNombre');

Route::resource('ambitos','AmbitoController');



Route::resource('users','UserController');
Route::post('/pagos/tarjeta','PagoController@tarjeta');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/eventosCercanos', 'EventoController@eventosCercanos');
Route::get('/ajaxEventos/{lat}/{pos}/{dis}', 'EventoController@eventosCercanosAjax');

Route::get('mapita',function(){
  return view('mapas.prueba');
});
