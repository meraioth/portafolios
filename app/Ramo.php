<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramo extends Model
{
    protected $fillable = [
        'codigo_asignatura', 'ano', 'semestre',
    ],$table='ramos';

    public function asignatura(){
    	return $this->belongsTo(Asignatura::class,'codigo','codigo_asignatura');
    }

    public function users(){
    	return $this->belongsToMany('App\User','ramo_user');
    }
    public function evaluaciones()
    {
        return $this->hasMany('App\Evaluacion');
    }

    public function carpeta(){
        return $this->hasOne('App\Carpeta');
    }

}
