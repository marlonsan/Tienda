<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        return view('index');
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
