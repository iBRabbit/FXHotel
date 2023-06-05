<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $guarded = ["id"];

    public function scopeFilter($query) {
        if(request('search')) 
            return $query->where('name', 'like', '%' . request('search') . '%');
    }

    public function roomImages(){
        return $this->hasMany(RoomImage::class, "room_id", "id");
    }

    public function reservations(){
        return $this->hasMany(Reservations::class, "room_id", "id");
    }
}
