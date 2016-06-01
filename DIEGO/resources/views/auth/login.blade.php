<!-- resources/views/auth/login.blade.php -->
@extends('index')
@section('dynamic-content')
    
        <h2 class="text-center custom-header">Inicia sesión para acceder a tus cartas</h2>
        <hr>
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
                    <!-- if there are creation errors, they will show here -->
            @include('errors.errors')

        <form method="POST" action="login">
            {!! csrf_field() !!}
            <div class="form-group">
                {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                {!! Form::email('email', old('email'), array('placeholder'=>'', 'class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Contraseña:', ['class' => 'control-label']) !!}
                {!! Form::password('password', array('placeholder'=>'', 'class'=>'form-control' ) ) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Iniciar sesión', ['class' => 'btn btn-default lead btn-full-width']) !!}                
            </div>
        </form>
    </div>
@endsection