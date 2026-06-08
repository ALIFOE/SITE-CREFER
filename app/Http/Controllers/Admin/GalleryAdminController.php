<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryAdminController extends Controller
{
    public function index()
    {
        $items = Gallery::orderByDesc('created_at')->get();
        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.form', ['item' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'category'    => 'nullable|string|max:100',
            'image'       => 'nullable|string',
        ]);

        Gallery::create($data);
        return redirect()->route('admin.gallery')->with('success', 'Image ajoutée.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.form', ['item' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title'       => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'category'    => 'nullable|string|max:100',
            'image'       => 'nullable|string',
        ]);

        $gallery->update($data);
        return redirect()->route('admin.gallery')->with('success', 'Image mise à jour.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery')->with('success', 'Image supprimée.');
    }
}
