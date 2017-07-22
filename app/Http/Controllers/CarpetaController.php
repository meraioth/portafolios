<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ramo;
use App\Carpeta;
use App\Asignatura;

use Illuminate\Support\Facades\Auth;



class CarpetaController extends Controller{
    private $carpeta;
    private $ramo;

   public function index($codigo){
     $evaluaciones = $this->getEvaluaciones($codigo);
   	return view('ramo',['asignatura'=>$codigo, 'evaluaciones'=>$evaluaciones]);
   	  //return view('ramo',['asignatura'=>Asignatura::find($codigo)->nombre]);
   }

   public function carpeta($ramo_id){
   	
   		$carpeta = Carpeta::where('ramo_id',$ramo_id)->get();
      return view('carpeta')->with('carpeta',$carpeta);
   }

   public function storeFile(request $request, $fileName){

     	$user = "JulioGodoy";
      $ramo = "InteligenciaArtificial";
      $semestre = "SI";
      $año = "2017";
      $directorio = $user.'/'.$ramo.'/'.$año.$semestre;

   
      if ($request->hasFile('file')) {
          $originalFileName = $request->file->getClientOriginalName();
          $fileSize = $request->file->getClientSize();
          $fileExtension =  $request->file->extension();
          $commpleteFile = $fileName.'.'.$fileExtension;

          $request->file->storeAs($directorio,$commpleteFile);

          $tmp_carpeta = Carpeta::where('ramo_id', 1)->get();

          $tmp_carpeta[0][$fileName] = $commpleteFile;
          $tmp_carpeta[0]->save();
          return "el archivo ". $fileName." se guardara en: ".$directorio;
      }else{
        return 'Hubo un error';
      }
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
