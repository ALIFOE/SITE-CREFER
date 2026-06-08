<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosAdminController extends Controller
{
    public function index()
    {
        $videos = Video::orderByDesc('created_at')->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.form', ['video' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:500',
            'description' => 'nullable|string',
            'youtube_id'  => 'nullable|string|max:50',
            'date'        => 'nullable|string|max:50',
            'category'    => 'nullable|string|max:100',
            'thumbnail'   => 'nullable|string',
        ]);

        Video::create($data);
        return redirect()->route('admin.videos')->with('success', 'Vidéo ajoutée.');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.form', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:500',
            'description' => 'nullable|string',
            'youtube_id'  => 'nullable|string|max:50',
            'date'        => 'nullable|string|max:50',
            'category'    => 'nullable|string|max:100',
            'thumbnail'   => 'nullable|string',
        ]);

        $video->update($data);
        return redirect()->route('admin.videos')->with('success', 'Vidéo mise à jour.');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.videos')->with('success', 'Vidéo supprimée.');
    }
}
