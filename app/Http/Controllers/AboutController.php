<?php

namespace App\Http\Controllers;

use App\Services\ContentService;

class AboutController extends Controller
{
    public function __construct(private ContentService $cms) {}

    public function index()
    {
        $content = $this->cms->getPage('about');
        return view('pages.about', compact('content'));
    }
}
