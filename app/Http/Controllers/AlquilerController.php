<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;

class AlquilerController extends Controller
{
    //Listado completo de alquileres
    public function index () {
        $alquileres = Alquiler::all();
        $count = $alquileres->count();
        return \View::make('vistaAlquileres',compact('alquileres'),['count'=>$count]);
    }

    //Detalle de un alquiler dado su id (primary key)
    public function show($id) {
		$alquiler = Alquiler::find($id);
		return $alquiler;
    }
    
    //Alquileres de un cliente
    public function listarCli($cliente_id) {
        $alquileres = Alquiler::where('cliente_id', $cliente_id)->get();
        $count = $alquileres->count();
        return \View::make('vistaAlquileres',compact('alquileres'),['count'=>$count]);
    }

    //Alquileres de un vehiculo
    public function listarVeh($vehiculo_id) {
        $alquileres = Alquiler::where('vehiculo_id', $vehiculo_id)->get();
        $count = $alquileres->count();
        return \View::make('vistaAlquileres',compact('alquileres'),['count'=>$count]);
    }

}
