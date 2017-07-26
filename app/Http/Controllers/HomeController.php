<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Ramo;
use App\Asignatura;
use App\Carpeta;
use App\Evaluacion;

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
    public function index(){
        $ramos= $this->getRamos();
        //dd($ramos);

        $fechas = array();
        foreach($ramos[1] as $ramo){
            //dd($ramo);
            $fecha = $ramo->ano;
            $fechas[$fecha] = $fecha; 
        }   

        //ramos es asignatura parece
        return view('home',['fechas'=>$fechas,'ramos'=>$ramos[0],'Ramos'=>$ramos[1],'usuarios'=>User::all()]);

        //return view('home',compact('ramos','Ramos','usuario'));
    }

    private function getRamos(){
        $salida1 =[];
        $salida2 =[];
        foreach (Auth::user()->ramos as $ramo ) {
            
            $salida1[$ramo->id]= Asignatura::find($ramo->codigo_asignatura);
            
        }
        return [$salida1,Auth::user()->ramos];
    }

    
}
