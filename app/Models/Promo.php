<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    public function reservations(){
        return $this->hasMany(Reservations::class, "promo_id", "id");
    }
}
