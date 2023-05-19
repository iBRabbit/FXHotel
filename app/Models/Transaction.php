<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function reservation(){
        return $this->belongsTo(Reservations::class, "reservation_id", "id");
    }

}
