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
        var emer = $('.emergente');
        function showLogin() {
            if(emer.style.display === "none") {
                emer.style.display = "block";
            }
        }
        $('.grupo-prom').click(function() {
            if(this.hasAttribute('id')) {
                showLogin();
            }
        });
    </script>
    @stack('scripts')
@stop
