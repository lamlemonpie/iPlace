<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    public function organizadores_evento(){
      reurn $this->hasMany('iPlace\Organizador_evento', 'id_empresa', 'id');
    }
    
    public function empresas_organizador(){
      return $this->hasMany('iPlace\Empresa_organizador', 'id_empresa', 'id');
    }
}
