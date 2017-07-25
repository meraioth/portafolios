<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Asignatura;
use App\Ramo;
use ZipArchive;
use File;

class RamoJCController extends Controller
{
   public function index($id){
        $ramos= $this->getRamos($id);
        
        return view('ramo_jc',['ramos'=>$ramos[0],'Ramos'=>$ramos[1],'user'=>$id]);
    }

    private function getRamos($id){
        $salida1 =[];
        $salida2 =[];
        foreach (User::find($id)->ramos as $ramo ) {
            
            $salida1[$ramo->id]= Asignatura::find($ramo->codigo_asignatura);
            
        }
        return [$salida1,User::find($id)->ramos];
    }

    private function zipCarpeta($urlCarpeta,$asignatura,$ramo){
                // Get real path for our folder
        $rootPath = realpath($urlCarpeta);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idUsuario,$idRamo)
    {
        $nombreUsuario = User::find($idUsuario)->name;
        $ramo = Ramo::find($idRamo);
        $asignatura = $ramo->asignatura;
        $urlCarpeta = storage_path()."/app/".$nombreUsuario."/".$asignatura->nombre."/".$ramo->ano."/Semestre ".$ramo->semestre."/";
        $zipName = $this->zipCarpeta($urlCarpeta,$asignatura,$ramo);
        echo public_path($zipName);
        $headers = array('Content-Type' => File::mimeType(public_path($zipName)));
        Session::flash('download.in.the.next.request',public_path($zipName));
        redirect()->back();
        //return response()->download(public_path($zipName),$zipName,$headers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
