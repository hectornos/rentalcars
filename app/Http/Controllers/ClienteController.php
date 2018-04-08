<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;

class ClienteController extends Controller
{
    public function ver(){
    	$clientes = Cliente::all();
    	return view('vistaVer',['clientes'=>$clientes]);
    }

    public function verIncidencias() {
    	//Supongo que quiero ver las incidencias del cliente 1
    	$cliente = Cliente::find(1);
    	return view('vistaIncidencias',['cliente'=>$cliente]);
    }
}
