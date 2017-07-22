<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Carpeta;
use App\Ramo;

class CarpetaController extends Controller
{


	private $carpeta;
	private $ramo;


   public function index(){
   	return view('carpeta');
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
}
