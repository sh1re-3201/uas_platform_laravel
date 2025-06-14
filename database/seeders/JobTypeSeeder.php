<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobType::create(['type_name' => 'Full Time']);
        JobType::create(['type_name' => 'Part Time']);
        JobType::create(['type_name' => 'Magang']);
    }
}
