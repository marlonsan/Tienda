<div class="seccion-Empresas">
    <div class="grupo-empresas">
        <div class="empresas-titulo">
            <div class="carita">&#9786;</div>
            <p>Anuncian aquí:</p>
        </div>
        <ul>
            <li>
                @foreach($anunciantes as $anunciante)
                    <div class="img-empresa">
                        <img src="{{ asset($anunciante->Imagen) }}">
                    </div>
                @endforeach
            </li>
        </ul>
    </div>
</div>