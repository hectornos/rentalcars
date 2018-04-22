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
	//Listado completo de averias
    public function index (Request $request) {
        if ($request->has('criterio')){
            $orden=$request->criterio;
            if ($orden == 'tipo'){
                $averias = Averia::join('tipoaverias', 'averias.tipoaveria_id','=','tipoaverias.id')
                                    ->select('averias.*')
                                    ->orderBy('tipoaverias.nombre','desc')->get();
            }elseif ($orden == 'matricula') {
                $averias = Averia::join('vehiculos', 'vehiculos.id','=','averias.vehiculo_id')
                                    ->select('averias.*')
                                    ->orderBy('vehiculos.matricula','desc')->get();
            }else{
                $averias = Averia::orderBy($orden)->get();
            }
        }else{
            $averias = Averia::all();   
        }
        $count = $averias->count();
        $ordenar = true;
        return \View::make('rejillaAverias',compact('averias'),['count'=>$count, 'ordenar'=>$ordenar]);
    }

	//Detalle de una averia dado su id (primary key)
	public function show($id) {
		$averia = Averia::find($id);
        return \View::make('vistaDetAveria',compact('averia'));
    }

    //Editamos una averia
	public function edit($id) {
		$averia = Averia::find($id);
        echo $averia;
    }

    //Imprimimios una averia
	public function pdf($id) {
		$averia = Averia::find($id);
        echo $averia;
    }

	
}
