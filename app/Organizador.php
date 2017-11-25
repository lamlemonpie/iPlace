<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    //
    public function usuario(){
      return $this->belongsTo('iPlace\User', 'id_usuario', 'id');
    }
    
    public function organizadores_evento(){
      return $this->hasMany('iPlace\Organizador_evento', 'id_organizador', 'id');
    }
    
    public function empresas_organizador(){
      return $this->hasMany('iPlace\Empresa_organizador', 'id_organizador', 'id');
    }
}
