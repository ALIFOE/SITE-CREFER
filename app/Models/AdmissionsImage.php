<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionsImage extends Model
{
    protected $table = 'admissions_images';
    protected $fillable = ['title', 'category', 'description', 'image'];
}
