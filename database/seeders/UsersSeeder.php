<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
//            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'John',
            'last_name' => 'Doe 007',
            'mobile' => 1234567890,
            'postal_code' => 12345,
            'gender' => 1, // Assuming 1 for male, 2 for female
        ]);
    }
}
