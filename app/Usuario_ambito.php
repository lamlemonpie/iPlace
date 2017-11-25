<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Usuario_ambito extends Model
{
    //
    public function usuario(){
      return $this->belongsTo('iPlace\User', 'id_usuario', 'id');
    }
    
    public function ambito(){
      return $this->belongsTo('iPlace\Ambito', 'id_ambito', 'id');
    }
}
