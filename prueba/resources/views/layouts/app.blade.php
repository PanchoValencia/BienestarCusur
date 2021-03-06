<!-- Ventana de principal-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name') }}</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {!!Html::style ('/css/apartments/main.css')!!}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    'use strict';

    $(() => {
        $(document).ready(() =>{
            $('#togController').on('click', () => {
                $('#itemTog').toggle();
            });
        });

        $(document).ready(() =>{
            $('#slpceTogController').on('click', () => {
                $('#slpceItemTog').toggle();
            });
        });
    })();
    </script>

    @yield('complementos')





    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <?php
    # WORKAROUND FOR GETTING CURRENT MODULE ROUTE AND ACTION
    $new = 'Capturar nuevo';
    $index = 'Registros';
    $forward = ' > ';
    //////////////////////////
    $dashboard = 'Inicio ';
    $nurse = 'Enfermería ';
    $medic = 'Médicos ';
    $slpce = 'SLPCE ';
    $nuts = 'Nutriología ';
    $labs = 'Laboratoriales ';
    $reports = 'Reportes ';
    $diag = 'Diagnósticos y tratamientos';
    ///////////////////////////
    $actions = ['/' => $dashboard,
        'nursery' => $dashboard . $forward . $nurse . $forward . $index,
        'nursery/create' => $dashboard . $forward . $nurse . $forward . $new,
        'medics' => $dashboard . $forward . $medic . $forward . $index,
        'medics/create' => $dashboard . $forward . $medic . $forward . $new,


        //*******Edu: agregue esto de prueba****************************
        //--------- Se hizo por pancho -----------
        'medicsExp/create' => $dashboard . $forward . $medic . $forward . $new,
        //**************************************************************

        'slpce' => $dashboard . $forward . $slpce . $forward . $index,
        'slpce/create' => $dashboard . $forward . $slpce . $forward . $new,
        'slpceAL/create' => $dashboard . $forward . $slpce . $forward . $new,
        'slpceEML/create' => $dashboard . $forward . $slpce . $forward . $new,
        'nutriology' => $dashboard . $forward . $nuts . $forward . $index,
        'nutriology/create' => $dashboard . $forward . $nuts . $forward . $new,
        'laboratory' => $dashboard . $forward . $labs . $forward . $index,
        'laboratory/create' => $dashboard . $forward . $labs . $forward . $new,
        'reports' => $dashboard . $forward . $reports . $forward . $index,
        'reports/create' => $dashboard . $forward . $reports . $forward . $new,
        'diagnostic' => $dashboard . $forward . $diag . $forward . $index,
        'diagnostic/create' => $dashboard . $forward . $diag . $forward . $new,
    ]; ?>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/register') }}">Registro</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{-- Array index 0 because is a HasMany relationship and we only need the 0/first role found --}}
                                {{Auth::user()->first_name}} <span
                                        class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Cerrar sesión</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    @include('layouts.sidebar-menu')
                </div>
                <div class="col-md-10">

                    <div class="patient-container">
                        <div class="patient-container_title">
                            <p class="patient-container_title-p">Datos del paciente</p>
                            <span></span>
                        </div>
                        <form action="TopController@show" method="post" class="patient-container_data">

                            <input type="text" id="nombrePaciente" autocomplete="off" title="Nombre completo del paciente"    name="nombre_paciente" 
                            value="<?php if(isset($name) and !empty($name))
                                echo $name;
                            else
                                echo "";
                             ?>" placeholder="Nombre">
                             

                            <input type="text" pattern="[0-9]{9}" id="codigoPaciente" autocomplete="off" title="Ingresa los 9 números del código" name="codigo_paciente"     value="" placeholder="Código">
                            <input type="text" pattern="[0-9]"    autocomplete="off" title="Ingresa el número de expediente"  name="expediente_paciente" value="" placeholder="Número de expediente">

                            <input type="submit" class="patient-container_submit btn btn-default" name="" id="btnQuery" value="Obtener">
                        </form>
                    </div>

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <i class="fa fa-home"></i>
                            {{ $actions[Route::getCurrentRoute()->getPath()] }}
                        </div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>







  @yield('scripts')



</body>



</html>
