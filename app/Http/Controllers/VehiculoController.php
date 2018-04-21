<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;


class VehiculoController extends Controller
{
    //Listado completo de vehiculos
    public function index(Request $request) {
        if ($request->has('criterio')){
            $orden = $request->criterio;
            if ($orden == 'alquileres'){
              $vehiculos = Vehiculo::join('cliente_vehiculo', 'vehiculos.id','=','cliente_vehiculo.vehiculo_id', 'left outer')
                                ->select('vehiculos.*',DB::raw('count(vehiculo_id) as vehi_count'))
                                ->groupBy('vehiculos.id')
                                ->orderBy('vehi_count','desc')
                                ->get();
            }elseif ($orden == 'averias'){
              $vehiculos = Vehiculo::join('averias', 'vehiculos.id','=','averias.vehiculo_id','left outer')
                                ->select('vehiculos.*',DB::raw('count(vehiculo_id) as vehi_count'))
                                ->groupBy('vehiculos.id')
                                ->orderBy('vehi_count','desc')
                                ->get();
            }elseif ($orden == 'marca'){
              $vehiculos = Vehiculo::join('marcas', 'vehiculos.marca_id','=','marcas.id')
                                ->select('vehiculos.*')
                                ->orderBy('marcas.nombre','desc')
                                ->get();
            }else{
                $vehiculos = Vehiculo::orderBy($orden)->get();
            }
        }else{
            $vehiculos = Vehiculo::all();
        }
        $count = count($vehiculos);
        return \View::make('rejillaVehiculo',compact('vehiculos'),['count'=>$count]);
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

    //Imprime en pdf detalle de vehiculo
    public function pdf($id) {
        echo ('Aqui se imprimirá el vehiculo');
    }

    //Edita un cliente
	public function edit($id) {
		$vehiculo = Vehiculo::find($id);
		echo $vehiculo;
	}
}
