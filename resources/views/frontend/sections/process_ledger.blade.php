<section class="py-24 bg-surface-container-low overflow-hidden">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            <div class="lg:col-span-5">
                <h2 class="font-headline text-4xl font-bold text-primary mb-8 leading-tight">{{ $content['title'] ?? 'The Ledger of Achievement' }}</h2>
                <p class="text-on-surface-variant mb-8 leading-relaxed">
                    {{ $content['intro'] ?? '' }}
                </p>
                <div class="p-8 bg-white rounded-xl border-l-4 border-secondary shadow-sm">
                    <p class="text-on-surface italic leading-relaxed text-lg">
                        "{{ $content['testimonial_quote'] ?? '' }}"
                    </p>
                    <div class="mt-6 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-secondary"></div>
                        <div>
                            <p class="text-sm font-bold text-primary">{{ $content['testimonial_author'] ?? '' }}</p>
                            <p class="text-xs text-on-surface-variant">{{ $content['testimonial_role'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-7">
                <div class="space-y-12 relative before:content-[''] before:absolute before:left-[1.25rem] before:top-2 before:bottom-2 before:w-[2px] before:bg-outline-variant/30">
                    @foreach($content['steps'] ?? [] as $step)
                        <div class="relative pl-12">
                            <div class="absolute left-0 top-0 w-10 h-10 rounded-lg bg-[#FDC003] flex items-center justify-center text-on-secondary-container z-10 shadow-sm">
                                <span class="material-symbols-outlined text-xl">{{ $step['icon'] ?? 'check' }}</span>
                            </div>
                            <h4 class="font-headline text-xl font-bold text-primary mb-2">{{ $step['title'] ?? '' }}</h4>
                            <p class="text-on-surface-variant text-sm leading-relaxed">{{ $step['text'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
