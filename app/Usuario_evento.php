<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Usuario_evento extends Model
{
    //
    public function usuario(){
      return $this->belongsTo('iPlace\User', 'id_usuario', 'id');
    }

    public function evento(){
      return $this->belongsTo('iPlace\Evento', 'id_evento', 'id');
    }
}
