@extends('app')
@section('content')
<div class="col-lg-10 col-lg-offset-1">
    <div class="list-wrapper">
        <div class="col-lg-12 col-xs-12">
            @yield('dynamic-content')
        </div>
    </div>   
    <footer>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Carla Santos & Diego Carabajal</p>
            </div>
        </div>
    </footer>
</div>
<script type="text/javascript" src="{{ URL::asset('static/js/main.js') }}"></script>
@endsection