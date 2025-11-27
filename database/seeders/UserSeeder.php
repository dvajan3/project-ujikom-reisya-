<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'nama' => 'Guru Matematika',
            'username' => 'guru1',
            'email' => 'guru@example.com',
            'password' => Hash::make('password'),
            'role' => 'guru'
        ]);

        User::create([
            'nama' => 'Siswa Test',
            'username' => 'siswa1',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password'),
            'role' => 'siswa'
        ]);
    }
}