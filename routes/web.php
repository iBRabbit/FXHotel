<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'pageTitle' => 'Welcome to Fx Hotel'
    ]);
});

Route::redirect('/home', '/');

Route::get('/aboutus', function () {
    return view('aboutus', [
        'pageTitle' => 'About Us'
    ]);
});

Route::get('/facilities', function () {
    return view('facilities', [
        'pageTitle' => 'Our Facilities'
    ]);
});

Route::get('/delicacies', function () {
    return view('delicacies', [
        'pageTitle' => 'Our Delicacies'
    ]);
});

Route::get('/register', [RegisterController::class, 'index']) -> middleware('guest');
Route::post('/register', [RegisterController::class, 'store']) -> middleware('guest');

Route::get('/login', [LoginController::class, 'index'])-> name('login') -> middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']) -> middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']) -> middleware('auth');

// Route::get('/checkout', [ReservationsController::class, 'checkout']) -> middleware('auth');

Route::get('/reservations', [ReservationsController::class, 'index']) -> middleware('auth');
Route::post('/reservations',[ReservationsController::class, 'store']) -> middleware('auth');

Route::get('/reservations/checkout/{reservation}',[ReservationsController::class, 'checkout']) -> middleware('auth');
Route::put('/reservations/checkout/{reservation}',[ReservationsController::class, 'storeCheckout']) -> middleware('auth');


Route::get('/transactions', [TransactionController::class, 'index']) -> middleware('auth');

Route::resource('/rooms', RoomController::class);
