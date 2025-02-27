<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Penerbit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $p1 = Penerbit::create([
            'id_penerbit' => 'SP01',
            'nama' => 'Penerbit Informatika',
            'alamat' => 'Jl. Buah Batu No.121',
            'kota' => 'Bandung',
            'telepon' => '0813-2220-1946'
        ]);

        $p2 = Penerbit::create([
            'id_penerbit' => 'SP02',
            'nama' => 'Andi Offset',
            'alamat' => 'Jl. Suralaya IX No.3',
            'kota' => 'Bandung',
            'telepon' => '0878-3903-0688'
        ]);

        $p3 = Penerbit::create([
            'id_penerbit' => 'SP03',
            'nama' => 'Danendra',
            'alamat' => 'Jl Moch. Toha 44',
            'kota' => 'Bandung',
            'telepon' => '022-5201215'
        ]);

    }
}