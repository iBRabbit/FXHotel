<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Transaction;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class ReservationsController extends Controller
{

    public function computePrice(Room $room, $total_rooms, $from, $to, Promo $promo = null){
        $start_time = new DateTime($from);
        $end_time = new DateTime($to);
        $time = date_diff($start_time,$end_time);

        $price = ($room->price * $total_rooms * $time->format("%a"));
        $total_price = $price - ($price * ($promo ? $promo->discount_percentage : 0) / 100);
        return $total_price;
    }

    public function index(){
        
        if(Auth::user()->role == 'Admin')
            return redirect('/');

        App::setLocale(session('lang'));
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
        
        $promo = Promo::where('promo_code', $request->promo_codes)->first();

        $total_price = $this->computePrice(Room::find($request->room_type), $request->total_rooms, $request->from, $request->to, $promo);

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
            'promo_id' => $promo ? $promo->id : null,
            'user_id' => $user_id,
            'status' => "Draft"
        ]);


        return redirect('/reservations/checkout/'.$reservation->id);
    }

    public function checkout(Reservation $reservation){
        // dd($reservation);
        App::setLocale(session('lang'));
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
        
        $promo = Promo::where('promo_code', $request->promo_codes)->first();
        
        $total_price = $this->computePrice(Room::find($request->room_type), $request->total_rooms, $request->from, $request->to, $promo);

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

    public function delete($reservation) {
        $reservation = Reservation::find($reservation);
        $reservation->delete();
        return redirect('/reservations')->with('success','Reservation deleted successfully');
    }

}
