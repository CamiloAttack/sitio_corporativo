<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Multimedia extends Model
{
	
    protected $fillable = [
       'nom_multimedia', 'desc_multimedia','categoria_media_id', 'tipo_media_id','multimedia', 'nom_tipo_media'
    ];

 
    public function TipoMedia() {
		return $this->hasOne('App\TipoMedia', 'id', 'tipo_media_id');
	}

    public function CategoriaMedia() {
		return $this->hasOne('App\CategoriaMedia', 'id', 'categoria_media_id');
	}

	public function Puntaje()
    {    return $this->hasMany('App\Puntaje');
 
    }

}



