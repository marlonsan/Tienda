@extends('layouts.master')
@section('content')
    <div class="cuerpo">
        @includeIf('components.perfil.opciones')
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
                    <div class="titulo-perfil">DATOS PERSONALES</div>
                    <div class="item-datos">
                        <span>Nombres</span>
                        <span>Apellidos</span>
                        <span>Género</span>
                        <span>Correo</span>
                        <span>Fecha de Nacimiento</span>
                        <span>DNI</span>
                        <span>Número de Celular</span>
                        <span>Operador</span>
                        <span>Estado Civil</span>
                        <span id="procedencia">Procedencia</span>
                    </div>
                    <form method="post" id="formulario">
                        {{ csrf_field() }}
                        <div class="datos-personales">
                            <input type="text" placeholder="Ingrese Nombres" value="{{ $persona['nombres'] }}"
                                   readonly="readonly"
                                   id="nombres"
                                   name="nombres" onkeypress="return soloLetras(event);"
                                   onKeyUp="this.value = this.value.toUpperCase();"  required>
                            <div class="rpta-seccion" id="rpta-nombres"></div>

                            <input type="text" placeholder="Ingrese Apellidos" value="{{ $persona['apellidos'] }}"
                                   readonly="readonly"
                                   id="apellidos" name="apellidos" onkeypress="return soloLetras(event);"
                                   onKeyUp="this.value = this.value.toUpperCase();" required>
                            <div class="rpta-seccion" id="rpta-apellido"></div>

                            <select disabled name="" id="genero" required>
                                <option value="0" id="genero">Selecione Género</option>
                                @foreach($generos as $genero)
                                    @if($genero->GeneroID == $persona['genero'])
                                        <option value="{{ $genero->GeneroID }}" selected>{{ $genero->Nombre }}</option>
                                    @else
                                        <option value="{{ $genero->GeneroID }}">{{ $genero->Nombre }}</option>
                                    @endif
                                @endforeach
                            </select>



                             <input type="email" placeholder="Ejemplo: ejemplo@ejemplo.com"
                                   value="{{ $persona['correoElectronico'] }}" id="correo-electronico"
                                   name="correo-electronico"
                                   readonly="readonly"
                                   required>
                            <div class="rpta-seccion" id="rpta-correo-electronico"></div>

                            <input type="date" name="fecha-nacimiento" id="fecha-nacimiento" readonly="readonly"
                                   value="{{ $persona['fechaNacimiento'] }}" max="2000-12-31" required>
                            <div class="rpta-seccion" id="rpta-fecha-nacimiento"></div>

                            <input type="number" id="dni" placeholder="Ingrese DNI"
                                   value="{{ $persona['documentoIdentidad'] }}"
                                   readonly="readonly">
                            <div class="rpta-seccion" id="rpta-genero"></div>

                             <input type="number" placeholder="Ingrese Número Celular"
                                   value="{{ $persona['celular'] }}" id="celular" min="1" name="celular"
                                   readonly="readonly"
                                   required>
                            <div class="rpta-seccion" id="rpta-celular"></div>

                            <select disabled name="operadora" id="operadora" required>
                                <option value="">Selecione operadora</option>
                                @foreach($operadoras as $operadora)
                                    @if($operadora->OperadoraID == $persona['operadora'])
                                        <option value="{{ $operadora->OperadoraID }}"
                                                selected>{{ $operadora->NombreComercial }}</option>
                                    @else
                                        <option value="{{ $operadora->OperadoraID }}">{{ $operadora->NombreComercial }}</option>
                                    @endif

                                @endforeach
                            </select>
                            <div class="rpta-seccion" id="rpta-operador"></div>

                            <select disabled name="estado-civil" id="estado-civil" required>
                                <option value="" hidden>Selecione Estado Civil</option>
                                @foreach($estadosCiviles as $estadoCivil)
                                    @if($estadoCivil->EstadoCivilID == $persona['estadoCivil'])
                                        <option value="{{ $estadoCivil->EstadoCivilID }}"
                                                selected>{{ $estadoCivil->Nombre }}</option>
                                    @else
                                        <option value="{{ $estadoCivil->EstadoCivilID }}">{{ $estadoCivil->Nombre }}</option>
                                    @endif

                                @endforeach
                            </select>
                            <div class="rpta-seccion" id="rpta-estado-civil"></div>

                            <select disabled name="departamento" id="departamento" onchange="getProvincias(this);"
                                    required>
                                <option value="0">Seleccione Departamento</option>
                                @foreach($departamentos as $departamento)
                                    @if($departamento->DepartamentoID == $persona['departamento'])
                                        <option value="{{ $departamento->DepartamentoID }}" selected>
                                            {{  $departamento->Nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $departamento->DepartamentoID }}">
                                            {{ $departamento->Nombre }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="rpta-seccion" id="rpta-departamento"></div>

                            <select disabled name="provincia" id="provincia" onchange="getDistritos(this);"
                                    required>
                                <option value="0">Seleccione Provincia</option>
                                @foreach($provincias as $provincia)
                                    @if($provincia->ProvinciaID == $persona['provincia'])
                                        <option value="{{ $provincia->ProvinciaID }}" selected>
                                            {{  $provincia->Nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $provincia->ProvinciaID }}">
                                            {{ $provincia->Nombre }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="rpta-seccion" id="rpta-provincia"></div>

                            <select disabled name="distrito" id="distrito" onchange="getCiudades(this)" required>
                                @foreach($distritos as $distrito)
                                    @if($distrito->DistritoID == $persona['distrito'])
                                        <option value="{{ $distrito->ProvinciaID }}" selected>
                                            {{  $distrito->Nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $distrito->DistritoID }}">
                                            {{ $distrito->Nombre }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="rpta-seccion" id="rpta-distrito"></div>
                            <div class="btneditar" id="editar"> Editar</div>
                            <div class="btneditar" id="cancelar" style="display: none"> Cancelar</div>
                            <input type="button" class="btnguardar" id="btnguardar-datos" style="display: none"
                                   value="&check; Guardar Cambios">
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
        $(window).load(function () {
            $('#departamento').trigger('change');
        });

       



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
        var emergenteActual="";
        $("#btnguardar-datos").click(function () {
            var datos = {
                '_token': '{{ csrf_token() }}',
                'correo-electronico': $("#correo-electronico").val(),
                'hijos': $("#hijos").val(),
                'celular': $("#celular").val(),
                'operadora': $("#operadora").val(),
                'genero': $("#genero").val(),
                'estado-civil': $("#estado-civil").val(),
                'ocupacion': $("#ocupacion").val(),
                'ciudad': $("#ciudad").val(),
                'distrito': $("#distrito").val(),
                'provincia': $("#provincia").val(),
                'departamento': $("#departamento").val()
            };

            $.ajax({
                type: "POST",
               
                data: datos
            })
                .done(function (respuesta) {
                if (respuesta.status == true) {
                    document.getElementById("emergente-editado-correcto").style.display="block";
                    document.getElementById("respuesta-editado-datos").innerHTML="EDITADO CORRECTAMENTE";
                    emergenteActual="emergente-editado-correcto";
                    bloquearInputsAndButtons();
                    generoActual = $("#genero").val();
                    correoActual=$("#correo-electronico").val();
                    hijosActual=$("#hijos").val();
                    celularActual=$("#celular").val();
                    operadorActual=$("#operadora").val();
                    estadoCivilActual=$("#estado-civil").val();
                    ocupacionActual=$("#ocupacion").val();
                    departamentoActualInicial=$("#departamento").val();
                    provinciaActualInicial=$("#provincia").val();
                    distritoActualInicial=$("#distrito").val();
                    ciudadActualInicial=$("#ciudad").val();
                }
                else {
                    document.getElementById("emergente-editado-incorrecto").style.display="block";
                    document.getElementById("respuesta-editado-datos-incorrecto").innerHTML="NO SE PUDO EDITAR";
                    emergenteActual="emergente-editado-incorrecto";
                }
                })
                .fail(function () {
                    document.getElementById("emergente-editado-incorrecto").style.display="block";
                    document.getElementById("respuesta-editado-datos-incorrecto").innerHTML="NO SE PUDO EDITAR";
                    emergenteActual="emergente-editado-incorrecto";
                });

        });

        $('.close_rpta').click(function() {
            document.getElementById(emergenteActual).style.display="none";

        });

        window.onclick = function(event) {
            if(event.target === document.getElementById(emergenteActual)) {
                document.getElementById(emergenteActual).style.display = "none";
            }
        };

    </script>
    <script>
        function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toString();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
            especiales = [8, 37, 39, 46, 6];

            tecla_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                return false;
            }
        }

    </script>

    <script>

        function generateGetProvinciasURL(departamentoID) {
            return '{{ url('resources/departamento') }}/' + departamentoID + '/provincias';
        }

        function generateGetDistritosURL(departamentoID) {
            return '{{ url('resources/provincia') }}/' + departamentoID + '/distritos';
        }

        function generateGetCiudadesURL(departamentoID) {
            return '{{ url('resources/distrito') }}/' + departamentoID + '/ciudades';
        }

        function getProvincias(select) {
            if (document.getElementById("departamento").disabled == false) {
                $.ajax({
                    url: generateGetProvinciasURL(select.value),
                    type: "GET"
                })
                    .done(function (respuesta) {
                        //document.getElementById("msjalert").style.display = 'block';
                        //$("#msjalert").text(respuesta);
                        console.log(respuesta);
                        var provincia = $('#provincia');
                        provincia.empty();
                        provincia.append($('<option>', {
                            value: 0,
                            text: "Seleccione Provincia"
                        }));
                        for (var i = 0; i < respuesta.length; ++i) {
                            provincia.append($('<option>', {
                                value: respuesta[i].ProvinciaID,
                                text: respuesta[i].Nombre
                            }));

                        }
                        if (respuesta.length === 0) {
                            provincia.val(0);
                            var distrito = $('#distrito');
                            distrito.empty();
                            distrito.append($('<option>', {
                                value: 0,
                                text: "Seleccione Distrito"
                            }));
                            var ciudad = $('#ciudad');
                            ciudad.empty();
                            ciudad.append($('<option>', {
                                value: 0,
                                text: "Seleccione Ciudad"
                            }));
                        }
                    });

            }
        }

        function getDistritos(select) {

            //alert(select.value);
            $.ajax({
                url: generateGetDistritosURL(select.value),
                type: "GET"
            })
                .done(function (respuesta) {
                    //document.getElementById("msjalert").style.display = 'block';
                    //$("#msjalert").html(respuesta);
                    console.log(respuesta);
                    var distrito = $('#distrito');
                    distrito.empty();
                    distrito.append($('<option>', {
                        value: 0,
                        text: "Seleccione Distrito"
                    }));
                    for (var i = 0; i < respuesta.length; ++i) {
                        distrito.append($('<option>', {
                            value: respuesta[i].DistritoID,
                            text: respuesta[i].Nombre
                        }));
                    }
                    if (respuesta.length === 0) {
                        distrito.val(0);
                        var ciudad = $('#ciudad');
                        ciudad.empty();
                        ciudad.append($('<option>', {
                            value: 0,
                            text: "Seleccione Ciudad"
                        }));
                    }
                });
        }

        function getCiudades(select) {

            //alert(select.value);
            $.ajax({
                url: generateGetCiudadesURL(select.value),
                type: "GET"
            })
                .done(function (respuesta) {
                    //document.getElementById("msjalert").style.display = 'block';
                    //$("#msjalert").html(respuesta);
                    console.log(respuesta);
                    var ciudad = $('#ciudad');
                    ciudad.empty();
                    ciudad.append($('<option>', {
                        value: 0,
                        text: "Seleccione Ciudad"
                    }));
                    for (var i = 0; i < respuesta.length; ++i) {
                        ciudad.append($('<option>', {
                            value: respuesta[i].CiudadID,
                            text: respuesta[i].Nombre
                        }));
                    }
                });
        }

        function bloquearInput(id) {
            var etiqueta = $("#" + id);
            if (etiqueta.is('select')) {
                etiqueta.attr('disabled', 'disabled');
            } else {
                etiqueta.attr('readonly', 'readonly');
            }
            etiqueta.css('border-color', '');
        }

        function desbloquearInput(id) {
            var etiqueta = $("#" + id);
            if (etiqueta.is('select')) {
                etiqueta.removeAttr('disabled');
            } else {
                etiqueta.removeAttr('readonly');
            }
            etiqueta.css('border-color', 'purple');
        }

        $("#editar").click(function () {
            desbloquearInput("hijos");
            desbloquearInput("genero");
            desbloquearInput("operadora");
            desbloquearInput("estado-civil");
            desbloquearInput("celular");
            desbloquearInput("correo-electronico");
            desbloquearInput("ocupacion");
            desbloquearInput("departamento");
            desbloquearInput("provincia");
            desbloquearInput("distrito");
            desbloquearInput("ciudad");
            document.getElementById("btnguardar-datos").style.display = 'block';
            document.getElementById("cancelar").style.display = 'block';
            document.getElementById("editar").style.display = 'none';
        });
        $("#cancelar").click(function () {
            cancelarEditadoDatosPersonales();
            bloquearInputsAndButtons();


        });

        function bloquearInputsAndButtons() {
            bloquearInput("hijos");
            bloquearInput("genero");
            bloquearInput("operadora");
            bloquearInput("estado-civil");
            bloquearInput("celular");
            bloquearInput("correo-electronico");
            bloquearInput("ocupacion");
            bloquearInput("departamento");
            bloquearInput("provincia");
            bloquearInput("distrito");
            bloquearInput("ciudad");
            document.getElementById("btnguardar-datos").style.display = 'none';
            document.getElementById("cancelar").style.display = 'none';
            document.getElementById("editar").style.display = 'block';
        }

        function cancelarEditadoDatosPersonales() {
            var email = document.getElementById("correo-electronico");
            email.value = correoActual;
            var hijos = document.getElementById("hijos");
            hijos.value = hijosActual;
            var celular = document.getElementById("celular");
            celular.value =celularActual;


            var generos = document.getElementById('genero');
            for (var i = 0; i < generos.length; i++) {
                var opt = generos[i];
                if (opt.value ==generoActual) {
                    opt.selected = true;
                }
            }

            var operadoras = document.getElementById('operadora');
            for (var i = 0; i < operadoras.length; i++) {
                var opt = operadoras[i];
                if (opt.value == operadorActual) {
                    opt.selected = true;
                }
            }

            var estadosCivil = document.getElementById('estado-civil');
            for (var i = 0; i < estadosCivil.length; i++) {
                var opt = estadosCivil[i];
                if (opt.value == estadoCivilActual) {
                    opt.selected = true;
                }
            }

            var ocupaciones = document.getElementById('ocupacion');
            for (var i = 0; i < ocupaciones.length; i++) {
                var opt = ocupaciones[i];
                if (opt.value == ocupacionActual) {
                    opt.selected = true;
                }
            }

            restaurarDepartamento(restaurarProvincia);
        }


        function restaurarDepartamento(restaurarProvincia) {
            var departamentoActual = document.getElementById('departamento').value;
            if (departamentoActual != departamentoActualInicial) {
                document.getElementById('departamento').value = departamentoActualInicial;
                $.ajax({
                    url: generateGetProvinciasURL(document.getElementById('departamento').value),
                    type: "GET"
                })
                    .done(function (respuesta) {
                        //document.getElementById("msjalert").style.display = 'block';
                        //$("#msjalert").text(respuesta);
                        console.log(respuesta);
                        var provincia = $('#provincia');
                        provincia.empty();
                        provincia.append($('<option>', {
                            value: 0,
                            text: "Seleccione Provincia"
                        }));
                        for (var i = 0; i < respuesta.length; ++i) {
                            provincia.append($('<option>', {
                                value: respuesta[i].ProvinciaID,
                                text: respuesta[i].Nombre
                            }));

                        }
                        if (respuesta.length === 0) {
                            provincia.val(0);
                            var distrito = $('#distrito');
                            distrito.empty();
                            distrito.append($('<option>', {
                                value: 0,
                                text: "Seleccione Distrito"
                            }));
                            var ciudad = $('#ciudad');
                            ciudad.empty();
                            ciudad.append($('<option>', {
                                value: 0,
                                text: "Seleccione Ciudad"
                            }));
                        }
                        restaurarProvincia(restaurarDistrito);
                    });
            }

        }

        function restaurarProvincia(restaurarDistrito) {
            var provinciaActual = document.getElementById('provincia').value;
            if (provinciaActual != provinciaActualInicial) {
                document.getElementById('provincia').value =provinciaActualInicial;
                $.ajax({
                    url: generateGetDistritosURL(document.getElementById('provincia').value),
                    type: "GET"
                })
                    .done(function (respuesta) {
                        //document.getElementById("msjalert").style.display = 'block';
                        //$("#msjalert").html(respuesta);
                        console.log(respuesta);
                        var distrito = $('#distrito');
                        distrito.empty();
                        distrito.append($('<option>', {
                            value: 0,
                            text: "Seleccione Distrito"
                        }));
                        for (var i = 0; i < respuesta.length; ++i) {
                            distrito.append($('<option>', {
                                value: respuesta[i].DistritoID,
                                text: respuesta[i].Nombre
                            }));
                        }
                        if (respuesta.length === 0) {
                            distrito.val(0);
                            var ciudad = $('#ciudad');
                            ciudad.empty();
                            ciudad.append($('<option>', {
                                value: 0,
                                text: "Seleccione Ciudad"
                            }));
                        }
                        restaurarDistrito(restaurarCiudad);
                    });

            }

        }

        function restaurarDistrito(restaurarCiudad) {
            var distritoActual = document.getElementById('distrito').value;
            if (distritoActual != distritoActualInicial) {
                document.getElementById('distrito').value = distritoActualInicial;
                $.ajax({
                    url: generateGetCiudadesURL(document.getElementById('distrito').value),
                    type: "GET"
                })
                    .done(function (respuesta) {
                        //document.getElementById("msjalert").style.display = 'block';
                        //$("#msjalert").html(respuesta);
                        console.log(respuesta);
                        var ciudad = $('#ciudad');
                        ciudad.empty();
                        ciudad.append($('<option>', {
                            value: 0,
                            text: "Seleccione Ciudad"
                        }));
                        for (var i = 0; i < respuesta.length; ++i) {
                            ciudad.append($('<option>', {
                                value: respuesta[i].CiudadID,
                                text: respuesta[i].Nombre
                            }));
                        }
                        restaurarCiudad();
                    });
            }
        }

        function restaurarCiudad() {
            var ciudadActual = document.getElementById('ciudad').value;
            if (ciudadActual != ciudadActualInicial) {
                document.getElementById('ciudad').value = ciudadActualInicial;
            }
        }
    </script>
@stop

