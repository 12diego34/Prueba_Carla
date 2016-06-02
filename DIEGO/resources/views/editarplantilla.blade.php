@extends('app')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Editar Plantilla </title>
    <link rel="stylesheet" href="{{ URL::asset('static/css/fonts.css') }}" media="screen" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/styles.css') }}">
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js')}}"></script>    
    <script src="{{ URL::asset('static/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/guardar_plantilla.js') }}"></script>
</head>
@section('vista')
<meta name="csrf-token" content="{{ csrf_token() }}">
    @parent
    <style type="text/css">
        #editable {
          background-color: red;
          border-radius: 2px;
          outline: none;
          border: 2px solid transparent;

        }
        #editable:focus{
            background-color: #FFF;
            border-color: #69c773;
        }
        #contenido{
            display: block;
            width: 100%;
            
            padding: 10px 15px;
            font-size: 15px;
            line-height: 1.42857143;
            color: #2c3e50;
            background-color: #ffffff;
            
            border: 1px solid #dce4ec;
            border-radius: 4px;
          -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
          box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
          -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
          -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            border-radius: 2px;
            
            padding: 20px;
            
        }
    </style>

    <div class="lateral">
    <div class="list-group panel">  
       <ul class="nav navbar-nav">
        <br>
        <a onClick="alert('Plantilla guardada')" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu" id="save">Guardar</a> 
      </ul>       
    </div>
  </div>
  <div class="container2">
    <div class="cabecera">
        <form>
        <br>
            <div class="form-group">
                <label for="recipient-name" class="control-label"><p style="color:orange;">Nombre</p></label>
                <input class="form-control" type="text" id="nombre_archivo">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label"><p style="color:orange;">Contenido</p></label>
               @yield('contenidoCarta')
            </div>
        <form> 
    </div> 
</div>
@endsection