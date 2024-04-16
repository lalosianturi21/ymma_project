<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            'heading' => 'Program Yayasan Mentari Meraki Asa Sumatera Utara',
            'sub_heading' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts',
            'title1' => 'Keagamaan',
            'title2' => 'Kemanusiaan',
            'title3' => 'Sosial',
            'subtitle1' => 'Mendorong Toleransi Beragama dan Kemajuan Ekonomi Melalui Keterlibatan Aktif Rumah Ibadah dalam Kegiatan Masyarakat',
            'subtitle2' => 'Penanggulangan bencana, kemanusiaan, perlindungan anak, hak konsumen, regulasi kesehatan, dan komitmen lainnya',
            'subtitle3' => 'Meningkatkan kesejahteraan lewat pendidikan inklusif, pelatihan kreatif, dan pemberdayaan sosial berkelanjutan.',
            'icon_program1' => 'fa-solid fa-mosque',
            'icon_program2' => 'fa-solid fa-children',
            'icon_program3' => 'fa-solid fa-user-group',
            'slug' => Str::slug('Program Yayasan Mentari Meraki Asa Sumatera Utara')
        ]);

    }
}
