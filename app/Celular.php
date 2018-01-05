<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celular extends Model
{
    protected $table = 'celular';
	protected $primaryKey = 'CelularID';

	public function detalle_persona()
	{
		return $this->hasOne('App\DetallePersona', 'NumeroCelular', 'Numero');
	}

	public function operadora()
	{
		return $this->hasOne('App\Operadora', 'OperadoraID', 'OperadoraID');
	}
}
