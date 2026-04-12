<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Category;
use App\Services\SectionRegistry;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::where('type', 'service')->get();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:services,slug',
            'category_id' => 'nullable|exists:categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'banner_image' => 'nullable|string',
            'features' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'seo_metadata' => 'nullable|array',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Convert newline string to array for storage
        if (!empty($data['features'])) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $data['features'])));
        } else {
            $data['features'] = [];
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $service->load(['sections' => function($q) {
            $q->orderBy('sort_order');
        }]);

        $categories = Category::where('type', 'service')->get();
        $availableSections = SectionRegistry::getAvailableSections();
        
        // Convert array to newline string for editing
        $service->features = is_array($service->features) ? implode("\n", $service->features) : '';
        
        return view('admin.services.edit', compact('service', 'categories', 'availableSections'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:services,slug,' . $service->id,
            'category_id' => 'nullable|exists:categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'banner_image' => 'nullable|string',
            'features' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'seo_metadata' => 'nullable|array',
            'sections' => 'nullable|array',
        ]);

        // Convert newline string to array for storage
        if (!empty($data['features'])) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $data['features'])));
        } else {
            $data['features'] = [];
        }

        $service->update($data);

        if ($request->has('sections')) {
            $existingSectionIds = $service->sections()->pluck('id')->toArray();
            $submittedSectionIds = [];

            foreach ($request->sections as $index => $sectionData) {
                // Ensure sorting and explicit boolean for activity
                $sectionData['sort_order'] = $index;
                $sectionData['is_active'] = (isset($sectionData['is_active']) && $sectionData['is_active'] == '1');

                if (isset($sectionData['id']) && in_array($sectionData['id'], $existingSectionIds)) {
                    $section = $service->sections()->find($sectionData['id']);
                    $section->update($sectionData);
                    $submittedSectionIds[] = $section->id;
                } else {
                    $newSection = $service->sections()->create($sectionData);
                    $submittedSectionIds[] = $newSection->id;
                }
            }

            // Cleanup removed sections
            $service->sections()->whereNotIn('id', $submittedSectionIds)->delete();
        } else {
            // If no sections are submitted, but the field exists in request (empty builder), 
            // it means all sections should be removed.
            if ($request->has('sections_builder_active')) {
                $service->sections()->delete();
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}

