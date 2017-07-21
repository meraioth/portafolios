<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carpeta extends Model
{
     protected $fillable = [
        'fecha_subida', 'planilla', 'syllabus', 'acta','zip'
    ];

<<<<<<< HEAD
    public function ramo(){
    	return $this->hasOne('App\Ramo');

    }
    

=======


public function evaluacion(){

	return $this->hasMany('App\Evaluacion');

}
>>>>>>> 25f0e1e6b4f075a2c5297f9cf5f6e65ec532f0e5
}
