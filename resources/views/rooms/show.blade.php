@extends('layouts.with_header')

@section('page-content')
    <div class="page-content-container mt-4">

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="room_image d-flex justify-content-center">
            @if ($room->roomImages->count())
                <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($room->roomImages as $key=>$img)
                                <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $img->image) }}" class="card-img-top"
                                    alt="{{ $room->name . ' image' }}" style="width:100%; height:60vh">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{__('roomShow.prev')}}</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{__('roomShow.next')}}</span>
                        </button>
                    </div>
            @else
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/room/suite.jpg') }}" class="card-img-top"
                                alt="default picture." style="width:100%; height:60vh">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('roomShow.prev')}}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('romShow.next')}}</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="mt-3 mb-5">
            <h1><i> {{ $room->name }} </i></h1>
            <h3> Rp. {{ number_format($room->price) }}{{__('roomShow.night')}}</h3>
        </div>
        <div class="mt-5 mb-5">
            <div class="row mb-4">
                <div class="col">
                    <h5>{{__('roomShow.description')}}</h5>
                    <p>{{ $room->description }}</p>
                </div>
                <div class="col">
                    <h5>{{__('roomShow.facilities')}}</h5>
                    <p>{{ $room->facilities }}</p>
                </div>
            </div>
        </div>
        @if (!Auth::check() || !Auth::user()->isAdmin())
            <div class="form-content">
                <form action="/rooms/{{ $room->id }}" method="post" enctype="multipart/form-data">
                    <div class="row d-flex justify-content-end p-3">
                        @csrf
                        <a class="btn btn-primary" href="/reservations" style="color:white; width:9vw">{{__('roomShow.reserve-btn')}}</a>
                        {{-- <button type="submit" class="btn btn-primary mb-3 " style="width:20%" >Reserve Room</button> --}}
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
