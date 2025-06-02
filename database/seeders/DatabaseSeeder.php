<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Applicants;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Applicants::create([
        'name' => 'Test Applicant',
        'email' => 'test@applicant.com',
        'password' => Hash::make('password123'), // use a hashed password!
        ]);
    }
}
