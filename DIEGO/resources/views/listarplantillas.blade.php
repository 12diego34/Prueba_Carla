@extends('app')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Listado de plantillas </title>
    <link rel="stylesheet" href="{{ URL::asset('static/css/fonts.css') }}" media="screen" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/styles.css') }}">
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js')}}"></script>
</head>
    
@section('vista')
    <div class="container2">
        <div class="cabecera">
            <h2><p style="color:orange;"> Plantillas</p></h2>
            <div class="cabecera2">
                <table  class="table table-striped table-bordered table-condensed">
                   <thead>
                        <tr>
                            <th style="text-align:center;" width="4%"> ID </th>       
                            <th style="text-align:center;" width="25%"> Fecha</th>
                            <th style="text-align:center;" width="10%"> Nombre </th>       
                            <th> Descripcion </th>    
                        </tr>
                    </thead>
                    @foreach ($modelos as $modelo)
                    <?php
                        echo "<tr>";
                        echo "<td>".$modelo->id."</td>";
                        echo "<td>".$modelo->created_at."</td>";
                        echo "<td>".$modelo->nombre."</td>";
                        echo "<td>".$modelo->descripcion."</td>";
                        echo "</tr>";
                    ?>
                    @endforeach
                </table>
            </div>
        </div>          
    </div>
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/mismodelos.js') }}"></script>
@endsection