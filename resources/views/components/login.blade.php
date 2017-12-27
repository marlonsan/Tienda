<div id="emergente" class="emergente" style="{{ session('showLogin') ? 'display: block' : 'display: none' }}">
    <div class="emergente-contn">
        <div class="cabeza-emer">
            <span class="close">&times;</span>
            <img src="{{ asset('img/club365.png') }}">
        </div>
        <div class="sesion-emer">
            <div class="cuerpo-emer">
                <p>INGRESAR</p>
                <form id="loginForm" action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div id="emailGroup" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" placeholder="Ingrese correo electrónico" name="email" value="{{ old('email') }}" required autofocus>
                        <span class="help-block">
                            <strong id="emailErr">{{ $errors->first('email') }}</strong>
                        </span>
                    </div>
                    <div id="passwordGroup" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" placeholder="Ingrese contraseña" class="form-control" name="password" required>

                        <span class="help-block">
                                        <strong id="passwordErr">{{ $errors->first('password') }}</strong>
                                    </span>
                    </div>
                    <input type="hidden" id="cod-prom-sesion01">
                    <input type="hidden" id="url-location">
                    <input type="submit" id="btn-sesionE" value="Iniciar Sesión">
                </form>

            </div>
            <div class="pie-emr">
                <form action="#" method="post">
                    <a href="#" style="color: blueviolet" onMouseover="this.style.color='blue'" onMouseout="this.style.color='blueviolet'">¿olvidaste tu contraseña?</a>
                    <a href="{{ route('register') }}" style="color: blueviolet" onMouseover="this.style.color='blue'" onMouseout="this.style.color='blueviolet'">Registrarme</a>
                    <input type="hidden" id="cod-prom-afi01">
                    <!--input type="submit" id="afiliar-emer" value="Quiero afiliarme"-->
                </form>

            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent


    <script>
        //var URLactual = window.location;
        var urlLocation=document.getElementById("url-location");
        var emer = document.getElementById('emergente');
        var btn = document.getElementById("emergente-login");
        var span = document.getElementsByClassName("close")[0];
        var form = $("#loginForm");
        var email =$("#email");
        var password=$("#password");
        btn.onclick = showLogin;
        span.onclick = function() {
            emer.style.display = "none";
            email.val("");
            password.val("");
            $('#emailErr').text("");
            $('#passwordErr').text("");

        };
        window.onclick = function(event) {
            if(event.target === emer) {
                emer.style.display = "none";
                email.val("");
                password.val("");
                $('#emailErr').text("");
                $('#passwordErr').text("");
            }
        };
        function showLogin()
        {
            if(emer.style.display === "none")
            {
                emer.style.display = "block";
	            urlLocation.value = "{{ Route::currentRouteName() }}";
            }
        }
        
        form.submit(function(e) {
            e.preventDefault();
            $('#DocumentoIdentidadGroup').removeClass('has-error');
            $('#passwordGroup').removeClass('has-error');
            var formData = form.serialize();
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                success: function(data) {
                    //console.log(data);
	                window.location.reload();
                    //window.location.replace(data.intented);
                },
                error: function(xhr, status, err) {
                    console.log(xhr.responseText);
                    var res = JSON.parse(xhr.responseText);
                    if(res.email)
                    {
                        $('#emailGroup').addClass('has-error');
                        $('#emailErr').text(res.email);
                    }
                    if(res.password)
                    {
                        $('#passwordGroup').addClass('has-error');
                        $('#passwordErr').text(res.password);
                    }
                }
            });
        });

    </script>
@stop