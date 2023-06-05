<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;


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

        $start_time = new DateTime($request->from);
        $end_time = new DateTime($request->to);
        $time = date_diff($start_time,$end_time);

        $promo_code = Promo::where('promo_code', $request->promo_codes)->first();
        $total_room = ($request->price * $request->total_rooms);
        // $price_room = floatval($request->price);
        // $total_room_price = intval($request->total_rooms);
        // $to_date = floatval($request->to);
        // $from_date = floatval($request->from);
        // $total_price = ($price_room * $total_room_price) * ($to_date - $from_date);
        $total_price = ($request->price * $request->total_rooms);
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
            'isReserved' => Reservation::where('status', 'Draft')->where('user_id', Auth::user()->id)->exists(),
            'reservation' => $reservation->load('room','promo')
        ]);
    }

    public function storeCheckout(Reservation $reservation){
        $reservation->update([
            'status' => "Paid",
        ]);
        return redirect('/reservations');
    }

    public function cancelCheckout($reservations_id){
        $reservations = Reservation::findOrFail($reservations_id)->delete();
        return redirect('/home');
    }

    public function updateCheckout(Request $request, $reservations_id){

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
        $total_room = $request->price * $request->total_rooms;
        $user_id = Auth::id();

        $reservations = Reservation::findOrFail($reservations_id)->update([
            'room_id' => $request->room_type,
            'from' => $request->from,
            'to' => $request->to,
            'total_adult' => $request->total_adult,
            'total_children' => $request->total_child,
            'total_room' => $request->total_rooms,
            'total_price' => $total_room,
            'additional' => $request->additional_req,
            'promo_id' => @$promo_code->id,
            'user_id' => $user_id,
            'status' => "Draft"
        ]);
        return redirect('/reservations');
    }

    public function update($reservation){
        $reservation = Reservation::find($reservation);
        $reservation->update([
            'status' => "Cancelled"
        ]);
        return redirect('/reservations');
    }

}
