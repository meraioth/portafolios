<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $primaryKey = 'id', $table= 'evaluacions';
	 public $incrementing=false;
     protected $fillable = [
        'id', 'nombre' ,'tipo', 'buena', 'media','mala','carpeta_id','otro','pauta','fecha',
    ];

    public function carpeta()
    {
    	return $this->belongsTo('App\Carpeta');
    }
}
