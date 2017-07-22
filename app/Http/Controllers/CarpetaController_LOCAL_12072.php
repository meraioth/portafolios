<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ramo;
use App\Carpeta;
use App\Asignatura;

use Illuminate\Support\Facades\Auth;



class CarpetaController extends Controller
{
   public function index($codigo){
     $evaluaciones = $this->getEvaluaciones($codigo);
   	return view('ramo',['asignatura'=>$codigo, 'evaluaciones'=>$evaluaciones]);
   	  //return view('ramo',['asignatura'=>Asignatura::find($codigo)->nombre]);

   }

   private function getEvaluaciones($ramo){
        $salida = [];
        $ramo_temp = Ramo::find($ramo);
        $carpeta = $ramo_temp->carpeta;
        return $carpeta->evaluacion;
    }
    private function getAsignatura($ramo){
        $salida = [];
        echo $ramo;
        $ramo_temp = Ramo::find($ramo);
        $carpeta = $ramo_temp->carpeta;
    }
}
