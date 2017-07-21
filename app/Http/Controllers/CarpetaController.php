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

   public function carpeta($nombre){
   	
   		// $this->ramo_id = $ramo_id;
   		// $this->carpeta = Carpeta::where('ramo_id',$ramo_id)->get();
   		// return view('carpeta')->with('carpeta',$this->carpeta);
   }

   public function storeFile(request $request){

   		dd(request()->all());
      // $user = "JulioGodoy";
     //  $ramo = "InteligenciaArtificial";
     //  $semestre = "SI";
     //  $año = "2017";
   		// $directorio = $user.'/'.$ramo.'/'.$año.'/'.$semestre;

   		// $fileName = $request->file->getClientOriginalName();
     //  $fileSize = $request->file->getClientSize();

     //  $request->file->storeAs($directorio,$fileName);

     //  $tmp_carpeta = $this->carpeta;
     //  $tmp_carpeta->
     //  $file->name = $fileName;
     //  $file->size = $fileSize;
     //  $file->save();
   }
}
