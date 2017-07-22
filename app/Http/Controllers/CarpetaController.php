<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ramo;
use App\Carpeta;
use App\Asignatura;
use App\Evaluacion;
use App\User;

use Illuminate\Support\Facades\Auth;



class CarpetaController extends Controller{
    private $carpeta;
    private $ramo;

    function _construct(){
      $this->ramo = "nada";
    }

   public function carpeta($ramo_id){
   	
   		$carpeta = Carpeta::where('ramo_id',$ramo_id)->get();
      $evaluaciones = $this->getEvaluaciones($ramo_id);
      session()->put('ramo', Asignatura::find(Ramo::find($ramo_id))[0]);
      $nombre_ramo = session()->get('ramo')->nombre;
      $user = Auth::user()->name;
      $semestre = "Semestre ".Asignatura::find(Ramo::find($ramo_id))[0]->semestre;
      $año = Ramo::find($ramo_id)->ano;
      $directorio = $user.'/'.$nombre_ramo.'/'.$año.$semestre;
      return view('carpeta',compact('carpeta','evaluaciones','directorio'));
   }

   public function storeFile(request $request, $fileName){
     	$user = Auth::user()->name;
      echo(session()->get('ramo')->codigo);
      $semestre = "Semestre ".Asignatura::find(session()->get('ramo')->codigo)->semestre;
      $ramo_id = session()->get('ramo')->id;
      $año = session()->get('ramo')->ano;
      $directorio = $user.'/'.session()->get('ramo')->nombre.'/'.$año.$semestre;

   
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
