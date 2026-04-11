<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_published', true)->orderBy('is_featured', 'desc')->paginate(12);
        return view('frontend.services-index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $seo = $service->seo_metadata;
        
        return view('frontend.service-show', compact('service', 'seo'));
    }
}
