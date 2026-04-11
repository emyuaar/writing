@php
    $content = $section->content ?? [];
    $tags = !empty($content['mission_tags']) ? explode(',', $content['mission_tags']) : [];
@endphp

<section class="py-24 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Mission -->
            <div class="lg:col-span-8 bg-surface-container-lowest p-12 rounded flex flex-col justify-between group hover:shadow-lg transition-shadow">
                <div>
                    <div class="w-12 h-12 signature-gradient rounded flex items-center justify-center text-white mb-8">
                        <span class="material-symbols-outlined">auto_stories</span>
                    </div>
                    <h2 class="font-headline text-4xl font-bold text-primary mb-6">
                        {{ $content['mission_title'] ?? 'Our Mission' }}
                    </h2>
                    <p class="text-lg text-on-surface-variant leading-relaxed max-w-3xl">
                        {{ $content['mission_text'] ?? '' }}
                    </p>
                </div>
                
                @if(!empty($tags))
                    <div class="mt-12 flex gap-4 overflow-hidden">
                        @foreach($tags as $tag)
                            <div class="px-4 py-2 bg-surface-container rounded-full text-xs font-bold uppercase tracking-widest text-primary">
                                {{ trim($tag) }}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <!-- Vision -->
            <div class="lg:col-span-4 bg-primary p-12 rounded text-on-primary-container relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
                <div class="relative z-10">
                    <h2 class="font-headline text-3xl font-bold text-white mb-6">
                        {{ $content['vision_title'] ?? 'Our Vision' }}
                    </h2>
                    <p class="text-md leading-relaxed opacity-90 mb-8">
                        {{ $content['vision_text'] ?? '' }}
                    </p>
                    <hr class="border-white/20 mb-8"/>
                    <blockquote class="italic text-lg text-white">
                        {{ $content['vision_quote'] ?? '' }}
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>
