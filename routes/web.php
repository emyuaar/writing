<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;

Route::get('/', [FrontendPageController::class, 'show'])->name('home');
Route::get('/p/{slug}', [FrontendPageController::class, 'show'])->name('page.show');
Route::get('/services/{slug}', [\App\Http\Controllers\Frontend\ServiceController::class, 'show'])->name('services.show');
Route::get('/blog', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [\App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog.show');
Route::get('/pricing', [\App\Http\Controllers\Frontend\PricingController::class, 'index'])->name('pricing.index');
Route::post('/order', [\App\Http\Controllers\Frontend\PricingController::class, 'storeOrder'])->name('order.store');
Route::post('/inquiry', [\App\Http\Controllers\Frontend\InquiryController::class, 'store'])->name('inquiry.store');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
    Route::post('login', [AuthController::class, 'login'])->middleware('guest');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::resource('pages', PageController::class);
        Route::get('pages/sections/get-form', [PageController::class, 'getSectionForm'])->name('pages.sections.get-form');
        Route::resource('services', ServiceController::class);
        Route::resource('posts', BlogController::class);
        Route::resource('inquiries', InquiryController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('menus', MenuController::class);
    Route::post('menus/{menu}/items', [MenuController::class, 'addItem'])->name('menus.items.store');
    Route::delete('menu-items/{item}', [MenuController::class, 'removeItem'])->name('menus.items.destroy');
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout'); // Global logout

