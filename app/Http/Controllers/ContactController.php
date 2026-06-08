<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Services\ContentService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(private ContentService $cms) {}

    public function index()
    {
        $content = $this->cms->getPage('contact');
        return view('pages.contact', compact('content'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:100',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create($request->only('name', 'email', 'phone', 'subject', 'message'));

        return back()->with('success', 'Votre message a été envoyé. Nous vous répondrons dans les plus brefs délais.');
    }
}
