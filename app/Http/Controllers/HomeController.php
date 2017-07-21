<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Ramo;
use App\Asignatura;

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
        var_dump($ramos);
        return view('home')->with('ramos',$ramos);
    }

    private function getRamos(){
        $salida =[];
        foreach (Auth::user()->ramos as $ramo ) {
            $salida[$ramo->codigo_asignatura]= Asignatura::find($ramo->codigo_asignatura);
        }
        return $salida;
    }
}
