@extends('layouts.app')

@php
    $seo = [
        'title' => 'Our Dissertation & Academic Services',
        'description' => 'Explore our comprehensive range of doctoral-level academic services, from dissertation writing to professional editing and research support.'
    ];
@endphp

@section('content')
<!-- Hero Section -->
<header class="pt-40 pb-24 signature-gradient relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-gold rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-crimson rounded-full blur-[120px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10 text-center">
        <span class="inline-block py-1.5 px-4 mb-8 bg-gold/10 text-gold text-xs font-black tracking-widest uppercase rounded-full border border-gold/20">The Scholar's Toolkit</span>
        <h1 class="font-headline text-5xl md:text-8xl font-black text-white mb-8 tracking-tighter leading-tight">
            Elevating <span class="bg-gradient-to-r from-gold to-[#FFE082] bg-clip-text text-transparent">Academic</span> Standards
        </h1>
        <p class="text-xl md:text-2xl text-white/70 max-w-3xl mx-auto leading-relaxed font-light">
            From initial research proposals to final viva voce preparation, we provide the rigorous methodology and editorial precision your terminal degree requires.
        </p>
    </div>
</header>

<!-- Services by Category -->
<section class="py-32 bg-background">
    <div class="max-w-7xl mx-auto px-8">
        @foreach($categories as $category)
            @if($category->services->count() > 0)
                <div class="mb-32 last:mb-0">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 border-b border-primary/10 pb-8">
                        <div>
                            <h2 class="text-4xl md:text-5xl font-extrabold text-primary mb-4 tracking-tight">{{ $category->name }}</h2>
                            <p class="text-lg text-primary/60 max-w-2xl font-medium">{{ $category->description ?? 'Specialized support for your academic journey.' }}</p>
                        </div>
                        <div class="mt-6 md:mt-0 text-primary/40 font-black text-6xl opacity-10 hidden lg:block">
                            0{{ $loop->iteration }}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                        @foreach($category->services as $service)
                            <div class="group relative bg-white p-10 rounded-[40px] border border-primary/5 transition-all duration-500 hover:shadow-[0_40px_80px_-15px_rgba(13,34,63,0.1)] hover:-translate-y-2 flex flex-col justify-between overflow-hidden">
                                <!-- Hover Accent -->
                                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/2 rounded-bl-[100px] transition-all group-hover:bg-gold/10"></div>
                                
                                <div class="relative z-10">
                                    <div class="w-16 h-16 bg-background rounded-2xl flex items-center justify-center text-primary mb-10 shadow-sm border border-primary/5 group-hover:bg-primary group-hover:text-gold transition-all duration-500">
                                        <span class="material-symbols-outlined text-4xl">
                                            @if(str_contains(strtolower($category->name), 'writing'))
                                                edit_note
                                            @elseif(str_contains(strtolower($category->name), 'editing'))
                                                spellcheck
                                            @elseif(str_contains(strtolower($category->name), 'exam'))
                                                quiz
                                            @else
                                                auto_stories
                                            @endif
                                        </span>
                                    </div>
                                    <h3 class="font-headline text-2xl font-black text-primary mb-6 group-hover:text-primary transition-colors leading-tight">{{ $service->name }}</h3>
                                    <p class="text-primary/70 leading-relaxed text-base font-medium mb-8">
                                        {{ $service->short_description }}
                                    </p>
                                    
                                    @if($service->features)
                                        <ul class="space-y-3 mb-10">
                                            @foreach(array_slice($service->features, 0, 3) as $feature)
                                                <li class="flex items-center gap-3 text-sm text-primary/60 font-semibold italic">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-gold"></span>
                                                    {{ $feature }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                
                                <div class="relative z-10 mt-auto pt-10 border-t border-primary/5 flex items-center justify-between">
                                    <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-2 font-extrabold text-sm uppercase tracking-widest text-primary hover:text-gold transition-colors">
                                        Exploration Area 
                                        <span class="material-symbols-outlined text-base transition-transform group-hover:translate-x-2">arrow_right_alt</span>
                                    </a>
                                    @if($service->is_featured)
                                        <span class="text-[10px] font-black uppercase tracking-[2px] text-white bg-crimson px-3 py-1.5 rounded-full shadow-lg">Featured</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>

@include('frontend.sections.cta_banner', [
    'content' => [
        'title' => 'Ready to Commencing Your Research?',
        'subtitle' => 'Our lead advisors are standing by to review your proposal and research objectives.',
        'button_text' => 'Initiate Consultation',
        'button_link' => '/contact-us'
    ]
])
@endsection
