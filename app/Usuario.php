<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table ='usuario';
    protected $fillable = [
       'nombre','password','ape_pater','ape_mater','estatus_id','telefono','email','rut','rol_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Rol() {
		return $this->hasOne('App\Rol', 'id', 'rol_id');
	}

    public function Estatus() {
		return $this->hasOne('App\Estatus', 'id', 'estatus_id');
	}


}
