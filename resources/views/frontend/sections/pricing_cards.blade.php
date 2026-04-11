@php
    $content = $section->content ?? [];
    $cards = !empty($content['cards']) ? $content['cards'] : [];
@endphp

<section class="max-w-7xl mx-auto px-8 mb-32">
    <div class="mb-20 text-center md:text-left">
        <div class="grid md:grid-cols-12 gap-12 items-end">
            <div class="md:col-span-8">
                <h4 class="text-secondary font-bold tracking-widest uppercase text-sm mb-4">
                    {{ $content['heading'] ?? 'Investment Tiers' }}
                </h4>
                <p class="text-on-surface-variant text-xl max-w-2xl leading-relaxed">
                    {{ $content['paragraph'] ?? '' }}
                </p>
            </div>
            @if(!empty($content['availability_text']))
                <div class="md:col-span-4 flex justify-end">
                    <div class="bg-surface-container-low p-4 rounded-xl inline-flex items-center gap-3">
                        <span class="w-3 h-3 rounded-full bg-secondary animate-pulse"></span>
                        <span class="font-label font-medium text-sm text-on-surface-variant">
                            {{ $content['availability_text'] }}
                        </span>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @if(!empty($cards))
            @foreach($cards as $card)
                @php
                    $isFeatured = $card['is_featured'] ?? false;
                @endphp
                <div class="{{ $isFeatured ? 'relative bg-white scale-105 z-10 shadow-[0_12px_40px_rgba(21,27,45,0.06)] border border-primary/10' : 'bg-surface-container-low border border-transparent hover:border-outline-variant/20 hover:shadow-xl' }} rounded-xl p-8 flex flex-col h-full transition-all duration-500">
                    @if($isFeatured)
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gold text-navy px-6 py-1 rounded-full text-xs font-bold tracking-widest uppercase">Most Preferred</div>
                    @endif
                    
                    <div class="mb-8 {{ $isFeatured ? 'mt-4' : '' }}">
                        <h3 class="font-headline text-2xl font-bold mb-2">{{ $card['name'] ?? '' }}</h3>
                        <p class="text-on-surface-variant text-sm h-12">{{ $card['description'] ?? '' }}</p>
                    </div>
                    
                    <div class="mb-8 flex items-baseline gap-1">
                        <span class="text-primary font-black {{ $isFeatured ? 'text-5xl' : 'text-4xl' }}">{{ $card['price'] ?? '$0' }}</span>
                        @if(!empty($card['price']))
                            <span class="text-on-surface-variant font-medium">/mo</span>
                        @endif
                    </div>
                    
                    <ul class="space-y-4 mb-12 flex-grow">
                        @php
                            $features = !empty($card['features']) ? explode("\n", $card['features']) : [];
                        @endphp
                        @foreach($features as $feature)
                            @if(trim($feature))
                                <li class="flex items-center gap-3 text-sm font-medium">
                                    <span class="material-symbols-outlined text-primary text-xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    {{ trim($feature) }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    
                    <a href="{{ $card['button_link'] ?? '#' }}" 
                       class="w-full py-4 text-center rounded-lg font-bold transition-all duration-300 {{ $isFeatured ? 'bg-navy text-white shadow-lg shadow-navy/20' : 'bg-surface-container-highest text-navy hover:bg-navy hover:text-white' }}">
                        {{ $card['button_label'] ?? 'Enroll Now' }}
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</section>
