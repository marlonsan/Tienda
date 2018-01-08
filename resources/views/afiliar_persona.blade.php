@extends('layouts.master')
@section('content')
    <div class="cuerpo">
        @include('components.login')
        <div class="seccion-perfil" ">
            <form action="{{ route('register') }}" method="post">
                {{ csrf_field() }}
               
                <div class="grupo-perfil" style="margin-left: 300px">
                    <div class="titulo-perfil">DATOS PERSONALES</div>
                    <div class="item-datos">
                        <span>Nombres</span>
                        <span>Apellidos</span>
                        <span>DNI</span>
                        <span>Correo</span>
                        <span>Fecha de Nacimiento</span>
                        <span>Género</span>
                        <span>Número de Celular</span>
                        <span>Operador</span>
                        <span>Estado Civil</span>
                        <span id="procedencia">Procedencia</span>
                    </div>
                    <div class="datos-personales">
                        <input type="text" placeholder="Ingrese Nombres" id="nombre" name="nombres"
                               onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();"
                               onfocus="SombrearCampo('nombre',true); " onblur="SombrearCampo('nombre',false)";
                               required>
                        <div class="rpta-seccion" id="rpta_nombre"></div>
                        <input type="text" placeholder="Ingrese Apellidos" id="apellido" name="apellidos"
                               onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();"
                               onfocus="SombrearCampo('apellido',true); " onblur="SombrearCampo('apellido',false)";
                               required>
                        <div class="rpta-seccion" id="rpta_apellido"></div>
                        <input type="number" placeholder="Ingrese DNI" id="dni" min="1" name="documento-identidad"
                               onfocus="SombrearCampo('dni',true); " onblur="SombrearCampo('dni',false)";
                               required>
                        <div class="rpta-seccion" id="rpta_dni"></div>
                        <input type="email" placeholder="ejemplo@ejemplo.com" id="email"
                               name="correo-electronico"
                               onfocus="SombrearCampo('email',true); " onblur="SombrearCampo('email',false)";
                               required>
                        <div class="rpta-seccion" id="rpta_email"></div>
                        <input type="date" name="fecha-nacimiento" id="nacimiento" max="2000-12-31"
                               onfocus="SombrearCampo('nacimiento',true); " onblur="SombrearCampo('nacimiento',false)";
                               required>
                        <div class="rpta-seccion" id="rpta_nacimiento"></div>
                        <select name="genero" id="genero"
                                onfocus="SombrearCampo('genero',true); " onblur="SombrearCampo('genero',false)";
                                required>
                            <option value="" hidden id="genero">Selecione Género</option>
                            @foreach($generos as $genero)
                                <option value="{{ $genero->GeneroID }}">{{ $genero->Nombre }}</option>
                            @endforeach
                        </select>
                        <div class="rpta-seccion" id="rpta_genero"></div>
                        <input type="number" placeholder="  Ingrese Número Celular" id="celular" min="1" name="celular"
                               onfocus="SombrearCampo('celular',true); " onblur="SombrearCampo('celular',false)";
                               required>
                        <div class="rpta-seccion" id="rpta_celular"></div>

                        <select name="operadora" id="operador"
                                onfocus="SombrearCampo('operador',true); " onblur="SombrearCampo('operador',false)";
                                required>
                            <option value="" hidden>Selecione Operador</option>
                            @foreach($operadoras as $operadora)
                                <option value="{{ $operadora->OperadoraID }}">{{ $operadora->NombreComercial }}</option>
                            @endforeach
                        </select>
                        <div class="rpta-seccion" id="rpta_operador"></div>
                        <div class="rpta-seccion" id="rpta_ocupacion"></div>
                        <select name="estado-civil" id="estado_civil"
                                onfocus="SombrearCampo('estado_civil',true); " onblur="SombrearCampo('estado_civil',false)";
                                required>
                            <option value="" hidden>Selecione Estado Civil</option>
                            @foreach($estadosCiviles as $estadoCivil)
                                <option value="{{ $estadoCivil->EstadoCivilID }}">{{ $estadoCivil->Nombre }}</option>
                            @endforeach
                        </select>
                        <div class="rpta-seccion" id="rpta_estadocivil"></div>

                        <select name="departamento" id="departamento" onchange="getProvincias(this);"
                                onfocus="SombrearCampo('departamento',true); " onblur="SombrearCampo('departamento',false)";
                                required>
                            <option value="0" id="0">Selecione Departamento</option>
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->DepartamentoID }}">{{ $departamento->Nombre }}</option>
                            @endforeach
                        </select>
                        <div class="rpta-seccion" id="rpta_departamento"></div>

                        <select name="provincia" id="provincia" onchange="getDistritos(this);"
                                onfocus="SombrearCampo('provincia',true); " onblur="SombrearCampo('provincia',false)";
                                required>
                            <option value="0" hidden  id="provincia">Seleccione Provincia</option>
                        </select>
                        <div class="rpta-seccion" id="rpta_provincia"></div>

                        <select name="distrito" id="distrito" onchange="getCiudades(this);"
                                onfocus="SombrearCampo('distrito',true); " onblur="SombrearCampo('distrito',false)";
                                required>
                            <option value="0" hidden id="distrito">Seleccione Distrito</option>
                        </select>
                        <div class="rpta-seccion" id="rpta_distrito"></div>

                        <select name="ciudad" id="ciudad"
                                onfocus="SombrearCampo('ciudad',true); " onblur="SombrearCampo('ciudad',false)";
                                required>
                            <option value="0" hidden id="ciudad">Seleccione Ciudad</option>
                        </select>
                        <div class="rpta-seccion" id="rpta_ciudad"></div>
                        <div id="btn-pass" style="width: 150px">Guardar</div>
                    </div>


                </div>
                
            </form>
        </div>
    </div>
    <div class="rpta-seccion" id="msjalert"></div>
