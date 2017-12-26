<?php

namespace iPlace;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'email', 'password', 'sexo', 'id_ultima_ubicacion','link_foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function eventos_usuario(){
        return $this->hasMany('iPlace\Usuario_evento', 'id_usuario', 'id');
    }


    public function ultima_ubicacion(){
        return $this->belongsTo('iPlace\Ubicacion', 'id_ultima_ubicacion', 'id');
    }

    public function metodos_pago(){
        return $this->hasMany('iPlace\Metodo_pago', 'id_metodo_pago', 'id');
    }

    public function organizador(){
      return $this->hasOne('iPlace\Organizador','id_usuario','id');
    }

    public function solicitudes_enviadas(){
      return $this->hasMany('iPlace\Solicitud','id_usuario_solicitante','id');
    }


}
