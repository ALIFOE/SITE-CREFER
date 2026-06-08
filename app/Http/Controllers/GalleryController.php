<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::orderByDesc('created_at')->get();
        $categories = $items->pluck('category')->unique()->filter()->values();
        return view('pages.gallery', compact('items', 'categories'));
    }
}
