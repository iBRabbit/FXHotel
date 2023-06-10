@extends('layouts.main')

<style>
    #home_container {
        position: relative;
    }

</style>

@section('content')
    <div class="container d-flex flex-column" id="home_container">

        <h2 style="margin-top: 10vh"> <i>{{ __('delicacies.title') }}</i> </h2>


        <div class="row" style="margin-top: 7vh;">
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset('images/delicacies/indonesian.jpg') }}" class="card-img-top" alt="...">
                    <h5 class="card-title" style="margin-top: 4vh">{{ __('delicacies.indonesian') }}</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset('images/delicacies/western.jpg') }}" class="card-img-top" alt="...">
                    <h5 class="card-title" style="margin-top: 4vh">{{ __('delicacies.western') }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 7vh;">
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset('images/delicacies/chinese.jpg') }}" class="card-img-top" alt="...">
                    <h5 class="card-title" style="margin-top: 4vh">{{ __('delicacies.chinese') }}</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset('images/delicacies/japan.jpg') }}" class="card-img-top" alt="...">
                    <h5 class="card-title" style="margin-top: 4vh">{{ __('delicacies.japan') }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <br>
    <br>
@endsection
