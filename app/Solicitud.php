<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    public function organizador_Propietario (){
      return $this->belongsTo('iPlace\Organizador', 'id_organizador_propietario', 'id');
    }

    public function organizador_Solicitante(){
      return $this->belongsTo('iPlace\Organizador','id_organizador_solicitante','id');
    }


}
