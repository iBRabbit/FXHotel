@extends('layouts.main')

@section('content')
    <div class="transaction-container">
        <h1 class="text-center mt-3 mb-3">Transactions</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">UUID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total Room</th>
                    <th scope="col">Total Adult</th>
                    <th scope="col">Total Children</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($transactions as $tr)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $tr->uuid }}</td>
                    <td>{{ $tr->created_at }}</td>
                    <td>{{ $tr->total_room }}</td>
                    <td>{{ $tr->total_adult }}</td>
                    <td>{{ $tr->total_children }}</td>
                    <td>{{ $tr->total_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
