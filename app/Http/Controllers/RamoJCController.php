<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Asignatura;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
