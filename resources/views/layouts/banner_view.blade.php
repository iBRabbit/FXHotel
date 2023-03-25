@extends('layouts.main')

<style>
    .page-banner-container {
        position: relative;
        margin:0;
        padding:0;
        margin-block: 2rem;
    }

    .page-banner-container img {
        width: 100%;
        height: 40%;
        object-fit: cover;
    }

    .page-main-rectangle {
        position: absolute;
        top:87.5%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 25%;
        background-color: black;
        opacity: 0.5;
    }

    .page-banner-text {
        position: absolute;
        top: 87%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 50px;
        font-weight: bold;
    }
</style>

@section('content')
    {{-- Pas pake layout ini jangan lupa buat kirim: image-url, image-alt, sama image-desc --}}

    {{-- Banner --}}
    <div class="page-banner-container">
        <img src="@yield('image-url')" alt="@yield('image-alt')" >
        <div class="page-main-rectangle"></div>
        <div class="page-banner-text">@yield('image-desc')</div>
    </div>

    @yield('page-content')

@endsection