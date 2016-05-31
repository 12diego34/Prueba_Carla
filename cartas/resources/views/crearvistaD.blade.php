<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Crearvistaartas </title>
    <link rel="stylesheet" href="{{ URL::asset('static/css/fonts.css') }}" media="screen" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/styles.css') }}">
    <link href="{{ URL::asset('static/css/2-col-portfolio.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js')}}"></script>
</head>
<body>
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
    <div class="container">
        
        <div class="row">
            <textarea id="areaCreacion"></textarea>    
        </div>
        <br>
        <div class="row">
            <button type="button" class="btn btn-md btn-danger pull-right" id="btnBorrar"> 
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar
            </button>
            <span class="pull-right"> &nbsp;</span>
            <button type="button" class="btn btn-md btn-success pull-right" id="btnCrear">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Crear
            </button>
        </div>
    </div>


    <div class="modal fade" id="modalEnvio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Creacion Plantilla Propia</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
              </div>
              <div class="form-group">
                <label for="message-text" class="control-label">Descripcion:</label>
                <textarea class="form-control" id="descripcion"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnOk">Confirmar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>


    <script src="{{ URL::asset('static/js/tinymce/tinymce.min.js') }}"></script>
    <script>
      tinymce.init({
      selector: '#areaCreacion',
      height: 400,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      content_css: [
        '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
        '//www.tinymce.com/css/codepen.min.css'
      ]
    });
    </script>
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/creacion_carta.js') }}"></script>


</body>
</html>