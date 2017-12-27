<div class="grupo_opciones_perfil">
	<div class="titulo_item_perfil">Opciones de tu perfil</div>
	<div class="item_perfil">
		<a href="">
			<img src="{{ asset('img/icon_perfil/user.png') }}">
			<p>Datos Personales</p>
		</a>
	</div>
	@if(Auth::user()->rol->RolID === 2 )
            <div class="item_perfil">
				<a href="">
					<img src="{{ asset('img/icon_perfil/promociones.png') }}">
					<p>Productos Comprados</p>
				</a>
			</div> 
	@else
			<div class="item_perfil">
				<a href="">
					<img src="{{ asset('img/icon_perfil/promociones.png') }}">
					<p>Estadísticas de la Web</p>
				</a>
			</div> 
    @endif
	<div class="item_perfil">
		<a href="">
			<img src="{{ asset('img/icon_perfil/contraseña.png') }}">
			<p>Reestablecer contraseña</p>
		</a>
	</div>
</div>