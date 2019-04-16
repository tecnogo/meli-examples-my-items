@extends ('layout')

@section ('content')
    <a href="{{ url('logout') }}" class="ch-btn ch-btn-large" style="position: absolute; top: 15px; right: 15px">
        Salir
    </a>
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            @include('navigation')
            @include('table')
        </div>
    </div>
@endsection
