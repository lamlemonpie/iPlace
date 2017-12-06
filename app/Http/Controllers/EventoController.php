<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    //
    
    public function prueba(Request $r){
      
      echo $r['latitud'];
      echo $r['longitud'];
      dd($r);
    }
}
