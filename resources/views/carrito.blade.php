@extends('layouts.master')
@section('content')
<div class="cuerpo">
   <h1>carrito</h1>
</div>
@if(Auth::guest())
    @include('components.login')
@endif
@stop
