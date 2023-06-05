<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Transaction;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class ReservationsController extends Controller
{
    public function index(){

        $rooms = Room::all();
        
        $oldReservation = Reservation::where('user_id', Auth::user()->id)
                                ->where('status',  'Draft')    
                                ->first();
        $isUserHasReservation = $oldReservation != null;

        return view('reservations/index', [
            'pageTitle' => 'Reservations',
            'isUserHasReservation' => $isUserHasReservation,
            'oldReservation' => $oldReservation
        ])->with('rooms',$rooms);
    }

    public function store(Request $request){

        $request->validate([
            'room_type' => 'required',
            'total_rooms' => 'required|integer|min:1|max:100',
            'from' => 'required|date|before:to',
            'to' => 'required|date',
            'price' => 'required|integer',
            'promo_codes' => 'nullable|exists:promos,promo_code',
            'additional_req' => 'nullable',
            'total_adult' => 'nullable|integer|min:1|max:100',
            'total_child' => 'nullable|integer|min:1|max:100'
        ]);
        $start_time = new DateTime($request->from);
        $end_time = new DateTime($request->to);
        $time = date_diff($start_time,$end_time);

        $promo_code = Promo::where('promo_code', $request->promo_codes)->first();
        $total_price = $request->price * $request->total_rooms * $time->format("%a");
        $user_id = Auth::id();

        $reservation = Reservation::create([
            'room_id' => $request->room_type,
            'from' => $request->from,
            'to' => $request->to,
            'total_adult' => $request->total_adult,
            'total_children' => $request->total_child,
            'total_room' => $request->total_rooms,
            'total_price' => $total_price,
            'additional' => $request->additional,
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
            'status' => "Paid"
        ]);
        Transaction::create([
            'uuid' => Uuid::uuid4()->toString(),
            'user_id' => $reservation->user_id,
            'total_room' => $reservation->total_room,
            'total_adult' => $reservation->total_adult,
            'total_children' => $reservation->total_children,
            'total_price' => $reservation->total_price,
        ]);
        return redirect('/transactions');
    }

    public function update($reservation) {

        $request = request();
    
        $reservation = Reservation::find($reservation);

        $time = date_diff(new DateTime($request->from),new DateTime($request->to));

        $total_price = $request->price * $request->total_rooms * $time->format("%a");

        $reservation->update([
            'room_id' => $request->room_type,
            'from' => $request->from,
            'to' => $request->to,
            'total_adult' => $request->total_adult,
            'total_room' => $request->total_rooms,
            'total_children' => $request->total_child,
            'total_price' => $total_price,
            'additional' => $request->additional,
            'promo_id' => $request->promo_id,
            'status' => "Draft"
        ]);

        return redirect('/reservations/checkout/'.$reservation->id)->with('success','Reservation updated successfully');
    }

}
