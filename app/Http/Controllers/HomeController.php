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
        return view('home',['ramos'=>$ramos[0],'id'=>$ramos[1]]);
    }

    private function getRamos(){
        $salida1 =[];
        $salida2 =[];
        foreach (Auth::user()->ramos as $ramo ) {
            
            $salida1[$ramo->codigo_asignatura]= Asignatura::find($ramo->codigo_asignatura);
            $salida2[$ramo->codigo_asignatura]= $ramo->id;
        }
        return [$salida1,$salida2];
    }

    
}
