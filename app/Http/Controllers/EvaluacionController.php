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

    function _construct(){
      $this->ramo = "nada";
    }
    public function view($evaluacion){
        $evaluacion = Evaluacion::find($evaluacion);
        $carpeta = Carpeta::find($evaluacion->carpeta_id);
        session()->put('ramo', Asignatura::find(Ramo::find($carpeta->ramo_id)));
        $user = Auth::user()->name;
	    $nombre_ramo = session()->get('ramo')[0]->nombre;
	    $semestre = "Semestre ".Asignatura::find(session()->get('ramo')[0]->codigo)->semestre;
	    $año = session()->get('ramo')[0]->ano;
	    $directorio = $user.'/'.$nombre_ramo.'/'.$año.$semestre .'/evaluaciones';
        return view('evaluacion',compact('evaluacion','directorio'));
    }

    public function storeFile(request $request, $fileName){

      $user = Auth::user()->name;
      $semestre = "Semestre ".Asignatura::find(session()->get('ramo')[0]->codigo)->semestre;
      $ramo_id = session()->get('ramo')[0]->id;
      $año = session()->get('ramo')[0]->ano;
      $directorio = $user.'/'.session()->get('ramo')[0]->nombre.'/'.$año.$semestre.'/evaluaciones';

   
      if ($request->hasFile('file')) {
          $originalFileName = $request->file->getClientOriginalName();
          $fileSize = $request->file->getClientSize();
          $fileExtension =  $request->file->extension();
          $commpleteFile = $fileName.'.'.$fileExtension;

          $request->file->storeAs($directorio,$commpleteFile);

          $tmp_evaluacion = Evaluacion::where('carpeta_id', 1)->get();

          $tmp_evaluacion[0][$fileName] = $commpleteFile;
          $tmp_evaluacion[0]->save();
          return "el archivo ". $fileName." se guardara en: ".$directorio;
      }else{
        return 'Hubo un error';
      }
   }
}
