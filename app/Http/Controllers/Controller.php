<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function token() {
        echo csrf_token();
    }

    public function ordenar($modelo, $campo) {
        $modelo = ucfirst($modelo);
        $cursor = $modelo::orderBy($campo)->get();
        return $cursor;
    }


}
