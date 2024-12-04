<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'admin123', // Mengenkripsi password
            'role' => 'admin',
            'is_active' => 1, // Akun diaktifkan
        ]);

        // Menambahkan user admin lainnya
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => 'superadmin123',
            'role' => 'admin',
            'is_active' => 1,
        ]);

        // Menambahkan user biasa
        User::create([
            'name' => 'User Satu',
            'email' => 'user1@example.com',
            'password' => 'user123',
            'role' => 'user',
            'is_active' => 1,
        ]);

        // Menambahkan user lainnya
        User::create([
            'name' => 'User Dua',
            'email' => 'user2@example.com',
            'password' => 'user234',
            'role' => 'user',
            'is_active' => 1,
        ]);
    }
}
