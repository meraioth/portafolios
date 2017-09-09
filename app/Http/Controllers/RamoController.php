<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Ramo;
use App\Carpeta;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class RamoController extends Controller
{

    public function index()
    {
        //
    }

    public function create($user_id)
    {
        $asignado = User::find($user_id);

        return view('ramos.asignar',[
            'asignaturas'=>Asignatura::all(),
            'asignado' => $asignado
            ]
        );
    }

    public function store(Request $request)
    {
        // dd($request);
        $ramo = new Ramo;
        $ramo->codigo_asignatura = $request->codigo_asignatura;
        $ramo->ano = $request->ano;
        $ramo->semestre = $request->semestre;
        $ramo->save();

        
        DB::table('ramo_user')->insert([
            'user_id'=>$request->user_id,
            'ramo_id'=>$ramo->id
            ]
        );
        
        $carpeta = new Carpeta;
        $carpeta->ramo_id =$ramo->id;
        $carpeta->planilla = "no disponible";
        $carpeta->syllabus = "no disponible";
        $carpeta->acta = "no disponible";
        $carpeta->material = "no disponible";
        $carpeta->save();
        
        return redirect('/ramo_jc/'.$request->user_id);
           
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
        $ramo=Ramo::find($id);
        $carpeta=$ramo->carpeta;
        DB::table('evaluacions')->where('carpeta_id','=',$carpeta->id)->delete();
        $carpeta->delete();
        DB::table('ramo_user')->where('ramo_id','=',$ramo->id)->delete();
        $ramo->delete();
        return redirect('home');
    }
}
