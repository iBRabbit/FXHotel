<?php

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReservationsController;
use Illuminate\Support\Facades\Session;



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
    App::setLocale(session('lang'));
    return view('home', [
        'pageTitle' => 'Welcome to Fx Hotel'
    ]);
});

Route::redirect('/home', '/');

Route::get('/aboutus', function () {
    App::setLocale(session('lang'));
    return view('aboutus', [
        'pageTitle' => 'About Us'
    ]);
});

Route::get('/facilities', function () {
    App::setLocale(session('lang'));
    return view('facilities', [
        'pageTitle' => 'Our Facilities'
    ]);
});

Route::get('/delicacies', function () {
    App::setLocale(session('lang'));
    return view('delicacies', [
        'pageTitle' => 'Our Delicacies'
    ]);
});

Route::get('change-lang', function (Request $request)
{
    $lang = $request->lang;
    App::setLocale($lang);
    Session::put('lang', $lang);

    return redirect()->back();
})->name('change-lang');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/reservations', [ReservationsController::class, 'index'])->middleware('auth');
Route::post('/reservations', [ReservationsController::class, 'store'])->middleware('customer');
route::put('/reservations/{reservation}', [ReservationsController::class, 'update'])->middleware('customer');

Route::delete('/reservations/{reservation}', [ReservationsController::class, 'delete'])->middleware('customer');

Route::get('/reservations/checkout/{reservation}', [ReservationsController::class, 'checkout'])->middleware('auth');
Route::put('/reservations/checkout/{reservation}', [ReservationsController::class, 'storeCheckout'])->middleware('auth');


Route::get('/transactions', [TransactionController::class, 'index'])->middleware('auth');

Route::resource('/rooms', RoomController::class);

Route::get('/rooms/{room}/delete-image/{image}', [RoomController::class, 'deleteImage'])->middleware('auth');