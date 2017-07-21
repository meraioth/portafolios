<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carpeta extends Model
{
     protected $fillable = [
        'fecha_subida', 'planilla', 'syllabus', 'acta','zip'
    ];



public function evaluacion(){

	return $this->hasMany('App\Evaluacion');

}
}
