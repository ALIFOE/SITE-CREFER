<?php

namespace App\Http\Controllers;

use App\Models\AdmissionsImage;
use App\Models\AdmissionsDocument;
use App\Services\ContentService;

class AdmissionsController extends Controller
{
    public function __construct(private ContentService $cms) {}

    public function index()
    {
        $content   = $this->cms->getPage('admissions');
        $images    = AdmissionsImage::orderByDesc('created_at')->get();
        $documents = AdmissionsDocument::orderByDesc('created_at')->get();
        return view('pages.admissions', compact('content', 'images', 'documents'));
    }
}
