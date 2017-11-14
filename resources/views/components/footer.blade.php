<div class="pie">
    <footer>
        <div class="categorias-pie">
            <div class="titulo-footer">Navegación</div>
                @if(Auth::guest())
                    <li><a href="{{route('perfil')}}">&check; | Ingresar</a></li>
                @else
                    <li><a href="{{ route('index') }}">&check; | Inicio</a></li>
                    <li><a href="">&check; | Perfil</a></li>
                    <li><a href="{{ route('logout') }} "
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>X</b>
                            Salir</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
        </div>
        <div class="categorias-pie">
            <div class="titulo-footer">Entérate</div>
	        <li><a href="{{route('condiciones')}}">&check; | Condiciones</a></li>
            <li><a href="{{route('nosotros')}}">&check; | Acerca  de Nosotros</a></li>
        </div>
        <div class="categorias-pie">
            <div class="titulo-footer">Una Aplicación de</div>
            <img src="{{ asset('img/empet.png') }}">
            <li><a href="http://inf.unitru.edu.pe/" id="web">Empresa SAC</a></li>
        </div>
    </footer>
</div>