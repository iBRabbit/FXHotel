<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

define('COOKIE_TIME', 60 * 60 * 24 * 30);

class LoginController extends Controller
{
    public function index() {
        App::setlocale(session('lang'));
        return view('login/index', [
            'pageTitle' => 'Login'
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->has('remember') ? true : false;

        if($remember) {
            Cookie::queue('is_remember', true, COOKIE_TIME);
            Cookie::queue('email', $request->email, COOKIE_TIME);
            Cookie::queue('password', $request->password, COOKIE_TIME);
        } else {
            Cookie::queue(Cookie::forget('is_remember'));
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
