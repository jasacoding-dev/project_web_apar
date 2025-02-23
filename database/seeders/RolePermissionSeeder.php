<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat role
        $adminRole = Role::create(['name' => 'admin']);
        $clientRole = Role::create(['name' => 'client']);
        $staffRole = Role::create(['name' => 'staff']);

        // Membuat user default
        $user = User::create([
            'nip' => null,
            'name' => 'Admin',
            'phone' => null,
            'email' => 'admin@gmail.com',
            'address' => null,
            'gender' => null,
            'birthplace' => null,
            'birthdate' => null,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Memberikan role admin ke user
        $user->assignRole($adminRole);
    }
}
