<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User 2',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin', // Assign admin role
            'subscription_type' => 'premium', // Optional
        ]);
    }
}
