<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    public function organizador_Propietario (){
      return $this->belongsTo('iPlace\Organizador', 'id_organizador_propietario', 'id');
    }

    public function usuario_Solicitante(){
      return $this->belongsTo('iPlace\User', 'id_usuario_solicitante','id');
    }

    public function empresa(){
      return $this->belongsTo('iPlace\Empresa','id_empresa','id');
    }

}
