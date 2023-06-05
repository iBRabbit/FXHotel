<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Reservation extends Model
{
    use HasFactory;

    public function room(){
        return $this->belongsTo(Room::class, "room_id", "id");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function promo(){
        return $this->belongsTo(Promo::class, "promo_id", "id");
    }



    protected $guarded = [
        'id'
    ];

    public $timestamps = false;
}
