@php
    $content = $section->content ?? [];
    $testimonials = !empty($content['items']) ? $content['items'] : [];
@endphp

<section class="py-24 px-8 max-w-7xl mx-auto">
    <div class="flex justify-between items-end mb-16">
        <div>
            <h2 class="font-headline text-3xl font-bold text-navy mb-4">
                {{ $content['heading'] ?? 'Academic Success Stories' }}
            </h2>
            <p class="text-on-surface-variant">
                {{ $content['paragraph'] ?? 'Join thousands of students who achieved their PhD with our support.' }}
            </p>
        </div>
        <div class="hidden md:flex gap-4">
            <button class="w-12 h-12 rounded border border-outline-variant flex items-center justify-center hover:bg-navy hover:text-white transition-all">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <button class="w-12 h-12 rounded border border-outline-variant flex items-center justify-center hover:bg-navy hover:text-white transition-all">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        @if(!empty($testimonials))
            @foreach($testimonials as $item)
                <div class="bg-surface-container-low p-8 rounded">
                    <div class="flex text-gold mb-4">
                        @for($i = 0; $i < (int)($item['rating'] ?? 5); $i++)
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        @endfor
                    </div>
                    <p class="text-on-surface italic mb-8">
                        "{{ $item['text'] ?? '' }}"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-slate-200"></div>
                        <div>
                            <p class="font-bold text-sm">{{ $item['name'] ?? '' }}</p>
                            <p class="text-xs text-on-surface-variant">{{ $item['role'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
