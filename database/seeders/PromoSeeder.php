<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promos')->insert([
            'promo_code' => 'PROMO1',
            'discount_percentage' => 50,
        ], 
        [
            'promo_code' => 'PROMO2',
            'discount_percentage' => 70,
        ],
        [
            'promo_code' => 'PROMO3',
            'discount_percentage' => 100,
        ]
    
    );
    }
}
