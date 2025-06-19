<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder lain
        $this->call([
            JobTypeSeeder::class,
        ]);

        // Tambahkan akun pengguna jika belum ada
        Users::firstOrCreate(
            ['email' => 'test@applicant.com'],
            [
                'name' => 'Test Applicant',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]
        );

        Users::firstOrCreate(
            ['email' => 'test@admin.com'],
            [
                'name' => 'HRD_1',
                'password' => Hash::make('admin_p4ss'),
                'role' => 'hrd',
            ]
        );

        Users::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'HRD',
                'password' => Hash::make('admin123'),
                'role' => 'hrd',
            ]
        );
    }
}
