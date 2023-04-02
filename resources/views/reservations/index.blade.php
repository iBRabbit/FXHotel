@extends('layouts.banner_view')

@section('image-url')
    {{ asset('images/ect/header-reservation.jpg') }}
@endsection

{{-- @section('image-alt')
    Register Header
@endsection --}}

@section('image-desc')
    Peaceful Slumber is one step closer.
@endsection

@section('page-content')
    <h3><i> Reservation </i></h3>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="required form-label" for="room_type">Room Type</label>
                    <select class="form-select" name="room_type" id="room_type" aria-label="Default select example">
                        <option value="" hidden>Choose your room</option>
                        <option value="deluxe">Deluxe Room</option>
                        <option value="superior">Superior Room</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="total-rooms">Total Rooms</label>
                    <input type="text" class="form-control" aria-label="total-rooms">
                </div>
            </div>
        </div>
    </div>
@endsection
