<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class HRDUserSeeder extends Seeder
{
    public function run(): void
    {
        Users::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin HRD',
                'password' => Hash::make('admin_p4ss'),
                'role' => 'hrd',
                'tanggal_lahir' => now(),
                'pendidikan_terakhir' => 'S1',
                'pengalaman_kerja' => '3 tahun di bidang HR',
                'skills' => 'rekrutmen, komunikasi'
            ]
        );
    }
}
