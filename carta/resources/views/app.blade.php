<!-- resources/views/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title> Cartas </title>
        <link rel="stylesheet" href="{{ URL::asset('static/css/fonts.css') }}" media="screen" charset="utf-8">
        <link rel="stylesheet" href="{{ URL::asset('static/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('static/css/styles.css') }}">
        <script src="{{ URL::asset('static/js/jquery-1.12.3.min.js') }}"></script>
        <script src="{{ URL::asset('static/js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('static/js/html2canvas.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('static/js/plantillas.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('static/js/editor.js')}}"></script>
    </head>

    <body>
        <section class="container-fluid">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    
                    <div class="navbar-header">    
                        <a class="navbar-brand" href='/index'><span class="glyphicon glyphicon-home"></span> Home</a>
                    </div>    
                    @if (Auth::guest())
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('register')}}"><span class="glyphicon glyphicon-user"></span>  Sign Up</a></li>
                        <li><a href="{{ url('login')}}"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
                    </ul>
                    @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a><strong><p style="color:orange;">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p></strong></a></li>
                        <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-trash"></span> Chau!</a></li>
                    </ul>
                    @endif                             
                </div>
            </nav>
        </section>    
        @if (!Auth::guest())
        <section class="list-group panel">
            
                <ul class="nav navbar-nav">
                    <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Plantillas</a>
                    <div class="collapse" id="demo3">
                        <a href="{{ URL::to('plantilla/create') }}" class="list-group-item" data-parent="#SubMenu1">Crear <i class="fa fa-caret-down"></i></a>
                        <a href="{{ URL::to('listar_plantillas') }}" class="list-group-item" data-parent="#SubMenu1">Listar <i class="fa fa-caret-down"></i></a>                             
                    </div>

                    <a href="#demo2" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Cartas</a>
                    <div class="collapse" id="demo2">
                        <a href="{{ URL::to('carta/create')}}" class="list-group-item" data-parent="#SubMenu2">Crear <i class="fa fa-caret-down"></i></a>
                        <a href="{{ URL::to('carta')}}" class="list-group-item" data-parent="#SubMenu2">Listar <i class="fa fa-caret-down"></i></a>
                        <a href="{{ URL::to('carta/publicas') }}" class="list-group-item" data-parent="#SubMenu2">Publicas <i class="fa fa-caret-down"></i></a>                  
                    </div>
                </ul>          
            
            @endif
        </section>  
        @yield('vista')      
        <section id="content">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </section>
    </body>
</html>