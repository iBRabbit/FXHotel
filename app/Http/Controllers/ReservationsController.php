<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index(){

        $rooms = Room::all();
        
        return view('reservations/index', [
            'pageTitle' => 'Reservations'
        ])->with('rooms',$rooms);
    }

    public function checkout(){
        return view('reservations/checkout', [
            'pageTitle' => 'Checkout'
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'room_type' => 'required',
            'total_rooms' => 'required|integer',
            'from' => 'required|date',
            'to' => 'required|date',
            'price' => 'required|integer',
            'promo_codes' => 'nullable',
            'additional_req' => 'nullable',
            'total_adult' => 'nullable',
            'total_children' => 'nullable'
        ]);

        Reservation::create([
            'room_id' => $request->room_type,
            'from' => $request->from,
            'to' => $request->to,
            'total_adult' => $request->total_adult,
            'total_children' => $request->total_children,
            'total_room' => $request->total_rooms,
            'total_price' => $request->total_price,
            'additional' => $request->additional_req
        ]);
    }
}
