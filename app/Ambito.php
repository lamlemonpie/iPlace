<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Ambito extends Model
{
    //
    public function usuarios_ambito(){
      return $this->hasMany('iPlace\User', 'id_usuario', 'id');
    }
    
    public function eventos_ambito(){
      return $this->hasMany('iPlace\Evento', 'id_evento', 'id');
    }
    
}
