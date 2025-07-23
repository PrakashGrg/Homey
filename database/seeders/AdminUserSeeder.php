<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@hometutor.com',
            'password' => Hash::make('password'), // Use a secure password in production
            'role' => 'admin',
            'email_verified_at' => now(), // Pre-verify the admin's email
        ]);
    }
}