<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Http\Request;

class ArticlesAdminController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.form', ['article' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:500',
            'category'     => 'nullable|string|max:100',
            'date'         => 'nullable|string|max:50',
            'description'  => 'nullable|string',
            'full_content' => 'nullable|string',
            'main_image'   => 'nullable|string',
        ]);

        $article = Article::create($data);
        return redirect()->route('admin.articles')->with('success', 'Article créé avec succès.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:500',
            'category'     => 'nullable|string|max:100',
            'date'         => 'nullable|string|max:50',
            'description'  => 'nullable|string',
            'full_content' => 'nullable|string',
            'main_image'   => 'nullable|string',
        ]);

        $article->update($data);
        return redirect()->route('admin.articles')->with('success', 'Article mis à jour.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'Article supprimé.');
    }
}
