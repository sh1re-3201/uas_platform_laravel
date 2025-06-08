<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin_p4ss'),
        ]);

        // Memanggil seeder lain
        $this->call([
            JobSeeder::class,
            // Tambahkan seeder lain jika ada
        ]);
    }
}
