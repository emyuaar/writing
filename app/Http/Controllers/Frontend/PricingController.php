<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Str;

class PricingController extends Controller
{
    public function index()
    {
        $services = Service::where('is_published', true)->get();
        return view('frontend.pricing', compact('services'));
    }

    public function storeOrder(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'service_id' => 'required|exists:services,id',
            'order_details' => 'required|string',
        ]);

        $data['order_number'] = 'ORD-' . strtoupper(Str::random(10));
        
        Order::create($data);

        return back()->with('success', 'Your order request #' . $data['order_number'] . ' has been submitted successfully. We will review and provide a final quote.');
    }
}
