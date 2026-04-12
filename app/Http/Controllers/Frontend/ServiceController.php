<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = Category::with(['services' => function($query) {
            $query->where('is_published', true)->orderBy('sort_order', 'asc');
        }])->get();

        return view('frontend.services-index', compact('categories'));
    }

    public function show($slug)
    {
        $service = Service::with(['sections' => function($q) {
            $q->where('is_active', true)->orderBy('sort_order');
        }])->where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        $seo = $service->seo_metadata;
        
        return view('frontend.service-show', compact('service', 'seo'));
    }
}
