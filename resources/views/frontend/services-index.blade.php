@extends('layouts.app')

@section('content')
<header class="pt-40 pb-20 bg-surface">
    <div class="max-w-7xl mx-auto px-8 text-center">
        <span class="inline-block py-1 px-3 mb-6 bg-secondary text-on-secondary text-xs font-bold tracking-widest uppercase rounded">Expert Solutions</span>
        <h1 class="font-headline text-5xl md:text-7xl font-extrabold text-primary mb-8 tracking-tighter">
            Our Academic <span class="text-secondary italic">Services</span>
        </h1>
        <p class="text-xl text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
            From initial proposal to final defense, we provide the rigorous methodology and editorial precision your research deserves.
        </p>
    </div>
</header>

<section class="pb-32 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="group relative bg-[#F2F3FF] p-10 rounded-3xl border border-outline-variant/10 transition-all duration-300 hover:shadow-2xl hover:scale-[1.02] flex flex-col justify-between min-h-[400px]">
                    <div>
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-primary mb-8 shadow-sm group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-3xl">school</span>
                        </div>
                        <h3 class="font-headline text-2xl font-bold text-primary mb-4">{{ $service->name }}</h3>
                        <p class="text-on-surface-variant leading-relaxed text-sm">
                            {{ $service->short_description }}
                        </p>
                    </div>
                    
                    <div class="mt-10 flex items-center justify-between">
                        <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-2 font-bold text-primary group-hover:text-secondary transition-colors">
                            View Details 
                            <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                        </a>
                        @if($service->is_featured)
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#BA1A1A] bg-red-100 px-2 py-1 rounded">Popular</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-20">
            {{ $services->links() }}
        </div>
    </div>
</section>

@include('frontend.sections.cta', [
    'content' => [
        'title' => 'Need a Custom Solution?',
        'text' => 'We handle unique research challenges. Describe your project to our lead advisors.',
        'button_text' => 'Initiate Consultation',
        'button_link' => '/contact-us'
    ]
])
@endsection
