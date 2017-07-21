<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Carpeta;

class CarpetaController extends Controller
{


	private $carpeta;
	private $ramo_id;


   public function index(){
   	return view('carpeta');
   }

   public function carpeta($ramo_id){
   	
   		$this->ramo_id = $ramo_id;
   		$this->carpeta = Carpeta::where('ramo_id',$ramo_id)->get();
   		return view('carpeta')->with('carpeta',$this->carpeta);
   }

   public function storeFile(request $request){

   		return Auth::user()->name;
   		// $user = 
   		// $directorio = '';

   		// $fileName = $request->file->getClientOriginalName();
     //    $fileSize = $request->file->getClientSize();

     //    $request->file->storeAs($directorio,$fileName);


        // $file = new File;

        // $file->name = $fileName;
        // $file->size = $fileSize;

        // $file->save();
   }
}
