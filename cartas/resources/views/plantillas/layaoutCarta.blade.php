@extends('plantillas/layaout')
@section('encabezado')
<meta name="csrf-token" content="{{ csrf_token() }}">
    @parent
    <style type="text/css">

        #editable {
          background: #E6E6E6;
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
<div class="container" >
<div class="row col-lg-offset-1">
    <div class="col-lg-2">
        <h4>Nombre Carta</h4>
    </div>
    <div class="col-lg-6">
        <input class="form-control" type="text" id="nombre_archivo">             
    </div> 
    <div class="col-lg-2">
        <button type="button" class="btn btn-md btn-primary center-block" id="btnGuardar">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar
        </button>
    </div>
    <!-- <div class="col-lg-2">
        <button type="button" class="btn btn-md btn-primary center-block" id="btnEnviar"> 
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Enviar Mail
        </button>
    </div>  -->          
</div>
<br>
@yield('contenidoCarta')
<!-- <div class="row">
        <button type="button" class="btn btn-lg btn-primary" id="btnGuardar">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar
        </button>
        <button type="button" class="btn btn-lg btn-primary" id="btnEnviar"> 
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Enviar Mail
        </button>
    </div>
</div> -->
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
