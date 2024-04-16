<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mitra::create([
            'nama_mitra' => 'Bakrie Center Foundation',
            'gambar' => 'bakrie.png',
            'slug' => Str::slug('Bakrie Center Foundation')
        ]);

        Mitra::create([
            'nama_mitra' => 'Kadin Indonesia',
            'gambar' => 'kadin.png',
            'slug' => Str::slug('Kadin Indonesia')
        ]);

        Mitra::create([
            'nama_mitra' => 'Kampus Merdeka',
            'gambar' => 'kampusmerdeka.png',
            'slug' => Str::slug('Kampus Merdeka')
        ]);

        Mitra::create([
            'nama_mitra' => 'Kementerian Kesehatan Republik Indonesia',
            'gambar' => 'kemenkes.png',
            'slug' => Str::slug('Kementerian Kesehatan Republik Indonesia')
        ]);

        Mitra::create([
            'nama_mitra' => 'MSIB',
            'gambar' => 'msib.png',
            'slug' => Str::slug('MSIB')
        ]);

        Mitra::create([
            'nama_mitra' => 'TBC Komunitas',
            'gambar' => 'pbstpi.png',
            'slug' => Str::slug('TBC Komunitas')
        ]);

        Mitra::create([
            'nama_mitra' => 'TOSS TB',
            'gambar' => 'tosstb.png',
            'slug' => Str::slug('TOSS TB')
        ]);
    }
}
