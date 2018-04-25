<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;
use App\Marca as Marca;
use App\Tipo as Tipo;
use App\Combustible as Combustible;
use App\Cambio as Cambio;
use App\Color as Color;


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
        return \View::make('Vehiculo/rejillaVehiculos',compact('vehiculos'),['count'=>$count]);
    }

    //Pantalla para crear un cliente nuevo
	public function create() {
        $marcas = Marca::all();
        $tipos = Tipo::all();
        $cambios = Cambio::all();
        $combustibles = Combustible::all();
        $colors = Color::all();
        return \View::make('Vehiculo/createVehiculo',['marcas'=>$marcas,'tipos'=>$tipos,'cambios'=>$cambios,'combustibles'=>$combustibles,'colors'=>$colors]);
	}

    //Metodo de añadir un vehiculo
	public function store(Request $request) {
		if ($request->has('cancel')) {
			$alerta = 'Cancelado';
			$mensaje = 'Operacion cancelada';
		} else {
			Vehiculo::create($request->all());
			$alerta = 'Creado';
			$mensaje = "Vehiculo con matricula ".$request->matrciula. " ha sido creado.";
		}
		return redirect(url('/Vehiculo'))->with($alerta,$mensaje);
    }

    //Pantalla para editar un vehiculo
	public function edit($id) {
        $vehiculo = Vehiculo::find($id);
        $marcas = Marca::all();
        $tipos = Tipo::all();
        $cambios = Cambio::all();
        $combustibles = Combustible::all();
        $colors = Color::all();
		return \View::make('Vehiculo/editVehiculo',compact('vehiculo'),['marcas'=>$marcas,'tipos'=>$tipos,'cambios'=>$cambios,'combustibles'=>$combustibles,'colors'=>$colors]);
    }

    //Almacena los cambios realizados en el vehiculo
    public function update(Request $request) {
        if ($request->has('cancel')) {
			$alerta = 'Cancelado';
			$mensaje = 'Operacion cancelada';
		} else {
            Vehiculo::find($request->id)->update($request->all());
            $alerta = 'Modificado';
            $mensaje = 'Registro modificado';
		}
		return redirect(url('/Vehiculo'))->with($alerta,$mensaje);
    }

    //Detalle de un vehiculo dado su id (primary key)
    public function show($id) {
		$vehiculo = Vehiculo::find($id);
        return \View::make('Vehiculo/showVehiculo',compact('vehiculo'));
    }

    //Metodo de borrar un vehiculo
		public function destroy(Request $request) {
			if ($request->has('cancel')) {
				$alerta = 'Cancelado';
				$mensaje = 'Operacion cancelada';
			} else {
				$vehiculo = Vehiculo::find($request->id);
				$vehiculo -> delete();
				$alerta = 'Borrado';
				$mensaje = "Vehiculo ".$request->matricula. " ha sido borrado.";
			}
			return redirect(url('/Vehiculo'))->with($alerta,$mensaje);
        }
        
    //Alquileres de un vehiculo
    public function listaralc($id) {
        $vehiculo = Vehiculo::find($id);
        $alquileres = $vehiculo->alquileres;
        $count = count($alquileres);
        $ordenar = false;
        $subtitulo = 'Alquileres del vehiculo: '.$vehiculo->matricula;
        return \View::make('Alquiler/rejillaAlquileres',compact('alquileres'),['count'=>$count, 'ordenar'=>$ordenar, 'subtitulo'=>$subtitulo]);
    }

    //Averias de un vehiculo
    public function listarave($id) {
        $vehiculo = Vehiculo::find($id);
        $averias = $vehiculo->averias;
        $count = count($averias);
        $ordenar = false;
        $subtitulo = 'Averias del vehiculo: '.$vehiculo->matricula;
        return \View::make('Averia/rejillaAverias',compact('averias'),['count'=>$count, 'ordenar'=>$ordenar, 'subtitulo'=>$subtitulo]);
    }

    //Imprime en pdf detalle de vehiculo
    public function pdf($id) {
        echo ('Aqui se imprimirá el vehiculo');
    }
}
