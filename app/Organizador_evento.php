<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Organizador_evento extends Model
{
    //
    public function organizador(){
      return $this->belongsTo('iPlace\Organizador', 'id_organizador', 'id');
    }
    
    public function evento(){
      return $this->belongsTo('iPlace\Evento', 'id_evento', 'id');
    }
    
    public function empresa(){
      return $this->belongsTo('iPlace\Empresa', 'id_empresa', 'id');
    }
}
