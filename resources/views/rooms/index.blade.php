@extends('layouts.main')

@section('content')
    <div class="content-container" style="position: relative;">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="search-box d-flex flex-row width">
            <h2 style="margin-top: 10vh"> <i>List of Rooms</i> </h2>
        </div>

        <div class="option-box d-flex flex-row">
            <form class="d-flex mt-2" role="search" style="width:25vw">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') ? request('search') : ""}}">
                <button class="btn btn-outline-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></button>
            </form>

            @can('admin')
                <a href="/rooms/create" class="btn btn-success mt-2 ms-3">
                    Add Room
                </a>
            @endcan
        </div>

        @foreach ($rooms->chunk(2) as $chunk)
            <div class="row" style="margin-block: 7vh;">
                @foreach ($chunk as $room)
                    <div class="col-sm-6">
                        <div class="card text-center">
                            <div class="card-body">
                                @if ($room->roomImages->count())
                                    <img src="{{ asset('storage/' . $room->roomImages->first()->image) }}"
                                        class="card-img-top" alt="{{ $room->name . ' image' }}"
                                        style="width:100%; height:60vh">
                                @else
                                    <img src="{{ asset('images/delicacies/indonesian.jpg') }}" class="card-img-top"
                                        alt="default picture." style="width:100%; height:60vh">
                                @endif

                                <h4 class="card-title" style="margin-block: 4vh">{{ $room->name }}</h4>

                                @if (!Auth::check() || !Auth::user()->isAdmin())
                                    <a href="/rooms/{{ $room->id }}" class="btn btn-primary" style="width:7vw">View</a>
                                @else
                                    <div class="admin-button d-flex flex-row justify-content-center">

                                        <a href="/rooms/{{ $room->id }}/edit" class="btn btn-primary me-3">
                                            Update
                                        </a>
                                        
                                        <form action="/rooms/{{ $room->id }}" method="post" class="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach


    </div>
@endsection
