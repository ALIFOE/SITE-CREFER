<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\Page;
use App\Models\AdmissionsImage;
use App\Models\AdmissionsDocument;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles'  => Article::count(),
            'gallery'   => Gallery::count(),
            'videos'    => Video::count(),
            'pages'     => Page::count(),
            'admImages' => AdmissionsImage::count(),
            'admDocs'   => AdmissionsDocument::count(),
        ];
        $latestArticles = Article::latest()->limit(5)->get();
        $pages = Page::all();

        return view('admin.dashboard', compact('stats', 'latestArticles', 'pages'));
    }
}
