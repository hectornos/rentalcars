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
	//Listado completo de alquileres
    public function index (Request $request) {
        if ($request->has('criterio')){
            $orden=$request->criterio;
            $averias = Averia::orderBy($orden)->get();
        }else{
            $averias = Averia::all();   
        }
        $count = $averias->count();
        $ordenar = true;
        return \View::make('vistaAverias',compact('averias'),['count'=>$count, 'ordenar'=>$ordenar]);
    }

	//Detalle de una averia dado su id (primary key)
	public function show($id) {
		$averia = Averia::find($id);
        return \View::make('vistaDetAveria',compact('averia'));
    }

	//Averias de un vehiculo
    public function listar($vehiculo_id) {
        $averias = Averia::where('vehiculo_id', $vehiculo_id)->get();
        $count = $averias->count();
        $ordenar = false;
		return \View::make('vistaAverias',compact('averias'),['count'=>$count, 'ordenar'=>$ordenar]);
    }
}
