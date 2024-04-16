<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'nama_anggota' => 'Tio Fulalo Simatupang',
            'posisi' => 'CEO',
            'quotes' => 'Mari berantas TBC untuk mencapai SGDs hero di tahun 2030',
            'gambar' => 'team1.png',
            'slug' => Str::slug('Tio Fulalo Simatupang')
        ]);

        Team::create([
            'nama_anggota' => 'Nadya Khairunisa Lubis',
            'posisi' => 'Staff Administrasi',
            'quotes' => 'Mari berantas TBC untuk mencapai SGDs hero di tahun 2030',
            'gambar' => 'team2.png',
            'slug' => Str::slug('Nadya Khairunisa Lubis')
        ]);

        Team::create([
            'nama_anggota' => 'Melky Eka Putra Damanik',
            'posisi' => 'Kepala Team',
            'quotes' => 'Mari berantas TBC untuk mencapai SGDs hero di tahun 2030',
            'gambar' => 'team3.png',
            'slug' => Str::slug('Melky Eka Putra Damanik')
        ]);

        Team::create([
            'nama_anggota' => 'Harry Binur Pratama Simarmata',
            'posisi' => 'Budak korporat',
            'quotes' => 'Mari berantas TBC untuk mencapai SGDs hero di tahun 2030',
            'gambar' => 'team4.png',
            'slug' => Str::slug('Harry Binur Pratama Simarmata')
        ]);

        Team::create([
            'nama_anggota' => 'Gauri Ananda Sanjaya',
            'posisi' => 'Leader',
            'quotes' => 'Mari berantas TBC untuk mencapai SGDs hero di tahun 2030',
            'gambar' => 'team5.png',
            'slug' => Str::slug('Gauri Ananda Sanjaya')
        ]);

        Team::create([
            'nama_anggota' => 'Gustie Pasbon',
            'posisi' => 'Mentoring',
            'quotes' => 'Mari berantas TBC untuk mencapai SGDs hero di tahun 2030',
            'gambar' => 'team6.png',
            'slug' => Str::slug('Gustie Pasbon')
        ]);

        Team::create([
            'nama_anggota' => 'Ahlul yoga pratama',
            'posisi' => 'Coach',
            'quotes' => 'Mari berantas TBC untuk mencapai SGDs hero di tahun 2030',
            'gambar' => 'team7.png',
            'slug' => Str::slug('Ahlul yoga pratama')
        ]);
    }
}
