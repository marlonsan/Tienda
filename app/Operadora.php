<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operadora extends Model
{
    protected $table = 'operadora';
	protected $primaryKey = 'OperadoraID';

	public function celulares()
	{
		return $this->hasMany('App\Celular','OperadoraID');
	}
}
