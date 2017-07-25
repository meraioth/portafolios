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
Route::get('/evaluacion/delete/{id}','EvaluacionController@destroy');
Route::get('/ramo/create','RamoController@create');

Route::get('formulario', 'StorageController@index');
Route::post('/ramo/store','RamoController@store');
Route::get('/ramo/delete/{id}','RamoController@destroy');

Route::post('/file/{fileName}','CarpetaController@storeFile');
Route::post('/fileEvaluacion/{fileName}','EvaluacionController@storeFile');
Route::get('/show/{fileName}','CarpetaController@showPdf');

Route::get('/{carpeta_id}/evaluacion/create' ,'EvaluacionController@create');
Route::post('/evaluacion/store','EvaluacionController@store');

Route::get('/ramo_jc/{id}','RamoJCController@index');
Route::get('/ramo_jc/{id_usuario}/{id_ramo}','RamoJCController@create');

