<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
	protected $primaryKey = 'RolID';

	public function Users()
	{
		return $this->hasMany('App\User', 'RolID');
	}
}
