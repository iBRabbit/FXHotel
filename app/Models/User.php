<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function country(){
        return $this->belongsTo(Country::class, "country_id", "id");
    }

    public function prefix(){
        // return $this->belongsTo(Prefix::class, "prefix_id", "id");
        return $this->belongsTo(Prefix::class, "prefix_id", "id");
    }

    public function reservations(){
        return $this->hasMany(Reservations::class, "user_id", "id");
    }

    protected $guarded = [
        'id'
    ];

    public function getLastName($withPrefix = true){
        $name = explode(" ", $this->name);
        $prefix = $this->prefix->prefix;

        if($withPrefix)
            return (count($name) > 1) ? $prefix . " " . $name[count($name) - 1] :  $prefix . " " . $name[0];

        return (count($name) > 1) ? $name[count($name) - 1] :  $name[0];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
