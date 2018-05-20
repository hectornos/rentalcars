<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;
use Barryvdh\DomPDF\Facade as PDF;

class AlquilerController extends Controller
{
    //Listado completo de alquileres
    public function index (Request $request) {
        if ($request->has('criterio')){
          $orden = $request->criterio;
          if ($orden == 'incidencias'){
            $alquileres = Alquiler::join('incidencias', 'cliente_vehiculo.id','=','incidencias.alquiler_id','left outer')
                          ->select('cliente_vehiculo.*', DB::raw('count(alquiler_id) as alq_count'))
                          ->groupBy('cliente_vehiculo.id')
                          ->orderBy('alq_count','desc')
                          ->paginate(8);
          }elseif ($orden == 'conductor'){
            $alquileres = Alquiler::join('clientes', 'cliente_vehiculo.cliente_id','=','clientes.id')
                          ->select('cliente_vehiculo.*')
                          ->orderBy('clientes.apellido','asc')
                          ->paginate(8);
          }elseif ($orden == 'matricula'){
            $alquileres = Alquiler::join('vehiculos', 'cliente_vehiculo.vehiculo_id','=','vehiculos.id')
                          ->select('cliente_vehiculo.*')
                          ->orderBy(\DB::raw('substr(vehiculos.matricula,5,3)'))
                          ->orderBy(\DB::raw('substr(vehiculos.matricula,1,4)'))
                          ->paginate(8);
          }else{
              $alquileres = Alquiler::orderBy($orden)->paginate(8);
          }
        }else{
          if ($request->busqueda!=""){
            if ($request->filtro == 'matricula') {
              $alquileres = Alquiler::join('vehiculos', 'cliente_vehiculo.vehiculo_id','=','vehiculos.id')
                            ->where('vehiculos.matricula',$request->busqueda)
                            ->orderby('fecha','desc')
                            ->paginate(8);
            }elseif ($request->filtro == 'apellido') {
              $alquileres = Alquiler::join('clientes', 'cliente_vehiculo.cliente_id','=','clientes.id')
                            ->where('clientes.apellido',$request->busqueda)
                            ->orderby('fecha','desc')
                            ->paginate(8);
            }        
          }else{
            if ($request->date1 != "" && $request->date2 != "") {
              $alquileres = Alquiler::whereBetween('fecha', [$request->date1, $request->date2])
                                        ->orderby('fecha','desc')
                                        ->paginate(8);
            } else {
              $alquileres = Alquiler::paginate(8);
            }
          } 
        }
            $ordenar = true;
            $count = count($alquileres);
            return \View::make('Alquiler/rejillaAlquileres',compact('alquileres'),['count'=>$count, 'ordenar'=>$ordenar]);
    }

    //Detalle de un alquiler dado su id (primary key)
    public function show($id) {
        $alquiler = Alquiler::find($id);
        $numIncidencias = $alquiler->incidencias->count();
		  return \View::make('Alquiler/showAlquiler',compact('alquiler'),['numIncidencias'=>$numIncidencias]);
    }
    
    

    //Metodo de añadir un alquiler
	public function store(Request $request) {
		if ($request->has('cancel')) {
			$alerta = 'Cancelado';
			$mensaje = 'Operacion cancelada';
		} else {
			Alquiler::create($request->all());
			$alerta = 'Creado';
			$mensaje = $request->nombre. " ha sido creado.";
		}
		return redirect(url('/Alquiler'))->with($alerta,$mensaje);
	}

    	//Metodo de borrar un alquiler
		public function destroy(Request $request) {
			if ($request->has('cancel')) {
				$alerta = 'Cancelado';
				$mensaje = 'Operacion cancelada';
			} else {
				$alquiler = Alquiler::find($request->id);
				$alquiler -> delete();
				$alerta = 'Borrado';
				$mensaje = "Alquiler ".$request->id. " ha sido borrado.";
			}
			return redirect(url('/Alquiler'))->with($alerta,$mensaje);
		}

    //Editar un alquiler
    public function edit($id) {
        $alquiler = Alquiler::find($id);
        return \View::make('Alquiler/detalleAlquiler',compact('alquiler'));
    }

    /*Listar las incidencias de un alquiler
    @ Recibe: id del alquiler
    @ Devuelve: Objeto incidencias, count de incidencias, boolean ordenar, subtitulo*/
    public function listarinc($id) {
      $alquiler = Alquiler::find($id);
      $incidencias = $alquiler->incidencias;
      $count = count($incidencias);
      $ordenar = false;
      $subtitulo = 'Incidencias asociadas al alquiler con id: '.$alquiler->id;
      return \View::make('Incidencia/rejillaIncidencias',compact('incidencias'),['count'=>$count, 'ordenar'=>$ordenar, 'subtitulo'=>$subtitulo]);
  }

    //Imprimir un alquiler
    public function pdf($id) {
        $alquiler = Alquiler::find($id);
        echo 'IMPRIMIR: '+$alquiler;
    }

    /*Cancela operación, lleva al index.
  @ Recibe: Request con mensaje a mostrar
  @ Devuelve: */
	public function cancel(Request $request) {
		$alerta = 'Cancelado';
		$mensaje = $request->mensaje;
		  $alquileres = Alquiler::all();
		  return redirect(url('/Alquiler'))->with($alerta,$mensaje,$alquileres);
	  }

}
