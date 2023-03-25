<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            [
                'user_id' => 1,
                'room_id' => 1,
                'from' => Carbon::parse('2023-03-01'),
                'to' => Carbon::parse('2023-03-02'),
                'promo_id' => null,
                'total_adult' => 2,
                'total_children' => 0,
                'total_room' => 1,
                'total_price' => 1000000,
                'additional' => 'Fresh linen please'
            ],
            [
                'user_id' => 5,
                'room_id' => 3,
                'from' => Carbon::parse('2022-06-01'),
                'to' => Carbon::parse('2022-06-02'),
                'promo_id' => null,
                'total_adult' => 3,
                'total_children' => 1,
                'total_room' => 2,
                'total_price' => 3000000,
                'additional' => 'Hairdryer needed'
            ],
            [
                'user_id' => 2,
                'room_id' => 5,
                'from' => Carbon::parse('2022-12-01'),
                'to' => Carbon::parse('2022-12-05'),
                'promo_id' => null,
                'total_adult' => 3,
                'total_children' => 1,
                'total_room' => 2,
                'total_price' => 20000000,
                'additional' => 'Early check in'
            ]
        ]);
    }
}
