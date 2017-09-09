<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Ramo;
use App\Carpeta;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class RamoController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('create_ramo',['asignaturas'=>Asignatura::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ramo = new Ramo;
        $ramo->codigo_asignatura = $request->asignatura_codigo;
        $ramo->ano = $request->ano;
        $ramo->semestre = $request->semestre;
        $ramo->save();
        DB::table('ramo_user')->insert(['user_id'=>Auth::user()->id,'ramo_id'=>$ramo->id]);
        $carpeta = new Carpeta;
        $carpeta->ramo_id=$ramo->id;
        $carpeta->save();
        return redirect('home');
           
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
        $ramo=Ramo::find($id);
        $carpeta=$ramo->carpeta;
        DB::table('evaluacions')->where('carpeta_id','=',$carpeta->id)->delete();
        $carpeta->delete();
        DB::table('ramo_user')->where('ramo_id','=',$ramo->id)->delete();
        $ramo->delete();
        return redirect('home');
    }
}
