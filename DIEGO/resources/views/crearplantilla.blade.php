@extends('app')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Crear plantilla </title>
    <link rel="stylesheet" href="{{ URL::asset('static/css/fonts.css') }}" media="screen" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/styles.css') }}">
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js')}}"></script>
</head>
@section('vista')
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
          <label for="recipient-name" class="control-label"><p style="color:orange;"> Nombre</p></label>
            <input type="text" class="form-control" id="nombre">
        </div>
        <div class="form-group">
          <label for="message-text" class="control-label"><p style="color:orange;"> Descripcion </p></label>
            <textarea class="form-control" id="descripcion"></textarea>
        </div>
      </form>
      <br>
      <textarea id="areaCreacion"></textarea>    
    </div>      
  </div>
    
  <script src="{{ URL::asset('static/js/tinymce/tinymce.min.js') }}"></script>
  <script>
      tinymce.init({
      selector: '#areaCreacion',
      height: 250,
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
    <script src="{{ URL::asset('static/js/guardar_plantilla.js') }}"></script>
@endsection