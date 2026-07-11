<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Desa',
            'email' => 'admin@gmail.com', 
            'password' => bcrypt('password123'), 
            'role' => 'admin',
        ]);
    }
}
