@extends('layouts.banner_view')

@section('image-url')
    {{ asset('images/login/header-aboutus-login-checkout.jpg') }}
@endsection

{{-- @section('image-alt')
    Register Header
@endsection --}}

@section('image-desc')
    Peaceful Slumber is one step closer.
@endsection

@section('page-content')
    <h3><i> Detail Reservation </i></h3>
    <div class="mt-5 mb-5">
        <form action="/reservations/checkout/{{ $reservation->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <h5>Room Type</h5>
                </div>
                <div class="col">
                    <h5>{{ $reservation->room->name }}</h5>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Number of Room</h5>
                </div>
                <div class="col">
                    <h5>{{ $reservation->total_room }}</h5>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Date</h5>
                </div>
                <div class="col">
                    <h5>{{ date_format(date_create($reservation->from), 'M d, Y') }} -
                        {{ date_format(date_create($reservation->to), 'M d, Y') }}</h5>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Number of Guest(s)</h5>
                </div>
                <div class="col">
                    <h5>{{ $reservation->total_adult }} Adults(s) {{ $reservation->total_children }} Children(s)</h5>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Promo Code (Optional)</h5>
                </div>
                <div class="col">
                    <h5>{{ $reservation->promo->promo_code ?? "-" }}</h5>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Additional Request</h5>
                </div>
                <div class="col">
                    <h5>{{ $reservation->additional }}</h5>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <h5>Total Price</h5>
                </div>
                <div class="col">
                    <h5>{{ $reservation->total_price }}</h5>
                </div>
            </div>

            <div class="row mb-4 mt-5 d-flex">
                <div class="col mr-auto p-3">
                    <button type="Back" class="btn btn-primary mb-3" style="width:20%">Back</button>
                </div>
                <div class="col">
                    <div class="row justify-content-end p-3">
                        <div class="col justify-content-around p-3">
                            <form action="/reservations/checkout/{{$reservation->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="Cancel" class="btn btn-danger mb-3" style="width:40%">Cancel</button>
                            </form>
                        </div>
                        <div class="col justify-content-around p-3">
                            <form action="/reservations/checkout/{{$reservation->id}}" method="POST">
                                @csrf
                                @method('put')
                                <button type="Submit" class="btn btn-success mb-3" style="width:40%">Check Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
