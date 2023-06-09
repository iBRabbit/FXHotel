@extends('layouts.main')

<style>
    #home_container {
        position: relative;
    }

</style>

@section('content')
    <div class="container d-flex flex-column" id="home_container">

        <h2 style="margin-top: 10vh"> <i>{{ __('facilities.title') }}</i> </h2>

        <div class="row" style="margin-top: 7vh;">
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset('images/facilities/pool.jpg') }}" class="card-img-top" alt="...">
                    <h5 class="card-title" style="margin-top: 4vh">{{ __('facilities.pools') }}</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset('images/facilities/spa.jpg') }}" class="card-img-top" alt="...">
                    <h5 class="card-title" style="margin-top: 4vh">{{ __('facilities.spa') }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="row" style="margin-top: 7vh;">
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset('images/facilities/restaurant.jpg') }}" class="card-img-top" alt="...">
                    <h5 class="card-title" style="margin-top: 4vh">{{ __('facilities.restaurant') }}</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset('images/facilities/gym.jpg') }}" class="card-img-top" alt="...">
                    <h5 class="card-title" style="margin-top: 4vh">{{ __('facilities.gym') }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>  
    </div>
    <br>
    <br>
@endsection
