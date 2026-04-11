<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;
use App\Models\Setting;

class MenuComposer
{
    public function compose(View $view)
    {
        $headerMenu = Menu::where('location', 'header')->with('items')->first();
        $footerMenu = Menu::where('location', 'footer_main')->with('items')->first();
        $siteSettings = Setting::pluck('value', 'key')->toArray();

        $view->with([
            'headerMenu' => $headerMenu,
            'footerMenu' => $footerMenu,
            'siteSettings' => $siteSettings,
        ]);
    }
}
