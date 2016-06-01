<!DOCTYPE html>
<html>
<head>
    @section('encabezado')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para la creación de cartas formales">
    <meta name="author" content="Grupo 2">
    <title>Creador de Cartas</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('static/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- GRID VIEW CSS -->
    <link href="{{ URL::asset('static/css/2-col-portfolio.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ URL::asset('static/css/portada.css') }}" rel="stylesheet">
    @show
    
</head>
<body>
@section('navigation')
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">Creador 2.0</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('mismodelos') }}">Mis Modelos</a>
                </li>
                <li>
                    <a href="{{ URL::to('compartidos')}}">Modelos Compartidos</a>
                </li>
                <li>
                    <a href="{{ URL::to('miscartas')}}">Mis Cartas</a>
                </li>
                <li>
                    <a href="{{ URL::to('creador') }}">Crear Modelo de Carta</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ URL::to('logout') }}">Salir</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
@show
@yield('contenido')

@section('script')
     <!--- Scripts -->    
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js') }}"></script>
@show
</body>
</html>