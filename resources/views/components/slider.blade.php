<div class="nav-categoria">Categoría / <b>Todos</b> </div>
<div class="nav-slider">
    <div class="flexslider" id="flexslider-main">
        <ul class="slides" id="slider">
            <li>

                @for($i = 0; $i < 12; ++$i)
                    <div class="grupo-prom">
                        <div class="promo-img">
                            <img src="{{ asset('img/slider/disponible.png') }}">
                        </div>
                    </div>
                @endfor



            </li>
        </ul>
    </div>
</div>

@section('scripts')
    @parent
    <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript" charset="utf-8">
        $(window).load(function() {
            $('#flexslider-main').flexslider({
                touch: true,
                autoPlay: false,
                pauseOnAction: false,
                pauseOnHover: false,
                slideshow:false,
                animation:"fade"
            });
        });
    </script>
@stop