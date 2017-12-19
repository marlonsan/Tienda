<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('perfil');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, $categoria = null)
    {
         $categoria_nombre = $categoria;
        if($categoria != null)
        {
            $cat = Categoria::where('Nombre', $categoria)->select('CategoriaID')->first();
            if($cat != null)
            {
                $categoria = $cat->CategoriaID;
            }
            else
            {
                $categoria = null;
            }
        }
        
        $input = $request->only(['beneficio']);

        if(Auth::check())
        {
            return view('principal')
                ->with('categoria',title_case($categoria_nombre));

        }
        else
        {
            return view('index')
                ->with('categoria',title_case($categoria_nombre));
        }

       /*
            return view('index')
                ->with('categorias', Categoria::all());*/
        
        
    }

    public function condiciones()
    {
        return view('condiciones');
    }

    public function nosotros()
    {
        return view('nosotros');
    }

    public function perfil()
    {
        return view('perfil');
    }
}
