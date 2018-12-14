<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaMedia extends Model
{
        

    /**
     * The attributes that are massm assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_categoria_media', 'desc_categoria_media'
    ];
	public function Multimedia() { 

		return $this->belongsTo('App\Multimedia','categoria_media_id'); 
 

	}
        
}
