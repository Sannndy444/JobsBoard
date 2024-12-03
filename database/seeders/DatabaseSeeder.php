<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        // Tambahkan role 'user'
        $userRole = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        // Buat user dengan role 'admin'
        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $adminUser->assignRole($adminRole);

        // Buat user dengan role 'user'
        $normalUser = User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $normalUser->assignRole($userRole);
    }
}
