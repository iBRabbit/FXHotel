<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    public function index(){

        $rooms = Room::all();

        return view('reservations/index', [
            'pageTitle' => 'Reservations'
        ])->with('rooms',$rooms);
    }

    public function store(Request $request){

        $request->validate([
            'room_type' => 'required',
            'total_rooms' => 'required|integer',
            'from' => 'required|date',
            'to' => 'required|date',
            'price' => 'required',
            'promo_codes' => 'nullable|exists:promos,promo_code',
            'additional_req' => 'nullable',
            'total_adult' => 'nullable',
            'total_child' => 'nullable'
        ]);

        $promo_code = Promo::where('promo_code', $request->promo_codes)->first();
        $total_price = $request->price * $request->total_rooms;
        $user_id = Auth::id();


        $reservation = Reservation::create([
            'room_id' => $request->room_type,
            'from' => $request->from,
            'to' => $request->to,
            'total_adult' => $request->total_adult,
            'total_children' => $request->total_child,
            'total_room' => $request->total_rooms,
            'total_price' => $total_price,
            'additional' => $request->additional_req,
            'promo_id' => @$promo_code->id,
            'user_id' => $user_id,
            'status' => "Draft"
        ]);


        return redirect('/reservations/checkout/'.$reservation->id);
    }

    public function checkout(Reservation $reservation){
        // dd($reservation);
        return view('reservations/checkout', [
            'pageTitle' => 'Checkout',
            'reservation' => $reservation->load('room','promo')
        ]);
    }

    public function storeCheckout(Reservation $reservation){
        $reservation->update([
            'status' => "Paid",
        ]);
        return redirect('/reservations');
    }

}
