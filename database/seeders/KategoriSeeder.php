<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'id_kategori' => 1,
                'nama_kategori' => 'Teknologi',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}