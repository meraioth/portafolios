<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Asignatura;
use App\Ramo;
use ZipArchive;
use File;
use Session;

class RamoJCController extends Controller
{
   public function index($id_usuario){
        $ramos= $this->getRamos($id_usuario);
        $usuario = User::find($id_usuario);
        // return $usuario;
        return view('ramo_jc',[
            'ramos'=>$ramos[0],
            'Ramos'=>$ramos[1],
            'user'=> $usuario
            ]
        );
    }

    private function getRamos($id){
        $salida1 =[];
        $salida2 =[];
        foreach (User::find($id)->ramos as $ramo ) {
            
            $salida1[$ramo->id]= Asignatura::find($ramo->codigo_asignatura);
            
        }
        return [$salida1,User::find($id)->ramos];
    }

    private function zipCarpeta($urlCarpeta,$asignatura,$ramo)
    {
        // Get real path for our folder
        $rootPath = realpath($urlCarpeta);
        if($rootPath == false){ 
            return false;
        }
        else{

        //echo $rootPath;

        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open($asignatura->nombre.$ramo->ano.'-'.$ramo->semestre.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

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
        return $asignatura->nombre.$ramo->ano.'-'.$ramo->semestre.'.zip';
        }
    }

    public function create($idUsuario,$idRamo)
    {
        $nombreUsuario = User::find($idUsuario)->name;
        $ramo = Ramo::find($idRamo);
        $asignatura = $ramo->asignatura;
        $urlCarpeta = storage_path()."/app/".$nombreUsuario."/".$asignatura->nombre."/".$ramo->ano."/Semestre ".$ramo->semestre."/";
        $zipName = $this->zipCarpeta($urlCarpeta,$asignatura,$ramo);
        if($zipName != false){
        $headers = array('Content-Type' => File::mimeType(public_path($zipName)));

        Session::flash('nofile',false);
        return response()->download(public_path($zipName),$zipName,$headers);
        
        }else {Session::flash('nofile',true);
            return redirect()->back();}
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
