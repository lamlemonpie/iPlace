<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Metodo_pago_usuario extends Model
{
    //
    public function usuario(){
      return $this->belongsTo('iPlace\Usuario','id_usuario', 'id');
    }
    
    public function metodo_pago(){
      return $this->belongsTo('iPlace\metodo_pago_usuarios', 'id_metodo_pago', 'id');
    }
}
