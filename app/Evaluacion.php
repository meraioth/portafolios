<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $primaryKey = 'id', $table= 'evaluacions';
	 public $incrementing=false;
     protected $fillable = [
        'id', 'tipo', 'buena', 'media','mala','id_carpeta'
    ];

    public function carpeta()
    {
    	return $this->belongsTo('App\Carpeta');
    }
}