@stop
@section('scripts')
    <script>
        $('.btnguardar').click(function () {
            var nombre = $("#nombre").val();
            var apellido = $("#apellido").val();
            var email = $("#email").val();
            var nacimiento = $("#nacimiento").val();
            var dni = $("#dni").val();
            var celular = $("#celular").val();
            var hijos = $("#hijos").val();

            var pass = $('#pass').val();
            var passB = $('#passb').val();

            /*---OPCIONES SELECT----*/
            //var operador = document.getElementById("operador").selectedIndex;
            var genero = $("#genero").val();
            var operador = $("#operador").val();
            var estadoCivil = $("#estado_civil").val();
            var departamento = $("#departamento").val();
            var provincia = $("#provincia").val();
            var distrito = $("#distrito").val();
            var ciudad = $("#ciudad");

            var nombreV = nombre.length;
            var apellidoV = apellido.length;
            var emailV = email.length;
            var nacimientoV = nacimiento.length;
            var dniV = dni.length;
            var celularV = celular.length;
            var passVal = pass.length;
            var passBVal = passB.length;

            var num = document.getElementById('celular').value.charAt(0);

            /*--ESTRUCTURA AJAX----*/

            if (nombreV < '2' || nombreV > '50') {
                var rptaNombre = $('#rpta_nombre');
                rptaNombre.html('nombre mal definido');
                document.getElementById('rpta_nombre').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_nombre").fadeOut(1500)
                }, 5000);
                return false;
            }
            if (apellidoV < '2' || apellidoV > '50') {
                var rptaApellido = $('#rpta_apellido');
                rptaApellido.html('Apellido mal definido');
                document.getElementById('rpta_apellido').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_apellido").fadeOut(1500)
                }, 5000);
                return false;
            }

            if (genero === null || genero == "") {
                var rptaGenero = $('#rpta_genero');
                rptaGenero.html('Selecione una opcion de la lista');
                document.getElementById('rpta_genero').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_genero").fadeOut(1500)
                }, 5000);
                return false;
            }

            if (emailV < '2' || emailV > '50') {
                var rptaEmail = $('#rpta_email');
                rptaEmail.html('Correo mal definido');
                document.getElementById('rpta_email').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_email").fadeOut(1500)
                }, 5000);
                return false;
            }
            if (nacimientoV === '') {
                var rptaNacimiento = $('#rpta_nacimiento');
                rptaNacimiento.html('Ingrese fecha de nacimiento');
                document.getElementById('rpta_nacimiento').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_nacimiento").fadeOut(1500)
                }, 5000);
                return false;
            }
            if (dniV < '8' || dniV > '8') {
                var rptaDni = $('#rpta_dni');
                rptaDni.html('DNI mal definido');
                document.getElementById('rpta_dni').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_dni").fadeOut(1500)
                }, 5000);
                return false;
            }
            if (hijos < 0 || hijos > 20) {
                var rptaHijos = $('#rpta_hijos');
                rptaHijos.html('Número hijos mal definido');
                document.getElementById('rpta_hijos').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_hijos").fadeOut(1500)
                }, 5000);
                return false;
            }

            if (celularV < '9' || celularV > '9' || num != '9') {
                var rptaCelular = $('#rpta_celular');
                rptaCelular.html('Número celular mal definido');
                document.getElementById('rpta_celular').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_celular").fadeOut(1500)
                }, 5000);
                return false;
            }

            if (operador === null || operador == "") {
                var rptaOperador = $('#rpta_operador');
                rptaOperador.html('Selecione una opcion de la lista');
                document.getElementById('rpta_operador').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_operador").fadeOut(1500)
                }, 5000);
                return false;
            }
            if (estadoCivil === null || estadoCivil == "") {
                var rptaEstadoCivil = $('#rpta_estadocivil');
                rptaEstadoCivil.html('Selecione una opcion de la lista');
                document.getElementById('rpta_estadocivil').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_estadocivil").fadeOut(1500)
                }, 5000);
                return false;
            }
            if (departamento === null || departamento == "") {
                var rptaDepartamento = $('#rpta_departamento');
                rptaDepartamento.html('Selecione una opcion de la lista');
                document.getElementById('rpta_departamento').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_departamento").fadeOut(1500)
                }, 5000);
                return false;
            }
            if (provincia === null || provincia == "") {
                var rptaProvincia = $('#rpta_provincia');
                rptaProvincia.html('Selecione una opcion de la lista');
                document.getElementById('rpta_provincia').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_provincia").fadeOut(1500)
                }, 5000);
                return false;
            }
            if (distrito === null || distrito == "") {
                var rptaDistrito = $('#rpta_distrito');
                rptaDistrito.html('Selecione una opcion de la lista');
                document.getElementById('rpta_distrito').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_distrito").fadeOut(1500)
                }, 5000);
                return false;
            }
            if (ciudad === null || ciudad == "") {
                var rptaCiudad = $('#rpta_ciudad');
                rptaCiudad.html('Selecione una opcion de la lista');
                document.getElementById('rpta_ciudad').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_ciudad").fadeOut(1500)
                }, 5000);
                return false;
            }


            /*---CONTRASEÑA-----*/
            //var msj_comp='Las contraseñas son diferentes';

            if (passVal < '6' || passBVal < '6') {
                var rptaPass = $('#igual');
                rptaPass.html('La contraseña debe tener más de 6 caracteres, intentelo otra vez por favor');
                document.getElementById('igual').style.display = 'block';
                setTimeout(function () {
                    $("#igual").fadeOut(1500);
                }, 5000);
                return false;

            }
            if (passVal != passBVal) {
                var rptaPassi = $('#igual2');
                rptaPassi.html('contraseña no son iguales');
                document.getElementById('igual2').style.display = 'block';
                setTimeout(function () {
                    $("#igual2").fadeOut(1500);
                }, 5000);
                return false;
            }

            /*----VALIDAR CHECKBOX------*/
            /*var ok1 = 0;
             var ckbox1 = document.getElementsByName('tienda[]');
             for(var i = 0; i < ckbox1.length; i++) {
             if(ckbox1[i].checked == true) {
             ok1 = 1;
             var checkvalue_1 = [];
             $(":radio").each(function() {
             var ischecked_1 = $(this).is(":checked");
             if(ischecked_1) {
             checkvalue_1 += $(this).val();
             }
             });
             }
             }

             if(ok1 < '1') {
             var rpta_opcion1 = $('#rpta_opcion1');
             rpta_opcion1.html('Selecione por lo menos una opcion');
             document.getElementById('rpta_opcion1').style.display = 'block';
             setTimeout(function() {
             $("#rpta_opcion1").fadeOut(1500)
             }, 5000);
             return false;
             }*/

            var ok2 = 0;
            var ckbox2 = document.getElementsByName('articulos[]');
            for (var i = 0; i < ckbox2.length; i++) {
                if (ckbox2[i].checked == true) {
                    ok2 = 1;
                    var checkValue2 = [];
                    $(":radio").each(function () {
                        var isChecked2 = $(this).is(":checked");
                        if (isChecked2) {
                            checkValue2 += $(this).val();
                        }
                    });
                }
            }

            if (ok2 < '1') {
                var rptaOpcion2 = $('#rpta_opcion2');
                rptaOpcion2.html('Selecione por lo menos una opcion');
                document.getElementById('rpta_opcion2').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_opcion2").fadeOut(1500)
                }, 5000);
                return false;
            }

            var ok3 = 0;
            var ckbox3 = document.getElementsByName('categorias-utiliza[]');
            for (var i = 0; i < ckbox3.length; i++) {
                if (ckbox3[i].checked == true) {
                    ok3 = 1;
                    var checkValue3 = [];
                    $(":radio").each(function () {
                        var isChecked3 = $(this).is(":checked");
                        if (isChecked3) {
                            checkValue3 += $(this).val();
                        }
                    });
                }
            }

            if (ok3 < '1') {
                var rptaOpcion3 = $('#rpta_opcion3');
                rptaOpcion3.html('Selecione por lo menos una opcion');
                document.getElementById('rpta_opcion3').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_opcion3").fadeOut(1500)
                }, 5000);
                return false;
            }

            var ok4 = 0;
            var ckbox4 = document.getElementsByName('categorias-prefiere[]');
            for (var i = 0; i < ckbox4.length; i++) {
                if (ckbox4[i].checked == true) {
                    ok4 = 1;
                    var checkValue4 = [];
                    $(":radio").each(function () {
                        var isChecked4 = $(this).is(":checked");
                        if (isChecked4) {
                            checkValue4 += $(this).val();
                        }
                    });
                }
            }

            if (ok4 < '1') {
                var rptaOpcion4 = $('#rpta_opcion4');
                rptaOpcion4.html('Selecione por lo menos una opcion');
                document.getElementById('rpta_opcion4').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_opcion4").fadeOut(1500)
                }, 5000);
                return false;
            }

            var ok5 = 0;
            var ckbox5 = document.getElementsByName('clasificados[]');
            for (var i = 0; i < ckbox5.length; i++) {
                if (ckbox5[i].checked == true) {
                    ok5 = 1;
                    var checkValue5 = [];
                    $(":radio").each(function () {
                        var isChecked5 = $(this).is(":checked");
                        if (isChecked5) {
                            checkValue5 += $(this).val();
                        }
                    });
                }
            }

            if (ok5 < '1') {
                var rptaOpcion5 = $('#rpta_opcion5');
                rptaOpcion5.html('Selecione por lo menos una opcion');
                document.getElementById('rpta_opcion5').style.display = 'block';
                setTimeout(function () {
                    $("#rpta_opcion5").fadeOut(1500)
                }, 5000);
                return false;
            }

            /*var ok6 = 0;
             var ckbox6 = document.getElementsByName('acepto[]');
             for(var i = 0; i < ckbox6.length; i++) {
             if(ckbox6[i].checked == true) {
             ok6 = 1;
             var checkvalue_6 = [];
             $(":radio").each(function() {
             var ischecked_6 = $(this).is(":checked");
             if(ischecked_6) {
             checkvalue_6 += $(this).val();
             }
             });
             }
             }

             if(ok6 < '1') {
             var rpta_opcion6 = $('#rpta_opcion6');
             rpta_opcion6.html('Selecione por lo menos una opcion');
             document.getElementById('rpta_opcion6').style.display = 'block';
             setTimeout(function() {
             $("#rpta_opcion6").fadeOut(1500)
             }, 5000);
             return false;
             }

             else {

             document.getElementById("msjalert").style.display = 'block';
             $("#msjalert").html('REGISTRO EXITOSO');
             alert('enviando datos...' + nacimiento + genero + 'checkvalue_1' + checkvalue_1 + 'checkvalue_2' + checkvalue_2);

             datos = {"dni": dni, "celular": celular,"nombre":nombre};

             $.ajax({
             url: "#",
             type: "POST",
             data: datos
             })
             .done(function (respuesta) {
             document.getElementById("msjalert").style.display = 'block';
             if (respuesta == '"true"') {
             var pagina = '../controllers/EncuestaController.php?encuesta=' + encuesta + '&coduser=' + user + '&dni=' + dni + '&celular=' + celular;
             location.href = pagina;
             setTimeout("pagina", 5000);
             respuesta = '&checkmark; Se feliz, podemos afiliar<br><br> Cargando página...';

             $("#msjalert").html(respuesta);
             setTimeout(function () {
             $("#msjalert").fadeOut(1500);
             }, 8000);
             }
             else {
             $("#msjalert").html(respuesta);
             setTimeout(function () {
             $("#msjalert").fadeOut(1500);
             }, 8000);
             }
             });

             }*/
        });

    </script>
    <script>

        function SombrearCampo(id,estado){
            if(estado){
                document.getElementById(id).style.borderColor= "purple";
            }
            else{
                document.getElementById(id).style.borderColor= "#BDBDBD";
            }
        }


        function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toString();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
            especiales = [8, 37, 39, 46, 6];

            tecla_especial = false
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
        function getProvincias(select) {
            //alert(select.value);
            $.ajax({
                url: "resources/departamento/"+select.value+"/provincias",
                type: "get"
            })

                .done(function (respuesta) {
                    document.getElementById("msjalert").style.display = 'block';
                    //$("#msjalert").text(respuesta);
                    console.log(respuesta);
                    $('#provincia').empty();
                    $('#provincia').append($('<option>', {
                        value: 0,
                        text: "Seleccione Provincia"
                    }));
                    for (var i = 0; i < respuesta.length; ++i) {
                        $('#provincia').append($('<option>', {
                            value: respuesta[i].ProvinciaID,
                            text: respuesta[i].Nombre
                        }));

                    }
                    if (respuesta.length === 0) {
                        $('#provincia').val(0);
                        $('#distrito').empty();
                        $('#distrito').append($('<option>', {
                            value: 0,
                            text: "Seleccione Distrito"
                        }));
                        $('#ciudad').empty();
                        $('#ciudad').append($('<option>', {
                            value: 0,
                            text: "Seleccione Ciudad"
                        }));
                    }
                });

        }

        function getDistritos(select) {

            //alert(select.value);
            $.ajax({
                url: "resources/provincia/"+select.value+"/distritos",
                type: "get"
            })
                .done(function (respuesta) {
                    document.getElementById("msjalert").style.display = 'block';
                    //$("#msjalert").html(respuesta);
                    console.log(respuesta);
                    $('#distrito').empty();
                    $('#distrito').append($('<option>', {
                        value: 0,
                        text: "Seleccione Distrito"
                    }));
                    for (var i = 0; i < respuesta.length; ++i) {
                        $('#distrito').append($('<option>', {
                            value: respuesta[i].DistritoID,
                            text: respuesta[i].Nombre
                        }));
                    }
                    if (respuesta.length === 0) {
                        $('#distrito').val(0);
                        $('#ciudad').empty();
                        $('#ciudad').append($('<option>', {
                            value: 0,
                            text: "Seleccione Ciudad"
                        }));
                    }
                });
        }

        function getCiudades(select) {

            //alert(select.value);
            $.ajax({
                url: "resources/distrito/"+select.value+"/ciudades",
                type: "get"
            })
                .done(function (respuesta) {
                    document.getElementById("msjalert").style.display = 'block';
                    //$("#msjalert").html(respuesta);
                    console.log(respuesta);
                    $('#ciudad').empty();
                    $('#ciudad').append($('<option>', {
                        value: 0,
                        text: "Seleccione Ciudad"
                    }));
                    for (var i = 0; i < respuesta.length; ++i) {
                        $('#ciudad').append($('<option>', {
                            value: respuesta[i].CiudadID,
                            text: respuesta[i].Nombre
                        }));
                    }
                });
        }

        function validarTamañoContraseñas(id) {
            var etiqueta = $('#' + id).val();
            if(etiqueta.length<6 && etiqueta.length>=1){
                var rptaPassi = $('#igual');
                rptaPassi.html('contraseña debe tener más de 6 caracteres');
                document.getElementById('igual').style.display = 'block';
                document.getElementById(id).style.borderColor= "red";
                setTimeout(function () {
                    $("#igual").fadeOut(1500);
                }, 5000);
                return false;
            }
            else{
                SombrearCampo(id,false);
                document.getElementById('igual').style.display = 'none';
            }
            if($('#passb' ).val().length>=6){
                compararContraseñas();
            }
        }

        function compararContraseñas() {
            SombrearCampo('passb',false);
            var pass = $('#pass').val();
            var passB = $('#passb').val();
            if (pass != passB) {
                var rptaPassi = $('#igual');
                rptaPassi.html('contraseñas no son iguales');
                document.getElementById('igual').style.display = 'block';
                return false;
            }
            else{
                document.getElementById('igual').style.display = 'none';
            }
        }
    </script>
@stop
