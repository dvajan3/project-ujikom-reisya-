<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('artikel')->insert([
            [
                'id_artikel' => 1,
                'judul' => 'Tren Teknologi Terbaru 2024',
                'isi' => 'Teknologi terus berkembang pesat di tahun 2024. Artificial Intelligence (AI) dan Machine Learning menjadi fokus utama dalam berbagai industri. Perkembangan teknologi cloud computing juga semakin memudahkan perusahaan dalam mengelola data dan aplikasi mereka.',
                'tanggal' => now()->format('Y-m-d'),
                'id_kategori' => 1,
                'foto' => null,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}