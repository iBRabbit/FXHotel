<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'name' => 'Indonesia',
                'phone_code' => '+62'
            ],
            [
                'name' => 'Japan',
                'phone_code' => '+81'
            ],
            [
                'name' => 'USA',
                'phone_code' => '+1'
            ],
            [
                'name' => 'China',
                'phone_code' => '+86'
            ],
            [
                'name' => 'United Kingdom',
                'phone_code' => '+44'
            ]
        ]);
    }
}
