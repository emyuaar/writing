<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Category;

class MenuComposer
{
    public function compose(View $view)
    {
        $headerMenu = Menu::where('location', 'header')->with('items')->first();
        $footerMenu = Menu::where('location', 'footer_main')->with('items')->first();
        $siteSettings = Setting::pluck('value', 'key')->toArray();
        $serviceCategories = Category::where('type', 'service')
            ->with(['services' => function($q) {
                $q->where('is_published', true)->orderBy('sort_order', 'asc');
            }])
            ->whereHas('services', function($q) {
                $q->where('is_published', true);
            })
            ->take(4)
            ->get();

        $view->with([
            'headerMenu' => $headerMenu,
            'footerMenu' => $footerMenu,
            'siteSettings' => $siteSettings,
            'serviceCategories' => $serviceCategories,
        ]);
    }
}
