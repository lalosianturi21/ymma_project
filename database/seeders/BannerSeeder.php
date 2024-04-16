<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'sampul' => 'banner1.jpg',
            'judul' => 'Temukan TB, Obati Sampai Sembuh (TOSS TB)',
            'konten' => 'Yayasan Mentari Meraki Asa didirikan atas kesepahaman bersama melalui penggabungan beberapa perwakilan pelaksana program penanggulangan TBC berbasis komunitas.',
            'slug' => Str::slug('Temukan TB, Obati Sampai Sembuh (TOSS TB)')
        ]);

        Banner::create([
            'sampul' => 'banner2.jpg',
            'judul' => 'Visi Program',
            'konten' => 'Terwujudnya Masyarakat Sipil Indonesia yang Sadar Pembangunan dan Berperadaban Global.',
            'slug' => Str::slug('Visi Program')
        ]);

        Banner::create([
            'sampul' => 'banner3.jpg',
            'judul' => 'Misi Program',
            'konten' => 'Mendorong kesadaran masyarakat sipil Indonesia dalam keterlibatan terhadap isu-isu
            strategis pembangunan berkelanjutan melalui peningkatan kompetensi sumber daya 
            manusia, kolektif-kolegial organisasi, dan kapabilitas dalam pemberdayaan masyarakat 
            untuk mewujudkan masyarakat sipil Indonesia yang sadar pembangunan dan 
            berperadaban Global seluas-luasnya.',
            'slug' => Str::slug('Misi Program')
        ]);
    }
}
