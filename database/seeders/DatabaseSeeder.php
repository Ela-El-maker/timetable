<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed a sample student account.
        User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => 'password',
            'role' => 'user',
            'status' => true,
        ]);

        // Seed a sample admin account for the admin guard.
        User::factory()->admin()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);
    }
}
