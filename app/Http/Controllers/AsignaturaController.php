<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asignatura;
use View;

class AsignaturaController extends Controller
{
    
    public function index(){
        $asignaturas = Asignatura::all();
        return view('asignaturas.index',compact('asignaturas'));
    }

    public function create(){
        return view('asignaturas.create');
    }

    public function store(Request $request){
        // dd($request);
        // return $request;
        $asignatura = new Asignatura;

        $asignatura->nombre = request('name');
        $asignatura->semestre = request('semestre');
        // $asignatura->programa = null
        $asignatura->codigo = request('codigo');

        $asignatura->save();

        return redirect('/home');
    }

    public function show(Paciente $asignatura){
        // return $paciente;
        $comidas = $paciente->comidas;
        
        return view('pacientes.show', compact('paciente','comidas'));
    }

    public function edit($id){}

    public function update(Request $request, $id){}

    public function destroy($id){}
}
