@php
    $content = $section->content ?? [];
@endphp

<section class="bg-[#F6F8FF] py-16 sm:py-24 px-4 sm:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="mb-16">
            <h2 class="font-headline text-3xl font-bold text-[#151B2D] mb-4">
                {{ $content['heading'] ?? 'Our Services' }}
            </h2>
            <div class="w-16 h-1 bg-gold"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-1">
            @if(!empty($content['items']))
                @foreach($content['items'] as $index => $item)
                    @php
                        // Grid layout logic to match image pattern
                        // 1: md:col-span-8, 2: md:col-span-4, 3: md:col-span-4, 4: md:col-span-8
                        $span = ($index % 4 == 0 || $index % 4 == 3) ? 'md:col-span-8' : 'md:col-span-4';
                        $isDark = $item['is_dark'] ?? false;
                    @endphp
                    
                    <div class="{{ $span }} {{ $isDark ? 'bg-[#0B1E3B] text-white' : 'bg-white text-[#151B2D]' }} p-8 sm:p-12 border border-[#E2E8F0] min-h-[auto] sm:min-h-[320px] relative overflow-hidden flex flex-col justify-between">
                        <div>
                            <span class="material-symbols-outlined text-3xl {{ $isDark ? 'text-gold' : 'text-[#151B2D]' }} mb-8" style="font-variation-settings: 'wght' 700;">
                                {{ $item['icon'] ?? 'history_edu' }}
                            </span>
                            <h3 class="font-headline text-2xl font-bold mb-6">{{ $item['title'] ?? '' }}</h3>
                            <p class="{{ $isDark ? 'text-white/80' : 'text-[#475569]' }} leading-relaxed max-w-xl">
                                {{ $item['text'] ?? '' }}
                            </p>
                        </div>
                        
                        <div class="mt-8">
                            @if($isDark)
                                <a href="{{ $item['link'] ?? '#' }}" class="bg-gold text-[#0B1E3B] px-8 py-3 rounded font-bold hover:brightness-110 inline-block text-sm">
                                    {{ $item['button_label'] ?? 'Priority Support' }}
                                </a>
                                <!-- Watermark Graduation Cap -->
                                <div class="absolute right-[-20px] bottom-[-20px] opacity-10 select-none pointer-events-none">
                                    <span class="material-symbols-outlined text-[180px]" style="font-variation-settings: 'wght' 200;">
                                        school
                                    </span>
                                </div>
                            @else
                                @if(!empty($item['link_label']))
                                    <a class="text-[#151B2D] font-bold text-sm inline-flex items-center gap-2 hover:gap-4 transition-all" href="{{ $item['link'] ?? '#' }}">
                                        {{ $item['link_label'] }} <span class="material-symbols-outlined text-gold font-bold">arrow_forward</span>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
