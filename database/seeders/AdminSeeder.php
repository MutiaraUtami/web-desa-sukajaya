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
            'email' => ' adminsukajaya@gmail.com',
            'password' => bcrypt('@Sukajaya26'),
            'role' => 'admin',
        ]);
    }
}
