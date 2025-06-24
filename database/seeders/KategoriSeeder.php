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
        $kategoris = ['Kebersihan', 'Keamanan', 'Kedatangan','Keberangkatan', 'Pelayanan', 'Fasilitas', 'SDM/Personal', 'Lainnya'];

        foreach ($kategoris as $kategori) {
            Kategori::create([
                'nama_kategori' => $kategori
            ]);
        }
    }
}
