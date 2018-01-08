@extends('layouts.master')
@section('content')
    <div class="cuerpo">
	    @include('components.perfil.intranetOpciones')
    </div>
@stop

@section("scripts")
    @parent
@stop
