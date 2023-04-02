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
        <div class="row mb-4">
            <div class="col">
                <h5>Room Type</h5>
            </div>
            <div class="col">

            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>Number of Room</h5>
            </div>
            <div class="col">

            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>Date</h5>
            </div>
            <div class="col">

            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>Number of Guest(s)</h5>
            </div>
            <div class="col">

            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>Promo Code (Optional)</h5>
            </div>
            <div class="col">

            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>Addictional Request</h5>
            </div>
            <div class="col">

            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>Total Price</h5>
            </div>
            <div class="col">

        </div>

        <div class="row mb-4 mt-5 d-flex">
            <div class="col mr-auto p-3">
                <button type="Back" class="btn btn-primary mb-3" style="width:20%" >Back</button>
            </div>
            <div class="col">
                <div class="row justify-content-end p-3">
                    <div class="col justify-content-around p-3">
                        <button type="Cancel" class="btn btn-danger mb-3" style="width:40%" >Cancel</button>
                    </div>
                    <div class="col justify-content-around p-3">
                        <button type="Check Out" class="btn btn-success mb-3" style="width:40%" >Check Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
