<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    public function eventos_usuario(){
      return $this->hasMany('iPlace\Usuario_evento', 'id_evento', 'id');
    }
    
    public function organizadores_evento(){
      return $this->hasMany('iPlace\Organizador_evento', 'id_evento', 'id');
    }
}
