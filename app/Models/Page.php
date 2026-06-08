<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['page_key', 'title', 'description'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function section(string $key): ?array
    {
        $section = $this->sections->firstWhere('section_key', $key);
        return $section ? (array) $section->content : null;
    }
}
