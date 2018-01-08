<!DOCTYPE html>
<html>
<head>
    <title>Club365</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="{{ asset('img/club365.png') }}"/>
</head>
<body>
<div class="contenedor">
    <div class="cabeza">
        @include('components.mainnav')
    </div>
    <div id="content">
        @yield('content')
    </div>
</div>
@include('components.footer')
<script type="text/javascript" src="{{ asset('js/jquery.min2.js') }}"></script>
@yield('scripts')
</body>
</html>