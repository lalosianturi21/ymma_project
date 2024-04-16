<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keagamaan extends Model
{
    use HasFactory;

    protected $table = 'keagamaan';
    protected $fillable = ['title','subtitle', 'konten', 'gambar1', 'gambar2', 'gambar3','slug' ];
}
