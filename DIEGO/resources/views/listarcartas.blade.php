@extends('app')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Listado de cartas </title>
    <link rel="stylesheet" href="{{ URL::asset('static/css/fonts.css') }}" media="screen" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/styles.css') }}">
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js')}}"></script>
</head>
    
@section('vista')
    <div class="container2">
        <div class="cabecera">
            <h2><p style="color:orange;"> Cartas </p></h2>
            <div class="cabecera2">
                <table  class="table table-striped table-bordered table-condensed">
                   <thead>
                        <tr>
                            <th style="text-align:center;" width="4%"> ID </th>       
                            <th style="text-align:center;" width="25%"> Fecha</th>
                            <th style="text-align:center;" width="10%"> Nombre </th>       
                            <th style="text-align:center;" width="10%"> Opciones </th>       
                        </tr>
                    </thead>
                        <td>@foreach ($cartas as $carta)
                                {{ $carta->nombre }} {{$carta->usuario}}
                            </td>
                            <td class="hidden-xs">{{  $carta->id  }}</td>                    
                            <td class="pull-right">
                                <a class="btn btn-primary btn-sm " href="{{ URL::to('carta/' . $carta->id . '/public' ) }}" title="Ver la carta"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                <a class="btn btn-sm btn-primary" href="{{ URL::to('carta/' . $carta->id . '/get_public_pdf') }}" id="btn-pdf" title="Descargar pdf"><span class="glyphicon glyphicon-save"></span></a>
                            </td>
                        
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
    <script src="{{ URL::asset('static/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/cartas.js') }}"></script>
@endsection


       