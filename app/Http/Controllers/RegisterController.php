<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register/index', [
            'pageTitle' => 'Register',
            'countryCodes' => $this->fetchCountryCodeFromJSON()
        ]);
    }

    public function store(Request $request) {
        
        $data = request()->validate([
            'prefix_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'country_id' => 'required',
            'phone' => 'required|numeric',
            'postal' => 'required|numeric',
            'password' => 'required|min:8'
        ]);
        // dd($data);   
        $data['role'] = 'Customer';
        $data['password'] = Hash::make($data['password']);

        User::create($data);
        
        return redirect('/login') -> with('success', 'Registration successful!');
    }

    // Ambil data country code dari JSON (Online)
    public function fetchCountryCodeFromJSON() {
        $url = "http://country.io/phone.json";
        $response = file_get_contents($url);
        $countryCodes = json_decode($response, true);
        
        foreach($countryCodes as $cc) {

            if($cc == "" || $cc == "null" || strpos($cc, '+') !== false)
                continue;

            $data[] = [
                'code' => $cc,
                'name' => array_keys($countryCodes, $cc)[0]
            ];
        }

        // sort by country name
        usort($data, function($a, $b) {
            return $a['name'] <=> $b['name'];
        });

        return $data;
    }
}
