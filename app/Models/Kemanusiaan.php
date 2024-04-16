<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemanusiaan extends Model
{
    use HasFactory;

    protected $table = 'kemanusiaan';
    protected $fillable = ['title','subtitle', 'konten', 'gambar1', 'gambar2', 'gambar3','slug' ];
}
