<?php

?>

@extends('layouts.master')

@section('content')
<div class="cuerpo">
    <div class="seccion-condiones">
        <div class="titulo-condiciones"> ACERCA DE NOSOTROS</div>
        <div class="item-termino">RESPONSABLE DE LOS DATOS PERSONALES</div>
        <p>
            <b>“EMPRESA PERUANA DE TECNOLOGIA ELECTRONICA E INFORMATICA SA.C.”</b>
            (en adelante “EMPET”) con domicilio en  Jr. Grau Nro 500 Int. G-103
            Centro Histórico – Trujillo - Perú, tiene la convicción de proteger
            la información personal proporcionada por sus usuarios (en adelante
            “Datos Personales”) y es el responsable de su Tratamiento
            (término que se define más adelante) cuando sean recabados a través
            del sitio de Internet <b>www.club365.com.pe</b> (en adelante el “Sitio”),
            medios impresos y/o vía telefónica (en adelante “Otros Medios”).
        </p>
        <div class="item-termino">FINALIDAD DEL TRATAMIENTO.</div>
        <p>
            EMPET podrá solicitar y/o recabar a través del Sitio y Otros Medios,
            Datos Personales de los usuarios para los fines abajo señalados; así
            como para dar cumplimiento con disposiciones legales que así lo requieran,
            o bien, cuando sea solicitado por autoridades competentes (en adelante “Tratamiento”).
            EMPET y/o cualquier tercero que llegue a intervenir en cualquier fase del Tratamiento
            de Datos Personales, guardará confidencialidad respecto de los mismos cuando tengan
            dicho carácter, conforme a las disposiciones legales aplicables en la República del Perú
            (en adelante “Perú”).
            Los Datos Personales que los usuarios proporcionen al momento de su ingreso y/o registro
            al Sitio tienen como finalidad (i) hacer posible que diversos anunciantes promuevan sus
            productos y/o servicios; (ii) así como generar bases de datos que se utilizarán con fines
            comerciales, de publicidad y promoción.
        </p>
        <div class="item-termino">DATOS PERSONALES A RECABAR.</div>
        <p>
            Los Datos Personales que se solicitan del usuario son:<br>
            <br>
            •	Nombres<br>
            •	Correo Electrónico<br>
            •	Fecha de nacimiento<br>
            •	Celular<br>
            •	Ciudad<br>
            •	Dni<br>
            •	Otros.<br>

            <br>

            El usuario no podrá acceder a los servicios para los que se requieren sus Datos Personales
            cuando estos no sean proporcionados, sin embargo sí podrá tener acceso a los demás Servicios
            que no los requieran.
        </p>

    </div>
</div>
@if(Auth::guest())
    @include('components.login')
@endif
@stop