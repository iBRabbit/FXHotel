<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('room-images'); // Hapus semua gambar room sebelum init

        $this->call(CountrySeeder::class);
        $this->call(PrefixSeeder::class);
        $this->call(PromoSeeder::class);
        $this->call(RoomSeeder::class);
        \App\Models\User::factory(10)->create();
        $this->call(ReservationsSeeder::class);
    }
}
