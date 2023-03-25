<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Superior Room',
                'price' => 1000000,
                'description' => 'Luxurious Room with City View',
                'facilities' => 'Shower, Amenities, TV'
            ],
            [
                'name' => 'Deluxe Room',
                'price' => 1200000,
                'description' => 'Luxurious Room and bath with City View',
                'facilities' => 'Bathtub, Amenities, TV'
            ],
            [
                'name' => 'Superior Suite',
                'price' => 1500000,
                'description' => 'Luxurious Room with Nature and City View',
                'facilities' => 'Shower, Amenities, TV, Free Breakfast'
            ],
            [
                'name' => 'Deluxe Suite',
                'price' => 2000000,
                'description' => 'Luxurious Room and bath with Nature and City View',
                'facilities' => 'Bath, Amenities, TV, Free Breakfast'
            ],
            [
                'name' => 'Presidential Suite',
                'price' => 2500000,
                'description' => 'Extra Private Luxurious Room with Nature and City View',
                'facilities' => 'Bath, Private Jacuzzi, Amenities, TV, Free Breakfast'
            ]
        ]);
    }
}
