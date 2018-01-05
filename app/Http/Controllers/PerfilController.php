<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Categoria;
use App\Celular;
use App\Direccion;
use App\Departamento;
use App\DetallePersona;
use App\Distrito;
use App\EstadoCivil;
use App\Genero;
use App\Operadora;
use App\Provincia;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function show_datos_personales()
	{
		$persona = Auth::user()->persona;
		$detalle = $persona->detalle_persona;
		$persona = [
			'nombres'            => $persona->Nombres,
			'apellidos'          => $persona->Apellidos,
			'documentoIdentidad' => $persona->DocumentoIdentidad,
			'genero'             => $detalle->GeneroID,
			'correoElectronico'  => $detalle->CorreoElectronico,
			'fechaNacimiento'    => $detalle->FechaNacimiento,
			'celular'            => $detalle->NumeroCelular,
			'estadoCivil'        => $detalle->EstadoCivilID,
			'operadora'          => $detalle->celular->OperadoraID,
			'distrito'           => $detalle->DistritoID,
			'provincia'          => $detalle->ProvinciaID,
			'departamento'       => $detalle->DepartamentoID,
		];
		return view('components.perfil.datos_personales',
		            [
			            'persona'        => $persona,
			            'generos'        => Genero::all(),
			            'operadoras'     => Operadora::all(),
			            'estadosCiviles' => EstadoCivil::all(),
			            'departamentos'  => Departamento::all(),
			            'provincias'     => Provincia::all(),
			            'distritos'      => Distrito::all(),
			            'ciudades'       => Direccion::all(),
		            ]
		);
	}

	public function show_clave()
	{
		return view('components.perfil.clave');
	}
}
