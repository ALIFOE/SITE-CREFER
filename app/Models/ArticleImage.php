<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    public $timestamps = false;
    protected $fillable = ['article_id', 'image_url', 'position'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
