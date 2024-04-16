<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';
    protected $fillable = ['heading', 'sub_heading','title1','title2','title3', 'subtitle1','subtitle2', 'subtitle3', 'icon_program1', 'icon_program2', 'icon_program3', 'slug'  ];
}
