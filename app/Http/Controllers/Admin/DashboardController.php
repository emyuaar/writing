<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Inquiry;
use App\Models\Order;
use App\Models\Page;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pages' => Page::count(),
            'services' => Service::count(),
            'inquiries' => Inquiry::where('status', 'new')->count(),
            'orders' => Order::where('status', 'pending')->count(),
        ];

        $recentInquiries = Inquiry::latest()->limit(5)->get();
        $recentOrders = Order::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentOrders'));
    }
}
