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
    
    p {
        font-size: 20pt; 
        text-align:center
    }

</style>

@section('content')
    <div class="container d-flex flex-column" id="home_container">

        <div class="container d-flex justify-content-center mt-5" id="home_main_banner">
            <img src="{{ asset('images/aboutus/hospitality.jpg') }}" class="img-fluid " style="height:60vh" >
                <div class="home_main_rectangle"></div>    
                <div class="home_main_banner_text">
                    <h1 class="text-center text-white" style="text-shadow: 2px 2px #636363; ">Hospitality is our passion.</h1>
                </div>
        </div>
        <br>
        <p style=""><i>Fx Lalala Hotels group is a fine hotelier that is very passionate to give every customer the hotel experience of their dreams. Established in 1876, our experience to serve customers from different backgrounds and ages is our strength.</i>
        </p>
        <br>
        <p>Our passion for providing top-notch service and attention to detail is a valuable asset, as it shows a commitment to creating a welcoming and comfortable environment for guests to relax and enjoy their stay. This dedication is especially important in the hospitality industry, where guests expect high-quality service and personalized attention.</p>
        <br>
        <p>Overall, Fx Lalala Hotels group's longevity in the industry and their focus on customer satisfaction make them a strong choice for anyone seeking a high-quality hotel experience.</p>
        <br>
    </div>
@endsection
