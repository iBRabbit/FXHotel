<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index() {
        return view('transactions.index',[
            "pageTitle" => "Transactions",
            "transactions" => Transaction::where()
            ('user_id', Auth::user()->id)->get()
        ]);
    }
}
