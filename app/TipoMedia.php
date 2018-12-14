<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMedia extends Model
{
    /**
     * The attributes that are massm assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','nom_tipo_media', 'desc_tipo_media'
    ];

	public function Multimedia() { 

		return $this->belongsTo('App\Multimedia','tipo_media_id'); 
 

	}

}
