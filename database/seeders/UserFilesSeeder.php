<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::inRandomOrder()->limit(1)->first();
        UserFile::create(['user_id' => $user->id, 'name' => 'example_file.pdf', 'status' => 1]);
    }
}
