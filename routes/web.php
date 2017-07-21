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

Route::get('/', function () {
    return view('Auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Carpeta Controller probando que funcione bien luego lo paso a un controller
Route::get('/carpeta/{ramo_id}', function($ramo_id)
{
   	
   	$carpeta = Carpeta::where('ramo_id',$ramo_id)->get();
   	return view('carpeta')->with('carpeta',$carpeta);
});

Route::post('/file/{fileName}', function(request $request, $fileName){
	//dd($request->all());
	// $fileName+=;
	
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
	    $tmp_carpeta->save();
	    return "el archivo ". $fileName." se guardara en: ".$directorio;
	}else{
		return 'Hubo un error';
	}

});
// Route::get('/carpeta/{nombre}', 'CarpetaController@index');

// Route::get('/carpeta/{ramo_id}','CarpetaController@carpeta')->name('carpeta/{ramo_id}');

// Route::post('/carpeta','CarpetaController@storeFile');

