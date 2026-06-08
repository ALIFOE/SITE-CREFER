<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionsDocument extends Model
{
    protected $table = 'admissions_documents';
    protected $fillable = ['title', 'description', 'type', 'file_name', 'document'];
}
