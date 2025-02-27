<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Penerbit;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $p1 = Penerbit::where('id_penerbit', 'SP01')->first();
        $p2 = Penerbit::where('id_penerbit', 'SP02')->first();
        $p3 = Penerbit::where('id_penerbit', 'SP03')->first();

        Buku::create([
            'id_buku' => 'K1001',
            'kategori' => 'Keilmuan',
            'nama_buku' => 'Analisis & Perancangan Sistem Informasi',
            'harga' => 50000,
            'stok' => 60,
            'id_penerbit' => $p1->id,
        ]);

        Buku::create([
            'id_buku' => 'K1002',
            'kategori' => 'Keilmuan',
            'nama_buku' => 'Artificial Intelligence',
            'harga' => 45000,
            'stok' => 60,
            'id_penerbit' => $p1->id,
        ]);

        Buku::create([
            'id_buku' => 'K1003',
            'kategori' => 'Keilmuan',
            'nama_buku' => 'Autocad 3 Dimensi',
            'harga' => 40000,
            'stok' => 25,
            'id_penerbit' => $p1->id,
        ]);

        Buku::create([
            'id_buku' => 'B1001',
            'kategori' => 'Bisnis',
            'nama_buku' => 'Bisnis Online',
            'harga' => 75000,
            'stok' => 9,
            'id_penerbit' => $p1->id,
        ]);

        Buku::create([
            'id_buku' => 'K3004',
            'kategori' => 'Keilmuan',
            'nama_buku' => 'Cloud Computing Technology',
            'harga' => 85000,
            'stok' => 15,
            'id_penerbit' => $p1->id,
        ]);

        Buku::create([
            'id_buku' => 'B1002',
            'kategori' => 'Bisnis',
            'nama_buku' => 'Etika Bisnis dan Tanggung Jawab Sosial',
            'harga' => 67500,
            'stok' => 20,
            'id_penerbit' => $p1->id,
        ]);

        Buku::create([
            'id_buku' => 'N1001',
            'kategori' => 'Novel',
            'nama_buku' => 'Cahaya Di Penjuru Hati',
            'harga' => 68000,
            'stok' => 10,
            'id_penerbit' => $p2->id,
        ]);

        Buku::create([
            'id_buku' => 'N1002',
            'kategori' => 'Novel',
            'nama_buku' => 'Aku Ingin Cerita',
            'harga' => 48000,
            'stok' => 12,
            'id_penerbit' => $p3->id,
        ]);
    }
}