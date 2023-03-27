@extends('layouts.with_header')

@section('header')
    New Room
@endsection

@section('page-content')
    <div class="page-content-container mt-4">
        <form action="" method="POST" enctype="multipart/form-data" class="n"
            style="width:100%">
            <div class="container m-0 p-0 d-flex flex-row justify-content-between">
                <div class="left-form d-flex flex-column">
                    <h5>Room Name</h5>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>

                <div class="right-form">
                    <h5>Room Description</h5>
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>

                </div>
            </div>
        </form>
    </div>
@endsection
