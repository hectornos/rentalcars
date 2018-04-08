<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
