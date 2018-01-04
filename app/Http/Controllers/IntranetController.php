<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Marca;

class IntranetController extends Controller
{
   public function show_agregar_categoria(){
   		return view('components.intranet.agregar_categoria');
   }

   public function show_agregar_marca(){
   		return view('components.intranet.agregar_marca');
   }

   public function show_agregar_modelo(){
   		return view('components.intranet.agregar_modelo',
		            [
			            'marcas'     => Marca::all(),
		            ]
		);
   }

   public function show_agregar_articulo(){
   		return view('components.intranet.agregar_articulo',
		            [
			            'categorias' => Categoria::all(),
			            'marcas'     => Marca::all(),
		            ]
		);
   }

   public function show_agregar_administrador(){
   		return view('components.intranet.agregar_administrador');
   }
}
