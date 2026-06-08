<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Video;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->get();
        $videos   = Video::orderByDesc('created_at')->get();
        return view('pages.articles', compact('articles', 'videos'));
    }

    public function show(int $id)
    {
        $article = Article::with('images')->findOrFail($id);
        $related = Article::where('id', '!=', $id)->limit(3)->get();
        return view('pages.article-detail', compact('article', 'related'));
    }
}
