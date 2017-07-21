<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carpeta extends Model
{
     protected $fillable = [
        'fecha_subida', 'planilla', 'syllabus', 'acta','zip'
    ];
   public function ramo(){
    	return $this->hasOne('App\Ramo');

    }
    

public function evaluacion(){

	return $this->hasMany('App\Evaluacion');

}


}
