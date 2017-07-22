<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;
use App\Ramo;
use App\Asignatura;
use App\Carpeta;
use Illuminate\Http\Request;
use App\Evaluacion;

Route::get('/', function () {
    return view('Auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('formulario', 'StorageController@index');

Route::get('/carpeta/{ramo_id}','CarpetaController@carpeta');
Route::get('/evaluaciones/{id}','EvaluacionController@view');


Route::get('formulario', 'StorageController@index');



// Carpeta Controller probando que funcione bien luego lo paso a un controller
// Route::get('/carpeta/{ramo_id}', function($ramo_id){
// 	$user = "JulioGodoy";
//     $ramo = "InteligenciaArtificial";
//     $semestre = "SI";
//     $año = "2017";

//     $directorio = $user.'/'.$ramo.'/'.$año.$semestre;

//    	$carpeta = Carpeta::where('ramo_id',$ramo_id)->get();
//    	// return view('carpeta')->with('carpeta',$carpeta);
//    	return view('carpeta',compact('carpeta','directorio'));
// });

// Route::get('/show/{fileName}',function($fileName){

// 	$user = "JulioGodoy";
//     $ramo = "InteligenciaArtificial";
//     $semestre = "SI";
//     $año = "2017";

//     $directorio = 'app\public\JulioGodoy\InteligenciaArtificial\2017SI\\';
// 	// $filename = 'syllabus.pdf';
//     // $path = storage_path($filename);
//     $path = storage_path($directorio.$fileName);
//     // return $path;
//     return Response::make(file_get_contents($path), 200, [
//         'Content-Type' => 'application/pdf',
//         'Content-Disposition' => 'inline; filename="'.$fileName.'"'
//     ]);
// });

// Route::post('/file/{fileName}', function(request $request, $fileName){
	
// 	$user = "JulioGodoy";
//     $ramo = "InteligenciaArtificial";
//     $semestre = "SI";
//     $año = "2017";
//    	$directorio = 'public/'.$user.'/'.$ramo.'/'.$año.$semestre;

 
// 	if ($request->hasFile('file')) {
// 	    $originalFileName = $request->file->getClientOriginalName();
// 	   	$fileSize = $request->file->getClientSize();
// 	   	$fileExtension =  $request->file->extension();
// 	   	$commpleteFile = $fileName.'.'.$fileExtension;

// 	    $request->file->storeAs($directorio,$commpleteFile);

// 	    $tmp_carpeta = Carpeta::where('ramo_id', 1)->get();

// 	    $tmp_carpeta[0][$fileName] = $commpleteFile;
// 	    $tmp_carpeta[0]->save();
// 	    return "el archivo ". $fileName." se guardara en: ".$directorio;
// 	}else{
// 		return 'Hubo un error';
// 	}
// });

Route::post('/file/{fileName}','CarpetaController@storeFile');
Route::post('/fileEvaluacion/{fileName}','EvaluacionController@storeFile');
Route::get('/show/{fileName}','CarpetaController@showPdf');


