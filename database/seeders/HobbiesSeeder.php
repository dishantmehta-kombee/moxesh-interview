<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hobby::create(['name' => 'Reading', 'status' => 1]);
        Hobby::create(['name' => 'Gardening', 'status' => 1]);
    }
}
