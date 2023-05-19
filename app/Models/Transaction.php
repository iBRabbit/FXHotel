<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function reservation(){
        return $this->hasOne(Reservations::class, "transaction_id", "id");
    }

    public function user(){
        return $this->hasOne(User::class, "user_id", "id");
    }

}
