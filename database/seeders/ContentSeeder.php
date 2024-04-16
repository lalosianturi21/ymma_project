<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'title' => 'Yuk Mari Skrining Sekarang',
            'sub_title' => 'Yayasan Mentari Meraki Asa menyediakan sebuah platform website skrining untuk mengatasi penanganan tuberkulosis',
            'nama_button' => 'Klik untuk skrining',
            'link_button' => 'https://skrining.merakiasa.com/',
            'slug' => Str::slug('Yuk Mari Skrining Sekarang')
        ]);
    }
}
