<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
Los modelos Combustible, Color, Cambio, Tipo y Marca hacen referencia a las tablas
de igual nombre, y están relacionadas con la tabla vehículo, de modo que un vehiculo
tiene una marca, cambio, combustible, color y es de un tipo concreto.
*/


class Cambio extends Model
{
    protected $table = 'cambios';
    protected $fillable = ['id','nombre'];
    //-----------------------------------------------------------------------
    //El tipo de cambio puede ser compartido por varios vehiculos
    //-----------------------------------------------------------------------
    public function vehiculos(){
    	return $this->hasMany('App\Vehiculo');
    }
    public $timestamps = false;
    
}
