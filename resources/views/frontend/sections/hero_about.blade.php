@php
    $content = $section->content ?? [];
@endphp

<header class="relative pt-40 pb-24 overflow-hidden bg-surface">
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-7 z-10">
            @if(!empty($content['badge']))
                <span class="inline-block py-1 px-3 rounded bg-secondary-container text-on-secondary-container text-xs font-bold tracking-widest uppercase mb-6">
                    {{ $content['badge'] }}
                </span>
            @endif
            
            <h1 class="font-headline text-5xl md:text-7xl font-extrabold text-primary leading-tight tracking-tighter mb-8">
                @php
                    $titleWords = explode(' ', $content['title'] ?? 'Elevating Research into');
                @endphp
                {{ $content['title'] ?? 'Elevating Research into' }} 
                @if(!empty($content['title_italic']))
                    <span class="text-secondary italic">{{ $content['title_italic'] }}</span>
                @endif
            </h1>
            
            <p class="text-xl text-on-surface-variant leading-relaxed max-w-2xl">
                {{ $content['subtitle'] ?? '' }}
            </p>
        </div>
        
        <div class="lg:col-span-5 relative">
            <div class="aspect-[4/5] rounded overflow-hidden shadow-2xl relative z-0">
                <img class="w-full h-full object-cover" 
                     src="{{ $content['image_url'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAoje5weV3d7jENut3ainxRhkPPeo_d58HGDxtCiiFHgDOXCoKjXdzjodgZ_GmQ6S1jLw_mJJSlY3umwwHD8dwUZdGh6KNrIR3Pg9ruQo-nKUWjdxb1dnGUFwxmd-90cUvEX26TvJ5pZ_dOwZlBx-uLr21Xk3tnIxYi47mGKkCZ0aeNzEoRSu33ALwOs6qrd3OvRRzyIkuwbSLASd2prX3JhUXVQpt4ku5gjOICfHEnCPZS-9ZDbAhmhrroAWGrBUDZ55_UM8cuRKA' }}">
            </div>
            
            @if(!empty($content['stat_label']))
                <div class="absolute -bottom-6 -left-6 glass-card p-8 rounded shadow-xl max-w-xs border border-white/20">
                    <p class="font-headline font-bold text-primary text-lg mb-2">{{ $content['stat_label'] }}</p>
                    <p class="text-sm text-on-surface-variant italic leading-snug">{{ $content['stat_text'] ?? '' }}</p>
                </div>
            @endif
        </div>
    </div>
</header>
