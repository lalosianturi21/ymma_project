<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';
    protected $fillable = ['heading', 'sub_heading', 'nama', 'description1', 'description2', 'program1', 'program2', 'program3', 'program4', 'program5','program6', 'link_yt', 'slug' ];
}
