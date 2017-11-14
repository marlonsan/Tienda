@extends('layouts.master')

@section('content')

    <div class="cuerpo">
        @include('components.slider')
        @include('components.login')
    </div>
@stop

@section('scripts')
    @parent
    <script>
    </script>
    @stack('scripts')
@stop
