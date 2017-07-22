<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ramo;

class RamoController extends Controller
{
    public function view($id){
    	$ramo = Ramo::find($id);
    	dd($ramo);
    }
}
