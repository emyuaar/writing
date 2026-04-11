@php
    $content = $section->content ?? [];
    $items = !empty($content['items']) ? $content['items'] : [];
@endphp

<section class="py-24 px-8 max-w-4xl mx-auto">
    <div class="mb-16">
        <h2 class="font-headline text-3xl font-bold text-navy mb-4 text-center">
            {{ $content['heading'] ?? 'Inquiries & Clarifications' }}
        </h2>
        <div class="h-1 w-24 bg-gold mx-auto rounded-full"></div>
    </div>

    <div class="space-y-4">
        @if(!empty($items))
            @foreach($items as $item)
                <details class="group bg-surface-container-low rounded-xl overflow-hidden border border-transparent hover:border-gold transition-colors">
                    <summary class="flex justify-between items-center p-6 cursor-pointer list-none">
                        <span class="font-headline font-bold text-navy">{{ $item['question'] ?? '' }}</span>
                        <span class="material-symbols-outlined group-open:rotate-180 transition-transform">expand_more</span>
                    </summary>
                    <div class="px-6 pb-6 text-on-surface-variant leading-relaxed">
                        {{ $item['answer'] ?? '' }}
                    </div>
                </details>
            @endforeach
        @endif
    </div>
</section>
