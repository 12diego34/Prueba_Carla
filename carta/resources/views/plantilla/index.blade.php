<!-- app/views/plantilla/index.blade.php -->
@extends('base')
<title> Listado Plantillas </title>
@section('dynamic-content2')
    @if (count($plantillas) > 0)
        <h3 class="text-center custom-header">Plantillas Actuales</h3>
        <hr>
        <div class="btn-group btn-group-mostrar">
            <button id="btn-tabla" class="btn btn-default btn-sm" title="ver tabla"><span class="glyphicon glyphicon-th-list"></span></button>
            <button id="btn-listado" class="btn btn-default btn-sm" title="ver listado"><span class="glyphicon glyphicon-th"></span></button>
        </div>
        @include('plantilla.tabla', ['plantillas' => $plantillas])
        @include('plantilla.listado', ['plantillas' => $plantillas])
    @else
        <strong>No existen plantillas.</strong>
    @endif
    @include('modals')
@endsection