<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['id' => 1, 'name' => 'dashboard-menu', 'guard_name' => 'web', 'created_at' => '2024-02-17 16:24:19', 'updated_at' => '2024-02-17 11:31:07'],
            ['id' => 2, 'name' => 'roles-menu', 'guard_name' => 'web', 'created_at' => '2024-02-17 16:24:19', 'updated_at' => '2024-02-17 16:24:19'],
            ['id' => 3, 'name' => 'permissions-menu', 'guard_name' => 'web', 'created_at' => '2024-02-17 16:24:19', 'updated_at' => '2024-02-17 16:24:19'],
            ['id' => 4, 'name' => 'customers-menu', 'guard_name' => 'web', 'created_at' => '2024-02-17 16:24:19', 'updated_at' => '2024-02-17 16:24:19'],
            ['id' => 9, 'name' => 'suppliers-menu', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:35:12', 'updated_at' => '2024-02-17 23:35:12'],
            ['id' => 10, 'name' => 'users-menu', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:56:00', 'updated_at' => '2024-02-17 23:56:12'],
            ['id' => 11, 'name' => 'role-list', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:56:33', 'updated_at' => '2024-02-17 23:56:33'],
            ['id' => 12, 'name' => 'role-create', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:56:43', 'updated_at' => '2024-02-17 23:56:43'],
            ['id' => 13, 'name' => 'role-edit', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:56:50', 'updated_at' => '2024-02-17 23:56:50'],
            ['id' => 14, 'name' => 'role-delete', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:57:00', 'updated_at' => '2024-02-17 23:57:00'],
            ['id' => 15, 'name' => 'permission-list', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:58:11', 'updated_at' => '2024-02-17 23:58:11'],
            ['id' => 16, 'name' => 'permission-create', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:58:26', 'updated_at' => '2024-02-17 23:58:26'],
            ['id' => 17, 'name' => 'permission-edit', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:58:48', 'updated_at' => '2024-02-17 23:58:48'],
            ['id' => 18, 'name' => 'permission-delete', 'guard_name' => 'web', 'created_at' => '2024-02-17 23:58:57', 'updated_at' => '2024-02-17 23:58:57'],
            ['id' => 20, 'name' => 'customer-list', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:23:21', 'updated_at' => '2024-02-18 01:23:21'],
            ['id' => 21, 'name' => 'customer-create', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:23:27', 'updated_at' => '2024-02-18 01:23:27'],
            ['id' => 22, 'name' => 'customer-edit', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:23:34', 'updated_at' => '2024-02-18 01:23:34'],
            ['id' => 23, 'name' => 'customer-delete', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:23:40', 'updated_at' => '2024-02-18 01:23:40'],
            ['id' => 24, 'name' => 'supplier-list', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:23:47', 'updated_at' => '2024-02-18 01:23:47'],
            ['id' => 25, 'name' => 'supplier-create', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:23:52', 'updated_at' => '2024-02-18 01:23:52'],
            ['id' => 26, 'name' => 'supplier-edit', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:23:59', 'updated_at' => '2024-02-18 01:23:59'],
            ['id' => 27, 'name' => 'supplier-delete', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:24:06', 'updated_at' => '2024-02-18 01:24:06'],
            ['id' => 28, 'name' => 'user-list', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:24:11', 'updated_at' => '2024-02-18 01:24:11'],
            ['id' => 29, 'name' => 'user-create', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:24:16', 'updated_at' => '2024-02-18 01:24:16'],
            ['id' => 30, 'name' => 'user-edit', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:24:21', 'updated_at' => '2024-02-18 01:24:21'],
            ['id' => 31, 'name' => 'user-delete', 'guard_name' => 'web', 'created_at' => '2024-02-18 01:24:26', 'updated_at' => '2024-02-18 01:24:26']
        ]);
    }
}
