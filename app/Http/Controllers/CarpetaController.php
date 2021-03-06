<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ramo;
use App\Carpeta;
use App\Asignatura;
use App\Evaluacion;
use App\User;
use ZipArchive;
use Illuminate\Support\Facades\Auth;
use Response;


class CarpetaController extends Controller{
    private $carpeta;
    private $ramo;

    function _construct(){
      $this->ramo = "nada";
    }

   public function carpeta($ramo_id){
   	
   		$carpeta = Carpeta::where('ramo_id',$ramo_id)->get();
      $evaluaciones = $this->getEvaluaciones($ramo_id);
      session()->put('ramo', Ramo::find($ramo_id));
      $nombre_ramo = Asignatura::find(session()->get('ramo'))[0]->nombre;
      $user = Auth::user()->name;
      $semestre = "Semestre ".session()->get('ramo')->semestre;
      $año = session()->get('ramo')->ano;
      $directorio = $user.'/'.$nombre_ramo.'/'.$año.'/'.$semestre;
      return view('carpeta',compact('carpeta','evaluaciones','directorio'));

   }

   public function storeFile(request $request, $fileName){

     	$user = Auth::user()->name;
      $semestre = "Semestre ".session()->get('ramo')->semestre;
      $nombre_ramo = Asignatura::find(session()->get('ramo'))[0]->nombre;
      $año = session()->get('ramo')->ano;
      $directorio = $user.'/'.$nombre_ramo.'/'.$año.'/'.$semestre.'/';
      $directorio2 = $user.'/'.$nombre_ramo.'/'.$año.'/'.$semestre.'/material/';

   
      if ($request->hasFile('file')) {
          $originalFileName = $request->file->getClientOriginalName();
          $fileSize = $request->file->getClientSize();
          $fileExtension =  $request->file->extension();
          if($fileName == 'material'){
            $commpleteFile = $originalFileName;
            $directorio = $directorio2;
          }
          else{
            $commpleteFile = $fileName.'.'.$fileExtension;
          }

          $request->file->storeAs($directorio,$commpleteFile);

          $tmp_carpeta = Carpeta::where('ramo_id', session()->get('ramo')->id)->get();

          $tmp_carpeta[0][$fileName] = $commpleteFile;
          $tmp_carpeta[0]->save();
          return redirect('/carpeta/'.$tmp_carpeta[0]->ramo_id);
      }else{
        return 'Hubo un error';
      }
   }


   public function showPdf($fileName){

      $user = Auth::user()->name;
      $semestre = "Semestre ".session()->get('ramo')->semestre;
      $nombre_ramo = Asignatura::find(session()->get('ramo'))[0]->nombre;
      $año = session()->get('ramo')->ano;
      $directorio = 'app/'.$user.'/'.$nombre_ramo.'/'.$año.'/'.$semestre.'/';

      $path = storage_path($directorio.$fileName);
      //return $path;
      return Response::make(file_get_contents($path), 200, [
          'Content-Type' => 'application/pdf',
          'Content-Disposition' => 'inline; filename="'.$fileName.'"'
      ]);
   }
   public function descargarMaterial(){
      $user = Auth::user()->name;
      $semestre = "Semestre ".session()->get('ramo')->semestre;
      $nombre_ramo = Asignatura::find(session()->get('ramo'))[0]->nombre;
      $año = session()->get('ramo')->ano;
      $directorio = 'app/'.$user.'/'.$nombre_ramo.'/'.$año.'/'.$semestre.'/';
      $this->zipMaterial($directorio.'/material/');
      return Response::download(public_path().'/material.zip');
   }

   private function zipMaterial($urlCarpeta){
        $rootPath = storage_path($urlCarpeta);
        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open('material.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($rootPath),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                // Add current file to archive
                $zip->addFile($filePath, $relativePath);                
            }  
        }
        // Zip archive will be created only after closing object
        $zip->close();
        return 'material.zip';
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
