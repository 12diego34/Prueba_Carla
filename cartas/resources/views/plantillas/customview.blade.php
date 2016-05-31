@extends('plantillas/layaoutCarta')
@section('contenidoCarta')
<div class="container" >

    <div class="row" id="carta">
        
        <?php 
            echo $contenido;
        ?>
        
    </div>
</div>
@endsection