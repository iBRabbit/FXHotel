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
    <div class="form-content mt-2 mb-5">
        <form action="reservation/" method="post" enctype="multipart/form-data">
            <div class="row mb-4">
                <div class="col">
                    <h5>Room Type</h5>
                    <select class="form-select" name="room_type" id="room_type" aria-label="Default select example">
                        <option value="" hidden>Choose your room</option>
                        <option value="deluxe">Deluxe Room</option>
                        <option value="superior">Superior Room</option>
                    </select>
                    {{-- <select class="form-select" name="room_id" id="room_id">
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select> --}}
                </div>

                <div class="col">
                    <div class="form-group">
                        <h5>Total Rooms</h5>
                        <input type="text" class="form-control" aria-label="total-rooms">
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Dates</h5>
                    <div class="row">
                        <div class="col">
                            <input placeholder="From" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                        </div>
                        <div class="col">
                            <input placeholder="To" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h5>Total Guest</h5>
                    <div class="row">
                        <div class="col col-lg-2">
                            <select class="form-select" name="total-adult" id="total-adult" aria-label="Default select example">
                                <option value="" hidden>0</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="col">
                            <h5>Adults</h5>
                        </div>
                        <div class="col col-lg-2">
                            <select class="form-select" name="total-child" id="total-child" aria-label="Default select example">
                                <option value="" hidden>0</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="col">
                            <h5>Childs<h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Enter Promo Code (Optional)</h5>
                    <input type="text" class="form-control" aria-label="promo-codes">
                </div>

                <div class="col">
                    <h5>Additional Request</h5>
                    <input type="text" class="form-control" aria-label="additional-req">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-group">
                        <h5>Price</h5>
                        <input type="text" class="form-control" aria-label="Price">
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end">
                    <button type="Reserve Now" class="btn btn-success mt-auto" style="width:20%" >Reserve Now</button>
                </div>
            </div>

        </form>



    </div>
@endsection
