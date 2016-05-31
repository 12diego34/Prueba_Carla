<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Cartas </title>
    <link rel="stylesheet" href="{{ URL::asset('static/css/fonts.css') }}" media="screen" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/styles.css') }}">
    <link href="{{ URL::asset('static/css/2-col-portfolio.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js')}}"></script>
</head>
<body>
	<!-- Navigation -->
    <section class="container-fluid">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">    
                        <a class="navbar-brand" href='/'><span class="glyphicon glyphicon-home"></span> Home</a>
                    </div>    
                    @if (Auth::guest())
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('register') }}"><span class="glyphicon glyphicon-user"></span>  Sign Up</a></li>
                        <li><a href="{{ url('/login')}}"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
                    </ul>
                    @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a><strong><p style="color:orange;">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p></strong></a></li>
                        <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-trash"></span> Chau!</a></li>
                    </ul>
                    @endif                             
                </div>
            </nav>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <nav class="collapse navbar-collapse">
                @if (!Auth::guest())
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav-style" data-toggle="dropdown" role="button" aria-expanded="false">Plantillas <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('plantilla') }}">Listado</a></li>
                        <li><a href="{{ URL::to('/creador') }}">Crear</a></li>
                    </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle nav-style" data-toggle="dropdown" role="button" aria-expanded="false">Cartas <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('miscartas') }}">Mis cartas</a></li>
                        <!--<li><a href="{{ URL::to('carta/create') }}">Crear</a></li>-->
                        <li><a href="{{ URL::to('crear_carta') }}">Crear</a></li>
                         <!--<a href="{{ URL::to('creador') }}">Crear Modelo de Carta</a>-->
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('carta/publicas') }}">Cartas públicas</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
            </nav>
        </section>
    
    <div class="container" >

            <div class="row">
                <h1> Listado de Cartas</h1>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Nombre </th>       
                            <th> Fecha Creación </th>
                            <th>  </th>
                        </tr>
                        </thead>

                        @foreach ($cartas as $carta)
                        <?php
                            echo "<tr>";
                            echo "<td>".$carta->nombrearchivo.".pdf</td>";
                            echo "<td>".$carta->created_at."</td>";
                            echo '<td> 
                                    <a href="descargar/'.$carta->id.'" class="btn btn-sm btn-primary">
                                        <span class="glyphicon glyphicon-save"></span> Descargar
                                    </a>
                                    <a id='.$carta->id.' class="btn btn-sm btn-warning">
                                        <span class="glyphicon glyphicon-envelope"></span> Enviar
                                    </a>
                                </td>';
                            echo "</tr>";
                        ?>
                        </div>
                        @endforeach
                    </table>
                </div>
            </div>          
    </div>
    

       <!--Modal-->
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <p></p>
          </div>
        </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal -->
    <div class="modal fade" id="mails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title"> Destinatario</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-lg">
                              <span class="input-group-addon" id="sizing-addon1">@</span>
                              <input id="destinatario" type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button id="btnEnviarModal" class="btn btn-success pull-right"> Enviar</button> 
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--- Scripts -->    
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/miscartas.js') }}"></script>
</body>
</html>