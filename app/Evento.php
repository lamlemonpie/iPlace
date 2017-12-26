<?php

namespace iPlace;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
      'nombre','id_ubicacion','ciudad','direccion','referencia','link_youtube','info_adicional','precio','link_foto','fecha_creacion','fecha_inicio','fecha_fin' ,'descripcion'
    ];
    //
    public function eventos_usuario(){
      return $this->hasMany('iPlace\Usuario_evento', 'id_evento', 'id');
    }
    
    public function organizadores_evento(){
      return $this->hasMany('iPlace\Organizador_evento', 'id_evento', 'id');
    }

    public function ubicacion(){
      return $this->hasOne('iPlace\Ubicacion', 'id', 'id_ubicacion');
    }

    public function eventos_ambito(){
      return $this->hasMany('iPlace\Evento_ambito', 'id_evento', 'id');
    }
}
