<?php

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

