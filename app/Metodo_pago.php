<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Metodo_pago extends Model
{
    //
    public function metodos_pago(){
      return $this-> hasMany('iPlace\Metodo_pago','id_metodo_pago', 'id');
    }
}
