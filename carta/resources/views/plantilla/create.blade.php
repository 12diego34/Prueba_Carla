<!-- app/views/plantilla/create.blade.php -->
@extends('base')
<title> Crear Plantilla </title>
@section('dynamic-content2')
<div class="col-lg-10 col-lg-offset-1">
    <h3 class="text-center custom-header">Crear Plantilla</h3>
    <hr>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    @include('common.errors')
    {{ Form::open(array('url' => 'plantilla/', 'id' => 'form-plantilla'))  }}
    {!! csrf_field() !!}
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cuerpo', 'Cuerpo:', ['class' => 'control-label']) !!}
            {!! Form::textarea('cuerpo', null, ['class' => 'form-control', 'id' => 'editor']) !!}
        </div>
        {!! Form::hidden('thumbnail', null) !!}
        {!! Form::hidden('placeholders', null) !!}

        <!-- Guardar Plantilla -->
        {{ Form::button('<span class="glyphicon glyphicon-floppy-disk"></span> <span class="hidden-xs"><b>Guardar</b></span> ', array(
            'type' => 'submit',
            'class'=> 'btn btn-md pull-right btn-success',
            'id' => 'btn-guardar')
            )
        }}
        </form>
</div>
<!--script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script-->
<script type="text/javascript" src="{{ URL::asset('static/js/ckeditor/ckeditor.js') }}"></script>
<script>

CKEDITOR.replace( 'editor' );
CKEDITOR.instances.editor.on('change', function(e) {
    crear_placeholders();
});
</script>
@endsection