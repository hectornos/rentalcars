<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
Los modelos Combustible, Color, Cambio, Tipo y Marca hacen referencia a las tablas
de igual nombre, y están relacionadas con la tabla vehículo, de modo que un vehiculo
tiene una marca, cambio, combustible, color y es de un tipo concreto.
*/


class Tipo extends Model
{
    protected $table = 'tipos';
    protected $fillable = ['id','nombre'];

    //-----------------------------------------------------------------------
    //El tipo de vehiculo puede ser compartido por varios vehiculos
    //-----------------------------------------------------------------------

    public function vehiculos(){
    	return $this->hasMany('App\Vehiculo');
    }
}
