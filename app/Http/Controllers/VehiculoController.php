<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;


class VehiculoController extends Controller
{
    public function jsonPrueba(){
    	$vehiculos = Vehiculo::all();
    	return view('vistaJson',['vehiculos'=>$vehiculos]);
    }
}
