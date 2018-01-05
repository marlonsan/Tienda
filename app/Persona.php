<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
	protected $primaryKey = 'PersonaID';

	public function user()
	{
		return $this->hasMany('App\User', 'PersonaID');
	}

	public function detalle_persona()
	{
		return $this->hasOne('App\DetallePersona', 'PersonaID');
	}

}
