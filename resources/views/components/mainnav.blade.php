<?php
/**
 * Created by PhpStorm.
 * User: EMPET
 * Date: 04/07/2017
 * Time: 08:09 AM
 */
?>
<div class="logo"><a href="{{route('index')}}"><img src="{{ asset('img/club365.png') }}"></a>
</div>
<div class="menu">
    <nav>
        <ul>
            <li><a href="{{ route('index') }}" id="activo"><img src="{{ asset('img/icon/home.png') }}">INICIO</a></li>
            <li><a href="{{ route('index', ['categoria' => null]) }}"><img src="{{ asset('img/icon/categoria.png') }}">CATEGORÍAS v </a>
                <ul>
                    @foreach($categorias as $categoria)
                        <li>
                            <a href="{{ route('index', ['categoria' => strtolower($categoria->Nombre)]) }}">
                                <img src="{{ asset($categoria->Imagen) }}"
                                             alt=""> {{ $categoria->Nombre }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{route('condiciones')}}">
                    <img src="{{ asset('img/icon/check.png') }}" >CONDICIONES
                </a>
            </li>
            <li>
                <a href="{{route('nosotros')}}">
                    <img src="{{ asset('img/icon/check.png') }}">NOSOTROS
                </a>
            </li>
            <li>
                <a href="{{'carrito'}}">
                    <img src="{{ asset('img/icon/check.png') }}">CARRITO
                </a>
            </li>


            @if(Auth::guest())
                <div class="perfil" id="emergente-login">
                    <a href="#"><span>&#9786;</span>INGRESAR</a>
                </div>
            @else
                <li class="perfil"><a href=""><img
                                src="{{ asset('img/icon/perfil.png') }}">{{ Auth::user()->name }}
                    </a>
                    <ul class="perfil-item">
                        <li><a href="{{route('perfil')}}"><img src="{{ asset('img/icon/perfil.png') }}"> Ver
                                Perfil</a></li>
                        @if(Auth::user()->rol->RolID === 1 )
                        <li><a href="{{route('intranet')}}"><img src="{{ asset('img/icon/perfil.png') }}"> Intranet</a></li>
                        @endif
                        <li><a href="{{ route('logout') }} "
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>X</b>
                                Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
</div>

