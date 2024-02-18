<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Admin', 'guard_name' => 'web', 'created_at' => '2024-02-01 16:14:19', 'updated_at' => '2024-02-01 16:14:38'],
            ['id' => 2, 'name' => 'Super Admin', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:31:35', 'updated_at' => '2024-02-18 00:57:23'],
            ['id' => 3, 'name' => 'Customer', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:31:35', 'updated_at' => '2024-02-18 00:57:23'],
            ['id' => 4, 'name' => 'Supplier', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:31:35', 'updated_at' => '2024-02-18 00:57:23'],
            ['id' => 5, 'name' => 'User', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:31:35', 'updated_at' => '2024-02-18 00:57:23']
        ]);
    }
}
