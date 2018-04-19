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
    //Listado completo de vehiculos
    public function index(Request $request) {
        $vehiculos = Vehiculo::all();
        $count = $vehiculos->count();
        return \View::make('vistaVehiculos',compact('vehiculos'),['count'=>$count]);
    }
    
    //Detalle de un vehiculo dado su id (primary key)
    public function show($id) {
		$vehiculo = Vehiculo::find($id);
        return \View::make('vistaDetVehiculo',compact('vehiculo'));
    }

    //Alquileres de un vehiculo
    public function listaralc($id) {
        $vehiculo = Vehiculo::find($id);
        $alquileres = $vehiculo->alquileres;
        $count = count($alquileres);
        return \View::make('vistaAlquileres',compact('alquileres'),['count'=>$count]);
    }

    //Averias de un vehiculo
    public function listarave($id) {
        $vehiculo = Vehiculo::find($id);
        $averias = $vehiculo->averias;
        $count = count($averias);
        return \View::make('vistaAverias',compact('averias'),['count'=>$count]);
    }
}
