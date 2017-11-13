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
            <li><a href="{{ route('index') }}" id="activo"><img src=""> INICIO</a></li>
            <li><a href="{{ route('index') }}"><img src="">CATEGORÍAS</a>
                <ul>

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
                <a href="">
                    <img src="">CARRITO
                </a>
            </li>
            <li>
                <input type="text" placeholder="Buscar">
            </li>

            @if(Auth::guest())
                <div class="perfil" id="Btnemer-sesion">
                    <a href="#"><span>&#9786;</span> | INGRESAR</a>
                </div>
            @else
                <li class="perfil"><a href=""><img
                                src="{{ asset('img/icon/perfil.png') }}">{{ Auth::user()->entidad->persona->Nombres }}
                    </a>
                    <ul class="perfil-item">
                        <li><a href=""><img src="{{ asset('img/icon/perfil.png') }}"> Ver
                                Perfil</a></li>
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

