<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Ramo;
use App\Asignatura;
use App\Carpeta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $ramos= $this->getRamos();
        return view('home')->with('ramos',$ramos);
    }

     public function evaluaciones($idcarpeta)
    {   

        $carpeta = Carpeta::find($idcarpeta);
        $evaluaciones=[];

        foreach ($carpeta->evaluaciones as $evaluacion ) {
            $evaluaciones[$evaluacion->id]= Evaluacion::find($evaluacion->id);
        }

        

        return view('evaluacion',$evaluaciones);
    }


    private function getRamos(){
        $salida =[];
        foreach (Auth::user()->ramos as $ramo ) {
            $salida[$ramo->codigo_asignatura]= Asignatura::find($ramo->codigo_asignatura);
        }
        return $salida;
    }
}
