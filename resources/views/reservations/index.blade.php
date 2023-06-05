@extends('layouts.banner_view')

@section('image-url')
    {{ asset('images/ect/header-reservation.jpg') }}
@endsection

{{-- @section('image-alt')
    Register Header
@endsection --}}

@php
    
    
@endphp

@section('image-desc')
    Peaceful Slumber is one step closer.
@endsection

@section('page-content')
    <h3><i> Reservation </i></h3>
    <div class="form-content mt-2 mb-5">
        <form action="{{ $isUserHasReservation ? "/reservations/" . $oldReservation->id : "/reservations" }}" method="post" enctype="multipart/form-data">
            @csrf
            
            @if ($isUserHasReservation)
                @method('PUT')
            @endif

            <div class="row mb-4">
                <div class="col">
                    <h5>Room Type</h5>
                    <select class="form-select" name="room_type" id="room_type">
                        <option value="" hidden>Choose your room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" data-price="{{ $room->price }}"
                                @php
                                    if ($isUserHasReservation) {
                                        if ($oldReservation->room_id == $room->id)  echo "selected";
                                        else echo "";
                                    } else {
                                        if (old('room_type', @$reservations->roomID) == $room->id) echo "selected";
                                        else echo "";
                                    }
                                @endphp
                            >  
                            {{ $room->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <h5>Total Rooms</h5>
                        <input type="number" class="form-control" name="total_rooms" aria-label="total-rooms" pattern="\d+" inputmode="numeric" min="0" max="10"
                            value={{ $isUserHasReservation ? $oldReservation->total_room : old('total_rooms', @$reservations->total_room) ?? ""}}
                        >
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Dates</h5>
                    <div class="row">
                        <div class="col">
                            <input placeholder="From" class="form-control" name="from" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" value="{{ $isUserHasReservation ? $oldReservation->from : old('from', @$reservations->from) ?? "" }}">
                        </div>
                        <div class="col">
                            <input placeholder="To" class="form-control" name="to" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" value="{{ $isUserHasReservation ? $oldReservation->to : old('to', @$reservations->to) ?? "" }}">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h5>Total Guest</h5>
                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-center gap-2">
                            <input type="number" class="form-control" name="total_adult" aria-label="total-adult" pattern="\d+" inputmode="numeric" min="0" max="10" value="{{ $isUserHasReservation ? $oldReservation->total_adult : old('total_adult', @$reservations->total_adult) ?? "" }}">
                            <div class="">
                                <h5>Adults</h5>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center gap-2">
                            <input type="number" class="form-control" name="total_child" aria-label="total-child" pattern="\d+" inputmode="numeric" min="0" max="10" value={{ $isUserHasReservation ? $oldReservation->total_children : old('total_child', @$reservations->total_children) ?? "" }}> 
                            <div class="">
                                <h5>Childs<h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Enter Promo Code (Optional)</h5>
                    <input type="text" class="form-control" name = "promo_codes" aria-label="promo-codes"> 
                </div>
                
                <div class="col">
                    <h5>Additional Request</h5>
                    <input type="text" class="form-control" name = "additional" aria-label="additional-req" value="{{ $isUserHasReservation ? $oldReservation->additional : old('additional', @$reservations->total_children) ?? ""}}">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-group">
                        <h5>Price</h5>
                        <input type="text" class="form-control" aria-label="Price"  name = "price"  readonly id="selected_price" placeholder="{{ $isUserHasReservation ? 'Rp' . number_format($oldReservation->room->price) : old('total_price', @$reservations->total_price) ?? "" }}" value="">
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end">
                    <button type="Reserve Now" class="btn btn-success mt-auto" style="width:20%" id="reserve_now_btn">Reserve Now</button>
                </div>
            </div>
        </form>
        
    </div>
    <script>
        let room_type = document.getElementById('room_type');
        let reserve_now_btn = document.getElementById('reserve_now_btn');

        room_type.addEventListener('change', function (e) {
            let selected_price = room_type.options[room_type.selectedIndex].getAttribute('data-price');
            let price = parseInt(selected_price).toLocaleString('id-ID');
            document.getElementById('selected_price').placeholder = `Rp ${price}`;
        });
        
        reserve_now_btn.addEventListener('click', function(e) {
            let selected_price = room_type.options[room_type.selectedIndex].getAttribute('data-price');
            let price = parseInt(selected_price).toLocaleString('id-ID');
            document.getElementById('selected_price').value = selected_price;
        });


    </script>
@endsection
