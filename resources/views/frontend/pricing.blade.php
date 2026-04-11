@extends('layouts.app')

@section('content')
<section class="bg-[#000B20] text-white py-20 px-8 text-center">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl lg:text-6xl font-extrabold mb-6">Invest in Your Excellence</h1>
        <p class="text-xl text-white/70 max-w-2xl mx-auto">Transparent pricing and tailored plans for every stage of your doctoral journey.</p>
    </div>
</section>

<section class="py-20 px-8 max-w-7xl mx-auto">
    <div class="grid lg:grid-cols-2 gap-16 items-start">
        <div>
            <h2 class="text-3xl font-bold text-[#0D223F] mb-8">Our Pricing Structure</h2>
            <p class="text-[#434655] mb-8 leading-relaxed">
                We believe in providing the highest quality academic support at competitive rates. Each project is unique, and our pricing reflects the depth of research and level of expertise required.
            </p>
            
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-[#FDC003]/10 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-[#FDC003]">payments</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#0D223F]">Transparent Quotes</h4>
                        <p class="text-sm text-[#434655]">No hidden fees. Every quote is comprehensive and final.</p>
                    </div>
                </div>
                <!-- More items -->
            </div>
        </div>

        <div class="bg-white p-8 lg:p-12 rounded-2xl shadow-2xl border border-[#e3e7ff]">
            <h3 class="text-2xl font-bold text-[#0D223F] mb-8">Place Your Order Request</h3>
            
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">{{ session('success') }}</div>
            @endif

            <form action="{{ route('order.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-[#0D223F] mb-2 uppercase tracking-tighter">Full Name</label>
                        <input type="text" name="customer_name" class="w-full bg-[#f2f3ff] border-none rounded-lg p-3" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#0D223F] mb-2 uppercase tracking-tighter">Email Address</label>
                        <input type="email" name="customer_email" class="w-full bg-[#f2f3ff] border-none rounded-lg p-3" required>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-[#0D223F] mb-2 uppercase tracking-tighter">Select Service</label>
                    <select name="service_id" class="w-full bg-[#f2f3ff] border-none rounded-lg p-3" required>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#0D223F] mb-2 uppercase tracking-tighter">Project Details</label>
                    <textarea name="order_details" rows="6" class="w-full bg-[#f2f3ff] border-none rounded-lg p-3" placeholder="Tell us about your dissertation topic, current progress, and specific needs..." required></textarea>
                </div>

                <button type="submit" class="w-full bg-[#0D223F] text-white font-bold py-4 rounded-xl hover:bg-[#000B20] transition-all shadow-lg hover:shadow-2xl">
                    Submit Order Request
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
