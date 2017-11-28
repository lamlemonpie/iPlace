<?php

namespace iPlace;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'fecha_creacion'
    ];

    public function organizadores_evento(){
      return $this->hasMany('iPlace\Organizador_evento', 'id_empresa', 'id');
    }
    
    public function empresas_organizador(){
      return $this->hasMany('iPlace\Empresa_organizador', 'id_empresa', 'id');
    }

    public function admin(){
      return $this->belongsTo('iPlace\Organizador', 'id_admin', 'id');
    }
}
