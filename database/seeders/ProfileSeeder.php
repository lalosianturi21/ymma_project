<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'heading' => 'Profile Yayasan Mentari Meraki Asa Sumatera Utara',
            'sub_heading' => 'Yayasan Mentari Meraki Asa berdedikasi untuk menciptakan dampak positif dalam masyarakat Sumatera Utara.',
            'nama' => 'Tentang Kami',
            'description1' => 'Yayasan Mentari Meraki Asa didirikan atas kesepahaman bersama melalui penggabungan beberapa perwakilan pelaksana program penanggulangan TBC berbasis komunitas',
            'description2' => 'Sejak tahun 2016 pada tingkat provinsi dan kota/kabupaten, melalui SR-SSR TBC-HIV Care Aisyiyah Sumatera Utara, para pengurus Yayasan i ni sekaligus pelaksana program, sudah menjalankan berbagai program berbasis komunitas masyarakat yang bergerak pada isu advokasi sosial, kesehatan masyarakat, pendidikan non formal, dan pemberdayaan masyarakat desa dengan kategori berhasil berdasarkan standar mitra.',
            'program1' => 'Pendidikan inklusif',
            'program2' => 'Pelatihan kreatif',
            'program3' => 'Lembaga sosial',
            'program4' => 'Advokasi kemanusiaan',
            'program5' => 'Pelatihan keuangan',
            'program6' => 'Penanggulangan bencana',
            'link_yt' => 'https://www.youtube.com/',
            'slug' => Str::slug('Tentang Kami')
        ]);
    }
}
