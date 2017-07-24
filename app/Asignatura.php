<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
	 protected $primaryKey = 'codigo', $table= 'asignaturas';
	 public $incrementing=false;
     protected $fillable = [
        'codigo', 'nombre', 'programa', 'semestre'
    ];

    public function ramo()
    {
    	return $this->hasMany('App\Ramo');
    }
}
