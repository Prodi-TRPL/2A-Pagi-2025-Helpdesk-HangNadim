<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            ['nama' => 'Kebersihan',      'slug' => 'cleanliness'],
            ['nama' => 'Keamanan',        'slug' => 'security'],
            ['nama' => 'Kedatangan',      'slug' => 'arrival'],
            ['nama' => 'Keberangkatan',   'slug' => 'departure'],
            ['nama' => 'Pelayanan',       'slug' => 'service'],
            ['nama' => 'Fasilitas',       'slug' => 'facilities'],
            ['nama' => 'SDM/Personal',    'slug' => 'hr'],
            ['nama' => 'Lainnya',         'slug' => 'others'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create([
                'nama_kategori' => $kategori['nama'],
                'slug' => $kategori['slug']
            ]);
        }
    }
}
