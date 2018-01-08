<div class="grupo_opciones_perfil">
	<div class="titulo_item_perfil">Opciones de tu perfil</div>
	<div class="item_perfil">
		<a href="{{ route('perfil.show_datos_personales') }}">
			<img src="{{ asset('img/icon_perfil/user.png') }}">
			<p>Datos Personales</p>
		</a>
	</div>

    <div class="item_perfil">
				<a href="{{ route('perfil.show_clave') }}">
					<img src="{{ asset('img/icon_perfil/contraseña.png') }}">
					<p>Reestablecer contraseña</p>
				</a>
			</div>
	
</div>