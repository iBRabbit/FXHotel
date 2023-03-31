<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    use HasFactory;
    
    protected $guarded = ["id"];
    public $timestamps = false;

    // Belongs to: di Room Image ada FK room_id yang akan diconnect ke class Room
    public function room(){
        return $this->belongsTo(Room::class, "room_id", "id");
    }

}
