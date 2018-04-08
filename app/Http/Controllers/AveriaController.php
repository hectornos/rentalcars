<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;

class AveriaController extends Controller
{
    public function index() {
    	//Sacar listado de averias con su vehiculo asociado
    	$averias = Averia::all();
    	return view('vistaAverias',['averias'=>$averias]);

    }
}
