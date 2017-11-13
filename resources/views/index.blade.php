@extends('layouts.master')

@section('content')

    <div class="cuerpo">
        @include('components.slider')
    </div>
@stop

@section('scripts')
    @parent
    <script>

    </script>
    @stack('scripts')
@stop
