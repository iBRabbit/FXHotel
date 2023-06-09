<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index() {
        app()->setlocale(session('lang'));
        if(Auth::user()->role == 'Admin'){
            return view('transactions.index',[
                "pageTitle" => "Transactions",
                "transactions" => Transaction::all()
            ]);
        }
        else {
            return view('transactions.index',[
                "pageTitle" => "Transactions",
                "transactions" => Transaction::with('user')->where('user_id', Auth::user()->id)->get()
            ]);    # code...
        }
    }
}
