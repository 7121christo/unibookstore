<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Penerbit;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Penerbit::create([
            'id_penerbit' => 'SP01',
            'nama' => 'Penerbit Informatika',
            'alamat' => 'Jl. Buah Batu No.121',
            'kota' => 'Bandung',
            'telepon' => '0813-2220-1946'
        ]);

        Penerbit::create([
            'id_penerbit' => 'SP02',
            'nama' => 'Andi Offset',
            'alamat' => 'Jl. Suralaya IX No.3',
            'kota' => 'Bandung',
            'telepon' => '0878-3903-0688'
        ]);

        Penerbit::create([
            'id_penerbit' => 'SP03',
            'nama' => 'Danendra',
            'alamat' => 'Jl Moch. Toha 44',
            'kota' => 'Bandung',
            'telepon' => '022-5201215'
        ]);
    }
}