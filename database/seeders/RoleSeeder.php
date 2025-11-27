<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'nama' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@reisyamajalah.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]
        );

        // Create guru user
        User::updateOrCreate(
            ['username' => 'guru'],
            [
                'nama' => 'Guru SMK',
                'username' => 'guru',
                'email' => 'guru@reisyamajalah.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru'
            ]
        );

        // Create siswa user
        User::updateOrCreate(
            ['username' => 'siswa'],
            [
                'nama' => 'Siswa SMK',
                'username' => 'siswa',
                'email' => 'siswa@reisyamajalah.com',
                'password' => Hash::make('siswa123'),
                'role' => 'siswa'
            ]
        );

        // Create regular user
        User::updateOrCreate(
            ['username' => 'user'],
            [
                'nama' => 'Regular User',
                'username' => 'user',
                'email' => 'user@reisyamajalah.com',
                'password' => Hash::make('user123'),
                'role' => 'user'
            ]
        );
    }
}