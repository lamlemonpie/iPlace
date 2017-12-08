<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    public function eventos(){
      return $this->hasMany('iPlace\Evento', 'id_ubicacion', 'id');
    }
}
