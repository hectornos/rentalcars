<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Cliente as Cliente;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function token() {
        echo csrf_token();
    }

    //Funcion común a todos los modelos que sirve para ordenar el cursor.
    public function ordenar($modelo, $campo) {
		switch ($modelo) {
			case 'cliente':
				$cursor = Cliente::orderBy($campo)->get();
				break;
			case 'vehiculo':
				$cursor = Cliente::orderBy($campo)->get();
				break;
			case 'alquiler':
				$cursor = Cliente::orderBy($campo)->get();
				break;
		}
        
        return $cursor;
	}

}
