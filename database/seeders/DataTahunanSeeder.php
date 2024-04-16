<?php

namespace Database\Seeders;

use App\Models\DataTahunan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DataTahunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataTahunan::create([
            'tahun' => 2021,
            'total_data1' => 2001,
            'total_data2' => 2004,
            'total_data3' => 2005,
            'nama_data1' => 'Perawatan TBC',
            'nama_data2' => 'Terkonfirmasi TBC',
            'nama_data3' => 'Total Sembuh',
            'icon1' => 'fa-solid fa-bed-pulse',
            'icon2' => 'fa-solid fa-head-side-cough',
            'icon3' => 'fa-solid fa-hand-fist',
            'slug' => Str::slug('2021')
        ]);

        DataTahunan::create([
            'tahun' => 2022,
            'total_data1' => 2001,
            'total_data2' => 2004,
            'total_data3' => 2005,
            'nama_data1' => 'Perawatan TBC',
            'nama_data2' => 'Terkonfirmasi TBC',
            'nama_data3' => 'Total Sembuh',
            'icon1' => 'fa-solid fa-bed-pulse',
            'icon2' => 'fa-solid fa-head-side-cough',
            'icon3' => 'fa-solid fa-hand-fist',
            'slug' => Str::slug('2022')
        ]);

        DataTahunan::create([
            'tahun' => 2023,
            'total_data1' => 2001,
            'total_data2' => 2004,
            'total_data3' => 2005,
            'nama_data1' => 'Perawatan TBC',
            'nama_data2' => 'Terkonfirmasi TBC',
            'nama_data3' => 'Total Sembuh',
            'icon1' => 'fa-solid fa-bed-pulse',
            'icon2' => 'fa-solid fa-head-side-cough',
            'icon3' => 'fa-solid fa-hand-fist',
            'slug' => Str::slug('2023')
        ]);
    }
}
