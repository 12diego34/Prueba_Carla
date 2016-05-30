@extends('app')
@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <div class="list-wrapper2">
        <div class="col-lg-12 col-xs-12">
            @yield('dynamic-content2')
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('static/js/main.js') }}"></script>
@endsection
