@extends('layouts.master')
@section('content')
    <div class="cuerpo">
        @include('components.slider')
        <div class="titulo">Tu motivo de felicidad</div>
    </div>
@stop

@section('scripts')
    @parent
    <script>
        /*
        var emer = $('.emergente');
        function showLogin() {
            if(emer.style.display === "none") {
                emer.style.display = "block";
            }
        }
        $('.grupo-prom').click(function() {
            if(this.hasAttribute('id')) {
                var id = $(this).attr('id');
                $('#beneficioID').val(id);
                showLogin();
            }
        });*/
    </script>
    @stack('scripts')
@stop
