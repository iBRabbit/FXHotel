<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

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

        User::create([
            'prefix_id' => '1', 
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'country_id' => '1',
            'phone' => '081234567890',
            'postal' => '12345',
        ]);

        User::create([
            'prefix_id' => '1',    
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Customer',
            'country_id' => 1,
            'phone' => '081234567890',
            'postal' => '12345',
        ]);
    }
}
