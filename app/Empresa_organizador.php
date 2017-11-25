<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Empresa_organizador extends Model
{
    //
    
    public function empresa(){
      return $this->belongsTo('iPlace\Empresa', 'id_empresa', 'id');
    }
    
    public function organizador(){
      return $this->belongsTo('iPlace\Organizador', 'id_organizador', 'id');
    }
}
