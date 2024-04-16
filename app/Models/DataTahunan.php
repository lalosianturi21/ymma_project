<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTahunan extends Model
{
    use HasFactory;

    protected $table = 'data_tahunan';
    protected $fillable = ['tahun', 'icon1', 'icon2', 'icon3', 'total_data1', 'total_data2', 'total_data3', 'nama_data1', 'nama_data2', 'nama_data3', 'slug' ];
}
