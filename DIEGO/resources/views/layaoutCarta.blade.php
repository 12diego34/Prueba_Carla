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
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/guardar_plantilla.js') }}"></script>
</head>
@section('encabezado')
<meta name="csrf-token" content="{{ csrf_token() }}">
    @parent
    <style type="text/css">

        #editable {
          background: red;
          border-radius: 2px;
          /*box-shadow: 0 1px 5px rgba(0,0,0,0.15) inset;*/
          outline: none;
          border: 2px solid transparent;

        }

        #editable:focus{
            background-color: #FFF;
            border-color: #69c773;
        }

        #carta{
            border-radius: 25px;
            border: 5px solid #0B0B61;
            padding: 20px;
            box-shadow: 10px 10px 10px #888888;
        }
    </style>
@endsection
@section('script')
  @parent
  <script src="{{ URL::asset('static/js/procesamiento_carta.js') }}"></script>
@endsection
@section('navigation')
    @parent
@endsection
<div class="lateral">
    <div class="list-group panel">  
       <ul class="nav navbar-nav">
        <br>
        <a onClick="alert('No guarda')" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu" id="save">Guardar</a> 
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