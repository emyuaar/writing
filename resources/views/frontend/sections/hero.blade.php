@php
    $content = $section->content ?? [];
@endphp

<section class="relative px-8 py-20 lg:py-32 max-w-7xl mx-auto grid lg:grid-cols-12 gap-12 items-center">
    <div class="lg:col-span-7 z-10">
        @if(!empty($content['badge']))
            <span class="inline-block px-4 py-1.5 rounded bg-gold text-navy font-label text-xs font-bold tracking-widest uppercase mb-6">
                {{ $content['badge'] }}
            </span>
        @endif
        
        <h1 class="font-headline text-5xl lg:text-7xl font-extrabold text-navy leading-[1.1] mb-6">
            {{ $content['title'] ?? 'Expert Dissertation Help' }}
            @if(!empty($content['title_accent']))
                <span class="text-crimson">{{ $content['title_accent'] }}</span>
            @endif
        </h1>
        
        <p class="text-on-surface-variant text-lg lg:text-xl leading-relaxed max-w-2xl mb-10">
            {{ $content['subtitle'] ?? '' }}
        </p>
        
        <div class="flex flex-wrap gap-4 mb-12">
            @if(!empty($content['cta_primary_label']))
                <a href="{{ $content['cta_primary_link'] ?? '#' }}" class="bg-gold text-navy px-8 py-4 rounded font-bold text-lg hover:shadow-lg transition-all">
                    {{ $content['cta_primary_label'] }}
                </a>
            @endif
            
            @if(!empty($content['cta_secondary_label']))
                <a href="{{ $content['cta_secondary_link'] ?? '#' }}" class="bg-surface-container-high text-navy px-8 py-4 rounded font-bold text-lg hover:bg-surface-container-highest transition-all">
                    {{ $content['cta_secondary_label'] }}
                </a>
            @endif
        </div>
        
        <div class="flex flex-wrap gap-8">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-crimson" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                <span class="font-label text-sm font-semibold">Plagiarism Free</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-crimson" style="font-variation-settings: 'FILL' 1;">school</span>
                <span class="font-label text-sm font-semibold">PhD Experts Only</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-crimson" style="font-variation-settings: 'FILL' 1;">lock</span>
                <span class="font-label text-sm font-semibold">100% Confidential</span>
            </div>
        </div>
    </div>
    
    <div class="lg:col-span-5 relative">
        <div class="aspect-[4/5] rounded overflow-hidden shadow-2xl relative">
            <img alt="PhD Advisory" class="w-full h-full object-cover" 
                 src="{{ $content['image_url'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuBBg9_cRp8AVK_q6fCgZcaLLgRjG-9e_0XZgCps7gQxSQXZllbpujgeoZHe3psO40N43PYjyYWJG7F4l0LXA3Hx0RQJ3v5UgWtm9jgRkn8H9Bxjzs1O5GMDjwwp-o6S7BmBBo8CgLhszzFL2_B-T5qHylDwLQHhDkGhJdjTBk2kngTTriYAgJdaHzTIHRksj7xtsyjkTKCbJT3VUArQzw5pTCQ6GvoNZeVJkAwQW7wuIbROBVmy7Bv2WR-K1VcFMZnUB35_madA0t0' }}">
            <div class="absolute inset-0 signature-gradient mix-blend-multiply opacity-20"></div>
        </div>
        
        <!-- Floating Faculty Glass Card -->
        @if(!empty($content['advisor_name']))
            <div class="absolute -bottom-8 -left-8 glass-card p-6 rounded shadow-xl border border-white/20 max-w-[280px]">
                <div class="flex gap-4 items-center mb-3">
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-surface-container">
                        <img alt="{{ $content['advisor_name'] }}" 
                             src="{{ $content['advisor_image'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuDJK1Rhu8DMyTWLJCH5QZukV_Le809J8_tzGsl_0a2x3ALxZV40kyGecITqkYGLa040qILwCPdj8xcTWx9aIquI4-Hi3Wgf9qnaxVn_OCBCsOn9VMwPtYlQMcX56-ye0v6RJ3rzABuN2jlg1kDce3LNidscfv8WYj9USI2M8mn83b2JPZzMTQop29KezqGd-Ej3DnaaMxVPD_9PES-_EGcoD0frVF3owxooXl2GdO65uSxFYtFVAKspg_3GlnRfEa8vP0gadaM5USU' }}">
                    </div>
                    <div>
                        <p class="font-headline font-bold text-sm text-navy leading-tight">{{ $content['advisor_name'] }}</p>
                        <p class="font-label text-[10px] uppercase tracking-wider text-on-surface-variant">{{ $content['advisor_role'] ?? 'Lead Research Strategist' }}</p>
                    </div>
                </div>
                <p class="text-xs italic text-on-surface-variant">{{ $content['advisor_quote'] ?? '' }}</p>
            </div>
        @endif
    </div>
</section>
