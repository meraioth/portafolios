<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluacion;
use App\Carpeta;
use App\Ramo;
use App\Asignatura;
use Illuminate\Support\Facades\Auth;


class EvaluacionController extends Controller
{
	private $ramo;
	private $carpeta;

    function _construct(){
      $this->ramo = "nada";
      $this->carpeta = "nada";
    }
    public function view($evaluacion){
        $evaluacion = Evaluacion::find($evaluacion);
        session()->put('carpeta',Carpeta::find($evaluacion->carpeta_id));
        session()->put('ramo', Ramo::find(session()->get('carpeta')->ramo_id));
        $nombre_ramo = Asignatura::find(session()->get('ramo'))[0]->nombre;
        $user = Auth::user()->name;
        $semestre = "Semestre ".session()->get('ramo')->semestre;
        $año = session()->get('ramo')->ano;
	    $directorio = $user.'/'.$nombre_ramo.'/'.$año.'/'.$semestre .'/evaluaciones';
        return view('evaluacion',compact('evaluacion','directorio'));
    }

    public function storeFile(request $request, $fileName){

      $user = Auth::user()->name;
      $semestre = "Semestre ".session()->get('ramo')->semestre;
      $año = session()->get('ramo')->ano;
      $nombre_ramo = Asignatura::find(session()->get('ramo'))[0]->nombre;
      $directorio = $user.'/'.$nombre_ramo.'/'.$año.'/'.$semestre.'/evaluaciones';

   
      if ($request->hasFile('file')) {
          $originalFileName = $request->file->getClientOriginalName();
          $fileSize = $request->file->getClientSize();
          $fileExtension =  $request->file->extension();
          $commpleteFile = $fileName.'.'.$fileExtension;

          $request->file->storeAs($directorio,$commpleteFile);

          $tmp_evaluacion = Evaluacion::where('carpeta_id', session()->get('carpeta')->id)->get();

          $tmp_evaluacion[0][$fileName] = $commpleteFile;
          $tmp_evaluacion[0]->save();
          return "el archivo ". $fileName." se guardara en: ".$directorio;
      }else{
        return 'Hubo un error';
      }
   }
}
