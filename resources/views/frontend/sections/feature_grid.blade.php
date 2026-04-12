@php
    $content = $section->content ?? [];
    $items = $content['items'] ?? [];
@endphp

<section class="py-32 px-8 lg:px-16 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="mb-20">
            <h2 class="font-headline text-4xl font-bold text-primary mb-6">
                {{ $content['heading'] ?? 'Strategic Features' }}
            </h2>
            @if($content['paragraph'])
                <p class="text-xl text-on-surface-variant max-w-2xl leading-relaxed">
                    {{ $content['paragraph'] }}
                </p>
            @endif
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $item)
                @php
                    $bgColor = 'bg-surface-container-low';
                    $textColor = 'text-primary';
                    $iconColor = 'text-secondary';
                    $subtextColor = 'text-on-surface-variant';

                    if (!empty($item['is_primary'])) {
                        $bgColor = 'bg-primary';
                        $textColor = 'text-white';
                        $iconColor = 'text-white';
                        $subtextColor = 'text-white/70';
                    } elseif (!empty($item['is_secondary'])) {
                        $bgColor = 'bg-secondary';
                        $textColor = 'text-secondary-container';
                        $iconColor = 'text-secondary-container';
                        $subtextColor = 'text-secondary-container/80';
                    }
                @endphp
                
                <div class="{{ $bgColor }} p-12 rounded-3xl border border-primary/5 transition-all duration-300 hover:scale-[1.02] hover:shadow-xl group">
                    <span class="material-symbols-outlined text-4xl {{ $iconColor }} mb-12 block transition-transform group-hover:scale-110">
                        {{ $item['icon'] ?? 'verified' }}
                    </span>
                    
                    <h3 class="font-headline text-lg font-bold {{ $textColor }} mb-4 tracking-tight">
                        {{ $item['title'] ?? '' }}
                    </h3>
                    
                    <p class="text-sm leading-relaxed {{ $subtextColor }}">
                        {{ $item['text'] ?? '' }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
