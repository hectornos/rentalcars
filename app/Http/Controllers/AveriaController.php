<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;
use App\Tipoaveria as Tipoaveria;

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
        return \View::make('Averia/rejillaAverias',compact('averias'),['count'=>$count, 'ordenar'=>$ordenar]);
    }

    //Pantalla para crear una nueva averia
    public function create($vehiculo_id) {
      $vehiculo = Vehiculo::find($vehiculo_id);
      $tipoaverias = Tipoaveria::all();
      return \View::make('Averia/createAveria', compact('tipoaverias'), ['vehiculo'=>$vehiculo]);
    }
    
    
    //Metodo de añadir un vehiculo
	  public function store(Request $request) {
      if ($request->has('cancel')) {
        $alerta = 'Cancelado';
        $mensaje = 'Operacion cancelada';
      } else {
        Averia::create($request->all());
        $alerta = 'Creado';
        $mensaje = "Averia ".$request->matrciula. " añadida.";
      }
      return redirect(url('/Averia'))->with($alerta,$mensaje);
    }

    //Editamos una averia
	public function edit($id) {
      $averia = Averia::find($id);
      $tipoaverias = Tipoaveria::all();
      $vehiculos = Vehiculo::all();
      return \View::make('Averia/editAveria',compact('averia'),['tipoaverias'=>$tipoaverias,'vehiculos'=>$vehiculos]);
    }

    //Almacena los cambios en la averia
    public function update(Request $request) {
        if ($request->has('cancel')) {
			$alerta = 'Cancelado';
			$mensaje = 'Operacion cancelada';
		} else {
            Averia::find($request->id)->update($request->all());
            $alerta = 'Modificado';
            $mensaje = 'Registro modificado';
		}
		return redirect(url('/Averia'))->with($alerta,$mensaje);
    }

    //Detalle de una averia dado su id (primary key)
    public function show($id) {
        $averia = Averia::find($id);
        return \View::make('Averia/showAveria',compact('averia'));
    }

    //Metodo de borrar una averia
		public function destroy(Request $request) {
			if ($request->has('cancel')) {
				$alerta = 'Cancelado';
				$mensaje = 'Operacion cancelada';
			} else {
				$averia = Averia::find($request->id);
				$averia -> delete();
				$alerta = 'Borrado';
				$mensaje = "Averia borrada.";
			}
			return redirect(url('/Averia'))->with($alerta,$mensaje);
		}

    //Imprimimios una averia
	public function pdf($id) {
		$averia = Averia::find($id);
        echo $averia;
    }

	
}
