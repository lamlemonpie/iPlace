<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Evento_ambito extends Model
{
    //
    public function evento(){
      return $this->belongsTo('iPlace\Evento', 'id_evento', 'id');
    }
    
    public function ambito(){
      return $this->belongsTo('iPlace\Ambito', 'id_ambito', 'id');
    }
}
