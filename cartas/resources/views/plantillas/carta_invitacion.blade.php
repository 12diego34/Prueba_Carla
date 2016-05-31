@extends('plantillas/layaoutCarta')
@section('contenidoCarta')

    <div class="row" id="carta">
        <p>Estimado <span id="editable"contenteditable="true">NOMBRE, APELLIDO</span>:</p>
        <p style="padding-left: 210px;">Lo invito a pariticipar del evento <span id="editable"contenteditable="true">EVENTO</span> a realizarse el dia <span id="editable"contenteditable="true">DIA-DE-EVENTO</span> en <span id="editable"contenteditable="true">LUGAR-EVENTO</span>. <span id="editable"contenteditable="true">MOTIVO-EVENTO</span></p>
        <p>Coordialmente</p>
        <p><span id="editable"contenteditable="true">REMITENTE</span></p>
    </div>

 @endsection