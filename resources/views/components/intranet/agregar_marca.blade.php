@extends('layouts.master')
@section('content')
    <div class="cuerpo">
	    @includeIf('components.perfil.intranetOpciones')
        <div id="cuerpo_datos_personales">
            <div class="seccion-perfil">
                <div class="grupo-perfil" id="grupo_iperfil">
                    <!-- CAMBIAR CONTRASEÑA-->
						<div class="titulo-perfil">AGREGAR MARCA</div>
						<div class="item-datos">
							<span>Marca Nueva</span>
						</div>
						<div class="datos-personales">
							<input type="text" placeholder="Ingrese Marca nueva" id="pass" name="contra-nueva"
							required>
						</div>
                        <div id="btn-pass">Guardar</div>
				</div>

                </div>
                <!-- FIN_SECCION_CONTRASEÑA-->
            </div>
        </div>
        <div id="msj-cambios" style="display: none"> Aqui el mensaje que deseas mostrar</div>
    </div>

    <div id="emergente-editado-correcto-preferencias" class="emergente" style="display: none">
        <div class="emergente-contn">
            <div class="cabeza-emer">
                <span class="close_rpta">x</span>
                <img src="{{ asset('img/club365.png') }}">
            </div>
            <div class="sesion-emer">
                <div class="cuerpo-emer">
                    <p id="respuesta-editado-preferencias"></p>
                </div>
            </div>
        </div>
    </div>

    <div id="emergente-editado-incorrecto-preferencias" class="emergente" style="display: none">
        <div class="emergente-contn">
            <div class="cabeza-emer" id="codigo_existe">
                <span class="close_rpta">x</span>
                <img src="{{ asset('img/club365.png') }}">
            </div>
            <div class="sesion-emer">
                <div class="cuerpo-emer">
                    <p id="respuesta-editado-preferencias-incorrecto"></p>
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('js/jquery.min2.js') }}"></script>
    <script>
        var emergenteActual ="";
		$('#btn-pass').click(function() {
			var msjVacio = 'Campo vacio';
			var msjComp = 'Contraseñas no son iguales';

			var pass = $('#pass').val();
			var passB = $('#passb').val();

			if(pass == '') {
				document.getElementById('igual').style.display = 'block';
				document.getElementById('igual').innerHTML = msjVacio;
                document.getElementById('pass').style.borderColor= "red";
			}
			if(passB == '') {
				document.getElementById('igual').style.display = 'block';
				document.getElementById('igual').innerHTML = msjVacio;
				document.getElementById('igual').required = true;
                document.getElementById('passb').style.borderColor= "red";
			}
			else {
				if(pass == passB) {

                    var datos = {
                        '_token': '{{ csrf_token() }}',
                        'clave': pass,
                        'repetir-clave': passB
                    };

					$.ajax({
						url: '{{ route('intranet.agregar_categoria') }}',
						type: 'post',
						data: datos
					})
                        .done(function (respuesta) {
                            if(respuesta.status==true){
                                document.getElementById("emergente-editado-correcto-preferencias").style.display="block";
                                document.getElementById("respuesta-editado-preferencias").innerHTML="SE REESTABLECIÓ CORRECTAMENTE";
                                document.getElementById('pass').value = null;
                                document.getElementById('passb').value = null;
                                emergenteActual ="emergente-editado-correcto-preferencias";
                            }
                            else{
                                document.getElementById("emergente-editado-incorrecto-preferencias").style.display="block";
                                document.getElementById("respuesta-editado-preferencias-incorrecto").innerHTML="NO SE PUDO REESTABLECER CONTRASEÑA";
                                emergenteActual ="emergente-editado-incorrecto-preferencias";
                            }
                        })
                        .fail(function () {
                            document.getElementById("emergente-editado-incorrecto-preferencias").style.display="block";
                            document.getElementById("respuesta-editado-preferencias-incorrecto").innerHTML="NO SE PUDO REESTABLECER CONTRASEÑA";
                            emergenteActual="emergente-editado-incorrecto-preferencias";
                        });

				}
				else {
					document.getElementById('igual').style.display = 'block';
					document.getElementById('igual').innerHTML = msjComp;
                    document.getElementById('pass').style.borderColor= "red";
                    document.getElementById('passb').style.borderColor= "red";

				}
			}

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
        function SombrearCampo(id,estado){
            if(estado){
                document.getElementById(id).style.borderColor= "purple";
            }
            else{
                document.getElementById(id).style.borderColor= "#BDBDBD";
            }
        }

        function validarTamañoContraseñas(id) {
            var etiqueta = $('#' + id).val();
            if(etiqueta.length<6 && etiqueta.length>=1){
                var rptaPass = $('#igual');
                rptaPass.html('contraseña debe tener más de 6 caracteres');
                document.getElementById('igual').style.display = 'block';
                document.getElementById(id).style.borderColor= "red";
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
                var rptaPass = $('#igual');
                rptaPass.html('contraseñas no son iguales');
                document.getElementById('igual').style.display = 'block';
                document.getElementById('pass').style.borderColor= "red";
                document.getElementById('passb').style.borderColor= "red";
                return false;
            }
            else{
                document.getElementById('igual').style.display = 'none';
            }
        }
	</script>
@stop