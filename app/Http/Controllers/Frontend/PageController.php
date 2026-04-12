<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function show($slug = 'home')
    {
        $page = Page::where('slug', $slug)
            ->where('is_published', true)
            ->with(['sections' => function($q) {
                $q->where('is_active', true)->orderBy('sort_order');
            }])
            ->firstOrFail();

        $seo = $page->seo_metadata;

        return view('frontend.page', compact('page', 'seo'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
