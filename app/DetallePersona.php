<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePersona extends Model
{
    protected $table = 'detalle_persona';
	protected $primaryKey = 'DetallePersonaID';

	
	public function celular()
	{
		return $this->belongsTo('App\Celular', 'NumeroCelular', 'Numero');
	}
}
