<?php

namespace App\Http\Controllers;

use App\Services\ContentService;

class ProgrammesController extends Controller
{
    public function __construct(private ContentService $cms) {}

    public function index()
    {
        $content = $this->cms->getPage('programmes');
        return view('pages.programmes', compact('content'));
    }

    public function cap()
    {
        return view('pages.cap-electricite');
    }

    public function bt()
    {
        return view('pages.bt-electrotechnique');
    }

    public function modulaire()
    {
        return view('pages.formation-modulaire');
    }
}
