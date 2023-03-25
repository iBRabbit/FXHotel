@extends('layouts.banner_view')

@section('image-url')
    {{ asset('images/register/header-register.jpg') }}
@endsection

@section('image-alt')
    Register Header
@endsection

@section('image-desc')
    Tranquil Luxury is Waiting
@endsection

@section('page-content')
    <div class="register-container-box p-5  mt-5 mb-5" style="background-color: #dee2e6; border:0px solid black; border-radius: 10px">

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="/register" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h5>Your Name</h5>
                        <div class="input-group mb-3"">
    
                            <div class="gender-selector">
                                <select class="form-select" id="prefix_id" name="prefix_id">
                                    @foreach ($prefixes as $prefix)
                                        <option value="{{ $prefix->id }}">{{ $prefix->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <input type="text" class="form-control" name="name">
                        </div>
                        
                    </div>
    
                    <div class="col">
                        <h5>Your Email</h5>
                        <input type="email" class="form-control" name="email">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Your Phone Number</h5>
                        <div class="input-group mb-3">
    
                            <div class="gender-selector">
                                <select class="form-select" id="country" name="country">
                                    @foreach ($countryCodes as $cc)
                                        <option value="{{ $cc['name'] . '#' . $cc['phone_code'] }}">{{ $cc['code'] . ' (' . $cc['phone_code'] . ')' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <input type="number" class="form-control" name="phone">
                        </div>
                        
                    </div>
    
                    <div class="col">
                        <h5>Your ZIP Code</h5>
                        <input type="text" class="form-control" name="postal">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col">
                        <h5>Your Password</h5>
                        <input type="password" class="form-control"  name="password">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-success">Register Now</button>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col d-flex justify-content-center mt-3">
                        <p>Already has an account? <span> <a href="/login">Register Now</a></span></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
