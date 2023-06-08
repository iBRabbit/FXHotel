@extends('layouts.main')

<style>
    #home_container {
        position: relative;
    }

    #home_main_banner {
        position: relative;
        margin:0;
        padding:0;
    }

    #home_main_banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .home_main_rectangle {
        position: absolute;
        top:87.5%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 25%;
        background-color: black;
        opacity: 0.5;
    }

    .home_main_banner_text {
        position: absolute;
        top: 90%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 50px;
        font-weight: bold;
    }

    #home_specialities_banner {
        position: relative;
        margin:0;
        padding:0;
        width: 100%;
    }

    .home_specialities_rectangle{
        position: absolute;
        top:80%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 40%;
        background-color: black;
        opacity: 0.5;
    }

    .home_specialities_banner_text {
        position: absolute;
        top: 85%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 50px;
        font-weight: bold;
    }

</style>

@section('content')
    <div class="container d-flex flex-column" id="home_container">

        <div class="container d-flex justify-content-center mt-5" id="home_main_banner">
            <img src="{{ asset('images/home/header-home.jpg') }}" class="img-fluid " >
                <div class="home_main_rectangle"></div>
                <div class="home_main_banner_text">
                    <h1 class="text-center text-white" style="text-shadow: 2px 2px #636363; ">{{ __('home.banner_text') }}</h1>
                </div>
        </div>


        <div class="container d-flex justify-content-between mt-5 mb-5" style="width: 100%">

            <a class="card mb-3 me-5" style="text-decoration:none" href="/facilities" >
                <div class="row g-0">
                    <div class="col-md-8">
                        <img src="{{asset('images/home/card-home-ourfacilities.jpg') }}" class="img-fluid rounded-start" alt="..." style="max-width: 400px">
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center" style="background-color: #72AAFF">
                            <h1 class="text-end text-white ps-3 pe-3" style="text-shadow: 2px 2px #636363; ">{{__('home.specialities')}}</h1>
                    </div>
                </div>

            </a>

            <a class="card mb-3" style="text-decoration:none" href="/delicacies">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center" style="background-color: #72AAFF">
                        <h1 class="text text-white ps-3 pe-3" style="text-shadow: 2px 2px #636363;">{{ __('home.delicacy') }}</h1>
                    </div>
                    <div class="col-md-8">
                        <img src="{{asset('images/home/card-home-ourdelicacies.jpg') }}" class="img-fluid rounded-start" alt="..." style="max-width: 400px">
                    </div>
                </div>
            </a>
        </div>

        <div class="container mb-5" id="home_specialities_banner">
            <img src="{{ asset('images/home/card-home-ourspecialities.jpg') }}" class="img-fluid"  style="width:100%;  height:30vh">
        </div>

    </div>
@endsection
