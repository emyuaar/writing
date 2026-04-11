<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $settings = \App\Models\Setting::all()->pluck('value', 'key')->toArray();
            $headerMenu = \App\Models\Menu::where('location', 'header')->with('items.children')->first();
            $footerMenu = \App\Models\Menu::where('location', 'footer_main')->with('items.children')->first();

            $view->with('siteSettings', $settings);
            $view->with('headerMenu', $headerMenu);
            $view->with('footerMenu', $footerMenu);
        });
    }
}
