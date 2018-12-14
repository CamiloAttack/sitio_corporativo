<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntaje extends Model
{
 
    protected $table= 'puntaje';
    protected $fillable = [
       'puntaje', 'multimedia_id'
    ];
    public function Multimedia()
    {
        return $this->belongsTo('App\Multimedia','multimedia_id');
    }
  
}
