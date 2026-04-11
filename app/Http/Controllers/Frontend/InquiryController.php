<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string',
            'type' => 'nullable|string',
            'service_reference' => 'nullable|string',
        ]);

        $data['source_url'] = url()->previous();
        
        Inquiry::create($data);

        return back()->with('success', 'Thank you! Your inquiry has been received. We will contact you shortly.');
    }
}
