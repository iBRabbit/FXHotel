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
            [ 'promo_code' => 'PROMOMARET'],
            [ 'promo_code' => 'PROMOXXX'],
            [ 'promo_code' => 'PROMONEW'],
        ]);
    }
}
