<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Services\SectionRegistry;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug',
            'is_published' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $page = Page::create($data);

        return redirect()->route('admin.pages.edit', $page)->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        $page->load(['sections' => function($q) {
            $q->orderBy('sort_order');
        }]);
        
        $availableSections = SectionRegistry::getAvailableSections();
        
        return view('admin.pages.edit', compact('page', 'availableSections'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:pages,slug,' . $page->id,
            'is_published' => 'boolean',
            'seo_metadata' => 'nullable|array',
        ]);

        $page->update($data);

        if ($request->has('sections')) {
            $existingSectionIds = $page->sections()->pluck('id')->toArray();
            $submittedSectionIds = [];

            foreach ($request->sections as $index => $sectionData) {
                $sectionData['sort_order'] = $index;
                $sectionData['is_active'] = isset($sectionData['is_active']);

                if (isset($sectionData['id']) && in_array($sectionData['id'], $existingSectionIds)) {
                    $section = $page->sections()->find($sectionData['id']);
                    $section->update($sectionData);
                    $submittedSectionIds[] = $section->id;
                } else {
                    $newSection = $page->sections()->create($sectionData);
                    $submittedSectionIds[] = $newSection->id;
                }
            }

            // Cleanup removed sections
            $page->sections()->whereNotIn('id', $submittedSectionIds)->delete();
        }

        return back()->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page deleted successfully.');
    }

    public function getSectionForm(Request $request)
    {
        $type = $request->type;
        $index = $request->index;
        $schema = SectionRegistry::getSchema($type);
        
        return view('admin.sections.form_wrapper', compact('type', 'index', 'schema'))->render();
    }
}

