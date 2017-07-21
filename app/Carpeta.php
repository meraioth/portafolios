<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carpeta extends Model
{
     protected $fillable = [
        'fecha_subida', 'planilla', 'syllabus', 'acta','zip'
    ];

	public function evaluaciones(){
		return $this->hasMany('App\Evaluacion');
	}

	public function ramo(){
		return $this->hasOne('App\Ramo');
	}
}
