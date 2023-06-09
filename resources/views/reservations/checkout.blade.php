@extends('layouts.banner_view')

@section('image-url')
    {{ asset('images/login/header-aboutus-login-checkout.jpg') }}
@endsection

{{-- @section('image-alt')
    Register Header
@endsection --}}

@section('image-desc')
    {{__('checkout.imageDesc')}}
@endsection

@section('page-content')
    <h3><i> {{__('checkout.title')}} </i></h3>
    <div class="mt-5 mb-5">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row mb-4">
            <div class="col">
                <h5>{{__('checkout.room_type')}}</h5>
            </div>
            <div class="col">
                <h5>{{ $reservation->room->name }}</h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>{{__('checkout.total_rooms')}}</h5>
            </div>
            <div class="col">
                <h5>{{ $reservation->total_room }}</h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>{{__('checkout.dates')}}</h5>
            </div>
            <div class="col">
                <h5>{{ date_format(date_create($reservation->from), 'M d, Y') }} -
                    {{ date_format(date_create($reservation->to), 'M d, Y') }}</h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>{{__('checkout.totalGuest')}}</h5>
            </div>
            <div class="col">
                <h5>{{ $reservation->total_adult }} {{__('checkout.total_adult')}} {{ $reservation->total_children }} {{__('checkout.total_child')}}</h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>{{__('checkout.promo_codes')}}</h5>
            </div>
            <div class="col">
                <h5>{{ $reservation->promo->promo_code ?? '-' }}</h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>{{__('checkout.additional')}}</h5>
            </div>
            <div class="col">
                <h5>{{ $reservation->additional }}</h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>{{__('checkout.totalPrice')}}</h5>
            </div>
            <div class="col">
                <h5>Rp {{ number_format($reservation->total_price) }}</h5>
            </div>
        </div>

        <div class="row mb-4 mt-5 d-flex">
            <div class="col mr-auto p-3">
                <form action="/reservations" method="get">
                    @csrf
                        <button type="submit" class="btn btn-primary mb-3" style="width:20%">{{__('checkout.back_btn')}}</button>
                </form>
            </div>
            <div class="col">
                <div class="row justify-content-end p-3">
                    <div class="col justify-content-around p-3">
                        <form action="/reservations/{{ $reservation->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="Cancel" class="btn btn-danger mb-3" style="width:40%">{{__('checkout.cancel_btn')}}</button>
                        </form>
                    </div>
                    <div class="col justify-content-around p-3">
                        <form action="/reservations/checkout/{{ $reservation->id }}" method="POST">
                            @csrf
                            @method('put')
                            <button type="Submit" class="btn btn-success mb-3" style="width:40%">{{__('checkout.checkout_btn')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
