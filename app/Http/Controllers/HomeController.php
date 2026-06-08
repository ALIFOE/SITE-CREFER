<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Video;
use App\Services\ContentService;

class HomeController extends Controller
{
    public function __construct(private ContentService $cms) {}

    public function index()
    {
        $content = $this->cms->getPage('home');
        $global  = $this->cms->getPage('global');
        $articles = Article::latest()->limit(3)->get();
        $video    = Video::latest()->first();

        return view('pages.home', compact('content', 'global', 'articles', 'video'));
    }
}
