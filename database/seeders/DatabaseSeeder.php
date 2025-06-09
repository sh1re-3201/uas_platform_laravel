<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Users;
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

        Users::create([
        'name' => 'Test Applicant',
        'email' => 'test@applicant.com',
        'password' => Hash::make('password123'), // use a hashed password!
        'role' => 'applicant',
        ]);
        Users::create([
            'name'=> 'Admin',
            'email'=> 'test@admin.com',
            'password' => Hash::make('admin_p4ss'), // use a hashed password!
            'role'=> 'admin'
        ]);
    }
}
