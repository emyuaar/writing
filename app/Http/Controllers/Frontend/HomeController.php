<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'home')->where('is_published', true)->with('sections')->firstOrFail();
        $seo = $page->seo_metadata;
        
        return view('frontend.page', compact('page', 'seo'));
    }
}
