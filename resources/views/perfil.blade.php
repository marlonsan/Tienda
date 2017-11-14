@extends('layouts.master')
@section('content')
    <div class="cuerpo">
	    @include('components.perfil.opciones')
    </div>
@stop

@section("scripts")
    @parent
@stop
