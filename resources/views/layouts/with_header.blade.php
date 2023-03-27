@extends('layouts.main')

@section('content')
    <div class="page-header">
        <h2 style="margin-top: 10vh"> <i>@yield('header')</i> </h2>
    </div>


    @yield('page-content')
@endsection