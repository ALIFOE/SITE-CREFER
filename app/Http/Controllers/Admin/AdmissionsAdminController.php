<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionsImage;
use App\Models\AdmissionsDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmissionsAdminController extends Controller
{
    public function index()
    {
        $images    = AdmissionsImage::orderByDesc('created_at')->get();
        $documents = AdmissionsDocument::orderByDesc('created_at')->get();
        return view('admin.admissions.index', compact('images', 'documents'));
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'title'       => 'nullable|string|max:500',
            'category'    => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        $path = $request->file('image')->store('admissions/images', 'public');

        AdmissionsImage::create([
            'title'       => $request->title,
            'category'    => $request->category,
            'description' => $request->description,
            'image'       => Storage::url($path),
        ]);

        return back()->with('success', 'Image ajoutée.');
    }

    public function destroyImage(AdmissionsImage $image)
    {
        if ($image->image && str_starts_with($image->image, '/storage/')) {
            Storage::disk('public')->delete(ltrim(str_replace('/storage', '', $image->image), '/'));
        }
        $image->delete();
        return back()->with('success', 'Image supprimée.');
    }

    public function storeDocument(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:500',
            'description' => 'nullable|string',
            'file'        => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
        ]);

        $file = $request->file('file');
        $path = $file->store('admissions/documents', 'public');

        AdmissionsDocument::create([
            'title'       => $request->title,
            'description' => $request->description,
            'type'        => strtoupper($file->getClientOriginalExtension()),
            'file_name'   => $file->getClientOriginalName(),
            'document'    => Storage::url($path),
        ]);

        return back()->with('success', 'Document ajouté.');
    }

    public function destroyDocument(AdmissionsDocument $document)
    {
        if ($document->document && str_starts_with($document->document, '/storage/')) {
            Storage::disk('public')->delete(ltrim(str_replace('/storage', '', $document->document), '/'));
        }
        $document->delete();
        return back()->with('success', 'Document supprimé.');
    }
}
