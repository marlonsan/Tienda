@extends('layouts.master')
@section('content')
    <div class="cuerpo">
        @includeIf('components.perfil.intranetOpciones')
        <div id="cuerpo_datos_personales">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="seccion-perfil">
                <div class="grupo-perfil" id="grupo_iperfil">
                    <div class="titulo-perfil">AGREGAR MODELO</div>
                    <div class="item-datos">
                        <span>Modelo Nuevo</span>
                        <span>Marca</span>
                    </div>
                    <form method="post" id="formulario">
                        {{ csrf_field() }}
                        <div class="datos-personales">
                            <input type="text" placeholder="Ingrese Modelo" value=""
                                   id="nombres"
                                   name="nombres" 
                                   onKeyUp="this.value = this.value.toUpperCase();"  required>
                            <div class="rpta-seccion" id="rpta-nombres"></div>
                           
                            <select  name="" id="genero" required>
                                <option value="0" id="genero" selected>Selecione Marca</option>
                                 @foreach($marcas as $marca)
                                    <option value="{{ $marca->MarcaID }}" >{{ $marca->Nombre }}</option>
                                @endforeach
                            </select>
                        
                            <div id="btn-pass">Guardar</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="emergente-editado-correcto" class="emergente" style="display: none">
        <div class="emergente-contn">
            <div class="cabeza-emer">
                <span class="close_rpta">x</span>
                <img src="{{ asset('img/club365.png') }}">
            </div>
            <div class="sesion-emer">
                <div class="cuerpo-emer">
                    <p id="respuesta-editado-datos"></p>
                </div>
            </div>
        </div>
    </div>

    <div id="emergente-editado-incorrecto" class="emergente" style="display: none">
        <div class="emergente-contn">
            <div class="cabeza-emer" id="codigo_existe">
                <span class="close_rpta">x</span>
                <img src="{{ asset('img/club365.png') }}">
            </div>
            <div class="sesion-emer">
                <div class="cuerpo-emer">
                    <p id="respuesta-editado-datos-incorrecto"></p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
       


    </script>


    <script>


        function validarFormulario() {

            var hijos = $("#hijos").val();
            var celular = $("#celular").val();
            var departamento = $("#departamento").val();
            var provincia = $("#provincia").val();
            var distrito = $("#distrito").val();
            var pass = $('#pass').val();
            var passb= $('#passb').val();
            var celularV = celular.length;
            var num = document.getElementById('celular').value.charAt(0);

            if (celularV < '9' || celularV > '9' || num != '9') {
                var rptaCelular = $('#rpta_celular');
                rptaCelular.html('Número celular mal definido');
                document.getElementById('rpta-celular').style.display = 'block';
                document.getElementById('rpta-celular').style.color = 'black';
                document.getElementById('rpta-celular').style.background = 'red';
                setTimeout(function () {
                    $("#rpta_celular").fadeOut(1500)
                }, 5000);
                return false;
            }

            if (departamento == null || departamento == "") {
                var rptaDepartamento = $('#rpta_departamento');
                rptaDepartamento.html('Selecione una opcion de la lista');
                document.getElementById('rpta_departamento').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_departamento").fadeOut(1500)
                }, 5000);
                return false;
            }

            if (provincia == null || provincia == "") {
                var rptaProvincia = $('#rpta_provincia');
                rptaProvincia.html('Selecione una opcion de la lista');
                document.getElementById('rpta_provincia').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_provincia").fadeOut(1500)
                }, 5000);
                return false;
            }

            if (distrito == null || distrito == "") {
                var rptaDistrito = $('#rpta_distrito');
                rptaDistrito.html('Selecione una opcion de la lista');
                document.getElementById('rpta_distrito').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_distrito").fadeOut(1500)
                }, 5000);
                return false;
            }
            return true;
        }


    </script>


    <script>
        
    </script>
@stop

