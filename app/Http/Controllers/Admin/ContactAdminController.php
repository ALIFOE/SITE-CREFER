<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactAdminController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderByDesc('created_at')->paginate(20);
        $unread   = ContactMessage::where('is_read', false)->count();
        return view('admin.contact.index', compact('messages', 'unread'));
    }

    public function show(ContactMessage $message)
    {
        $message->markAsRead();
        return view('admin.contact.show', compact('message'));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.contact')->with('success', 'Message supprimé.');
    }

    public function destroyAll()
    {
        ContactMessage::whereIn('id', request('ids', []))->delete();
        return redirect()->route('admin.contact')->with('success', 'Messages supprimés.');
    }

    public function markAllRead()
    {
        ContactMessage::where('is_read', false)->update(['is_read' => true, 'read_at' => now()]);
        return back()->with('success', 'Tous les messages marqués comme lus.');
    }
}
