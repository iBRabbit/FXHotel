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
            [ 'promo_code' => 'PROMO10', 'discount_percentage' => 10],
            [ 'promo_code' => 'PROMO20', 'discount_percentage' => 20],
            [ 'promo_code' => 'PROMO30', 'discount_percentage' => 30],
            [ 'promo_code' => 'PROMO40', 'discount_percentage' => 40],
            [ 'promo_code' => 'PROMO50', 'discount_percentage' => 50],
            [ 'promo_code' => 'PROMO60', 'discount_percentage' => 60],
            [ 'promo_code' => 'PROMO70', 'discount_percentage' => 70],
            [ 'promo_code' => 'PROMO80', 'discount_percentage' => 80],
            [ 'promo_code' => 'PROMO90', 'discount_percentage' => 90],
            [ 'promo_code' => 'PROMO100', 'discount_percentage' => 100]
        ]);
    }
}
