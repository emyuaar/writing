@php
    $content = $section->content ?? [];
@endphp

<section class="bg-surface-container py-24 px-8 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="font-headline text-3xl font-bold text-navy mb-4">
                {{ $content['heading'] ?? 'Your Path to Excellence' }}
            </h2>
            <p class="text-on-surface-variant">
                {{ $content['paragraph'] ?? 'A transparent, four-step journey to your academic success.' }}
            </p>
        </div>
        
        <div class="relative flex flex-col md:flex-row justify-between items-start gap-8 md:gap-4">
            <!-- Connector Line -->
            <div class="hidden md:block absolute top-8 left-0 w-full h-0.5 bg-outline-variant/30 -z-10"></div>
            
            @if(!empty($content['steps']))
                @foreach($content['steps'] as $index => $step)
                    <div class="flex-1 flex flex-col items-center text-center">
                        <div class="w-16 h-16 rounded-full {{ $index === 0 ? 'bg-gold' : 'bg-surface-container-highest border-2 border-outline-variant' }} text-navy flex items-center justify-center font-bold text-xl mb-6 shadow-lg z-10 transition-colors">
                            {{ $step['number'] ?? ($index + 1) }}
                        </div>
                        <h4 class="font-headline font-bold text-lg mb-2">{{ $step['title'] ?? '' }}</h4>
                        <p class="text-sm text-on-surface-variant px-4">{{ $step['text'] ?? '' }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
