@extends('layouts.main')

@section('content')
    <div class="transaction-container">
        <h1 class="text-center mt-3 mb-3">{{__('transaction.title')}}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('transaction.uuid')}}</th>
                    @if(Auth::user()->role == 'Admin')
                        <th scope="col">{{__('transaction.user_name')}}</th>
                    @endif
                    <th scope="col">{{__('transaction.date')}}</th>
                    <th scope="col">{{__('transaction.total_room')}}</th>
                    <th scope="col">{{__('transaction.total_adult')}}</th>
                    <th scope="col">{{__('transaction.total_child')}}</th>
                    <th scope="col">{{__('transaction.total_price')}}</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($transactions as $tr)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $tr->uuid }}</td>
                    @if(Auth::user()->role == 'Admin')
                        <td>{{ $tr->user->name }}</td>
                    @endif
                    <td>{{ $tr->created_at }}</td>
                    <td>{{ $tr->total_room }}</td>
                    <td>{{ $tr->total_adult }}</td>
                    <td>{{ $tr->total_children }}</td>
                    <td>Rp. {{ number_format($tr->total_price) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
