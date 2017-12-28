<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use iPlace\Evento;

class BusquedaController extends Controller
{
    public function buscarNombre(Request $request)
    {
      $eventos = Evento::where('nombre','like','%'.$request['q'].'%') -> get();
      $categoria = new \stdClass();
      $categoria -> nombre = "Resultados";
      $categoria -> link_foto = "http://www.download3dhouse.com/wp-content/uploads/2013/03/Gray-ceiling-of-large-conference-room.jpg";

      return view('eventos.mostrar',['eventos'=>$eventos,'categoria'=>$categoria]);
    }
}
