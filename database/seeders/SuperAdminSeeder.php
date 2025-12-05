<?php

namespace Database\Seeders;

use App\Enums\SuperAdminRole;
use App\Models\SuperAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuperAdmin::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => 'password',
            'role' => SuperAdminRole::SUPER,
            'is_active' => true,
            'last_login_at' => now(),
        ]);

        SuperAdmin::create([
            'name' => 'Support Admin',
            'email' => 'supportadmin@example.com',
            'password' => 'password',
            'role' => SuperAdminRole::SUPPORT,
            'is_active' => true,
            'last_login_at' => now(),
        ]);

        SuperAdmin::create([
            'name' => 'Auditor Admin',
            'email' => 'auditoradmin@example.com',
            'password' => 'password',
            'role' => SuperAdminRole::AUDITOR,
            'is_active' => true,
            'last_login_at' => now(),
        ]);
    }
}
