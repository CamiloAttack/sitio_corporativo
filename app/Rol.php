<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Rol extends Model
{
   
   	protected $table = 'rol'; 

    protected $fillable = [
       'nombre', 'descripcion'
    ];

 
  /*  public function Rol() {
		return $this->hasOne('App\Rol', 'id', 'rol_id');
	}

    public function Estatus() {
		return $this->hasOne('App\Estatus', 'id', 'estatus_id');
	}*/

}
