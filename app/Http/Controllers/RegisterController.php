<?php

namespace App\Http\Controllers;

use App\Models\Prefix;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        App::setLocale(Cookie::get('lang'));
        return view('register/index', [
            'pageTitle' => 'Register',
            'countryCodes' => $this->fetchCountryCodeFromJSON(),
            'prefixes' => Prefix::all()
            
        ]);
    }

    public function store() {
        
        $data = request()->validate([
            'prefix_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'phone' => 'required|numeric',
            'postal' => 'required|numeric',
            'password' => 'required|min:8'
        ]);
    
        // Akan cek apakah country sudah ada di database, jika belum akan membuat country baru.
        $countryString = $data['country'];
        $countryName = explode('#', $countryString)[0];
        $countryCode = explode('#', $countryString)[1];

        $country = Country::where('name', $countryName)->first();
        if(!$country) {
            $country = Country::create([
                'name' => $countryName,
                'phone_code' => $countryCode
            ]);
        }
        $data['country_id'] = $country->id;

        $data['role'] = 'Customer';
        $data['password'] = Hash::make($data['password']);

        User::create($data);
        
        return redirect('/login') -> with('success', 'Registration successful!');
    }

    // Ambil data country code dari JSON (Online)
    public function fetchCountryCodeFromJSON() {
        $url = "https://gist.githubusercontent.com/anubhavshrimal/75f6183458db8c453306f93521e93d37/raw/f77e7598a8503f1f70528ae1cbf9f66755698a16/CountryCodes.json";
        $response = file_get_contents($url);
        $countryCodes = json_decode($response, true);

        $data = [];
        foreach($countryCodes as $countryCode) {
            $data[] = [
                'name' => $countryCode['name'],
                'phone_code' => $countryCode['dial_code'],
                'code' => $countryCode['code']
            ];
        }

        // sort by country name
        usort($data, function($a, $b) {
            return $a['name'] <=> $b['name'];
        });

        return $data;
    }
}
