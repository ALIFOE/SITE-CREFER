<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Section;
use App\Services\ContentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesAdminController extends Controller
{
    public function index()
    {
        $pages = Page::withCount('sections')->orderBy('page_key')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function edit(Page $page)
    {
        $pageDefaults = ContentService::defaults($page->page_key);

        $sections = $page->sections()->orderByDesc('updated_at')->get()
            ->map(function (Section $section) use ($pageDefaults) {
                $sectionDefaults = $pageDefaults[$section->section_key] ?? [];
                $dbContent       = is_array($section->content) ? $section->content : [];

                // Merge: defaults first, then non-empty DB values override
                $merged = $sectionDefaults;
                foreach ($dbContent as $key => $val) {
                    if ($val !== '' && $val !== null) {
                        $merged[$key] = $val;
                    }
                }

                // Add any DB keys not in defaults
                foreach ($dbContent as $key => $val) {
                    if (!array_key_exists($key, $merged)) {
                        $merged[$key] = $val;
                    }
                }

                $section->content = !empty($merged) ? $merged : $dbContent;
                return $section;
            });

        return view('admin.pages.edit', compact('page', 'sections'));
    }

    public function updateSection(Request $request, Page $page, Section $section)
    {
        $request->validate(['content' => 'nullable|array']);

        $content = $request->input('content', []);

        // Traiter les uploads d'images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                if ($file->isValid()) {
                    $path = $file->store('cms/' . $page->page_key, 'public');
                    $content[$key] = Storage::url($path);
                }
            }
        }

        $section->update([
            'content' => $content,
            'name'    => $request->input('name', $section->name),
        ]);

        return back()->with('success', 'Section "' . $section->name . '" mise à jour.');
    }
}
