<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Estatus extends Model
{
    
   	protected $table = 'estatus'; 

    protected $fillable = [
       'nombre', 'descripcion'
    ];

 

}
