@extends('layouts.with_header')

@section('page-content')
    <div class="page-content-container mt-4" style="width:50vw">

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

        <div class="form-content">
            @if ($room->roomImages->count())
                <img src="{{ asset('storage/' . $room->roomImages->first()->image) }}"
                class="card-img-top" alt="{{ $room->name . " image" }}" style="width:100%; height:60vh">
            @else
                <img src="{{ asset('images/delicacies/indonesian.jpg') }}" class="card-img-top"
                alt="default picture." style="width:100%; height:60vh">
            @endif
            <form action="/rooms/{{ $room->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mt-4">
                    <div class="col">
                        <label for="">
                            <h5>Enter room name</h5>
                        </label>
                        <input type="text" class="form-control" value="{{ $room->name }}" aria-label="room-name"
                            aria-describedby="basic-addon1" name="name">
                    </div>

                    <div class="col">
                        <label for="">
                            <h5>Enter room description</h5>
                        </label>
                        <textarea class="form-control" aria-label="descrption" aria-describedby="basic-addon1" name="description">{{ $room->description }}</textarea>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="">
                            <h5>Price/night</h5>
                        </label>
                        <input type="text" class="form-control" value="{{ $room->price }}" aria-label="price"
                            aria-describedby="basic-addon1" name = "price">
                    </div>

                    <div class="col">
                        <div class="col">
                            <label for="">
                                <h5>Enter room facilities</h5>
                            </label>
                            <textarea class="form-control" aria-label="facilities" aria-describedby="basic-addon1" name="facilities">{{ $room->facilities }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary mb-3" id="add-img-btn">Add Image</button>
                    </div>
                </div>
                
                {{-- Image input container --}}
                <div class="row" id="img-input-container">
                    <div class="row">
                        
                    </div>
                </div>
                
                <div class="row d-flex justify-content-end p-3">
                    <button type="submit" class="btn btn-success mb-3 " style="width:20%" >Submit</button>
                </div>
                

            </form>
        </div>
    </div>

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>

       // Tambah input field untuk gambar 
        var i = 1; // iterasi untuk id img-preview
        
        $('#add-img-btn').click(function(){ // Ketika tombol add image diklik
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
        $(document).on('click', '#delete-img-btn', function(){
            $(this).parent().parent().remove();
        });
        
        // Image preview
        $(document).on('change', '#input-group-file', function(){
            var reader = new FileReader();
            var img = $(this).parent().parent().find('img'); // Ambil tag image
            var paragraph = $(this).parent().parent().find('p');  // Ambil tag paragraph

            // cek apakah file yang diupload adalah gambar
            if(this.files[0].type != "image/jpeg" && this.files[0].type != "image/png" && this.files[0].type != "image/jpg"){
                alert("File must be an image.");
                $(this).val("");
                return;
            }

            reader.onload = function(e){ // Set attribute saat reader load
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