<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index(){
        return view('reservations/index', [
            'pageTitle' => 'Reservations'
        ]);
    }
}
