<section class="bg-[#f2f3ff] py-24 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-[#0D223F] mb-4">{{ $content['title'] ?? 'Our Services' }}</h2>
            <div class="w-20 h-1.5 bg-[#FDC003] rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            @php
                $services = \App\Models\Service::where('is_published', true)->limit(4)->get();
            @endphp
            
            @foreach($services as $index => $service)
                <div class="{{ $index % 3 == 0 ? 'md:col-span-8' : 'md:col-span-4' }} bg-white p-8 rounded shadow-sm hover:shadow-md transition-shadow">
                    <span class="material-symbols-outlined text-4xl text-[#0D223F] mb-6">history_edu</span>
                    <h3 class="text-2xl font-bold mb-4">{{ $service->name }}</h3>
                    <p class="text-[#434655] leading-relaxed mb-6">{{ $service->short_description }}</p>
                    <a class="text-[#0D223F] font-bold inline-flex items-center gap-2 hover:gap-4 transition-all" href="/services/{{ $service->slug }}">
                        Explore Service <span class="material-symbols-outlined text-[#FDC003]">arrow_forward</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
