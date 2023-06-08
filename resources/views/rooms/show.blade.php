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
            <h3> Rp. {{ $room->price }}{{__('roomShow.night')}}</h3>
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

        {{-- JQuery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            // Tambah input field untuk gambar
            var i = 1; // iterasi untuk id img-preview

            $('#add-img-btn').click(function() { // Ketika tombol add image diklik
                $('#img-input-container').append(`
            <div class="row">
                    <div class="input-group mb-3 ">
                        <input type="file" class="form-control" id="input-group-file" name="images[]">
                        <button type="button" class="btn btn-danger " id="delete-img-btn">X</button>
                    </div>
                    <div class = "d-flex justify-content-center flex-column">
                        <p class = "d-none">Image Preview</p>
                        <img src="" alt="" id="img-preview${i}" class = "d-flex justify-content-center">
                    </div>
            </div>
            `);
                i++;
            });

            // Delete image input field
            $(document).on('click', '#delete-img-btn', function() {
                $(this).parent().parent().remove();
            });

            // Image preview
            $(document).on('change', '#input-group-file', function() {
                var reader = new FileReader();
                var img = $(this).parent().parent().find('img'); // Ambil tag image
                var paragraph = $(this).parent().parent().find('p'); // Ambil tag paragraph

                // cek apakah file yang diupload adalah gambar
                if (this.files[0].type != "image/jpeg" && this.files[0].type != "image/png" && this.files[0].type !=
                    "image/jpg") {
                    alert("File must be an image.");
                    $(this).val("");
                    return;
                }

                reader.onload = function(e) { // Set attribute saat reader load
                    img.attr('src', e.target.result);
                    img.attr('class', "mb-3 img-thumbnail")
                    img.attr('style', "width: 30vw; border-radius: 10px; margin: 0 auto; padding: 0;")
                    img.attr('alt', "Image preview")
                    paragraph.attr('class', "fw-bold text-center")
                }

                reader.readAsDataURL(this.files[0]); // Image dibaca sebagai data url
            });
        </script>
    @endsection
