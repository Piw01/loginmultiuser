<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@pos.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Membuat akun Kepala Toko
        User::create([
            'name' => 'Budi Kepala Toko',
            'email' => 'kepala@pos.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_toko'
        ]);

        // Membuat akun Kasir
        User::create([
            'name' => 'Citra Kasir',
            'email' => 'kasir@pos.com',
            'password' => Hash::make('password'),
            'role' => 'kasir'
        ]);
    }
}