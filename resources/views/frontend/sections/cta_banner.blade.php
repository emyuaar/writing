@php
    $content = $section->content ?? [];
@endphp

<section class="max-w-7xl mx-auto px-8 mb-32">
    <div class="relative bg-primary rounded-3xl p-12 md:p-20 overflow-hidden text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-12 border border-white/10">
        <div class="absolute inset-0 opacity-10">
            <img alt="Abstract scholarly pattern" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCs5dX2cHp_ABOkh8IkaUg4M-3BvJbdrDQ7bGTtVC-o62KZJfH6WjPpyzJGiGsfjhIrEf8poLYAoSi_BKWxJYJsGGGtqpvTd09ceqqGXptIh9YjmRSRISl7fKUthZ8OtUxuneL9oDhZdh0aLHMCl7DPvAll1BkM2fYdFPrf-Nar6deoMi62oTTeetKaZa4szk3i2bNTJKeIFJl4E8kPSsknmv1jye8cHMu-vIYPKZYWlGY5Ksqoy02lAGLLWVnRmOIbMdib4FYirnY">
        </div>
        
        <div class="relative z-10 max-w-2xl">
            <h2 class="font-headline text-4xl md:text-5xl font-black text-white leading-tight">
                {{ $content['heading'] ?? 'Elevate your research to the Atelier Standard.' }}
            </h2>
            <p class="mt-6 text-lg text-white/80">
                {{ $content['paragraph'] ?? 'Every masterpiece begins with a conversation. Let\'s discuss your contribution to academia.' }}
            </p>
        </div>
        
        <div class="relative z-10 flex flex-col sm:flex-row gap-4">
            @if(!empty($content['cta_primary_label']))
                <a href="{{ $content['cta_primary_link'] ?? '#' }}" class="bg-gold text-navy px-10 py-5 rounded font-manrope font-bold text-sm tracking-wide uppercase shadow-xl hover:scale-105 active:scale-95 transition-transform">
                    {{ $content['cta_primary_label'] }}
                </a>
            @endif
            
            @if(!empty($content['cta_secondary_label']))
                <a href="{{ $content['cta_secondary_link'] ?? '#' }}" class="bg-white/10 text-white backdrop-blur-sm px-10 py-5 rounded font-manrope font-bold text-sm tracking-wide uppercase border border-white/20 hover:bg-white/20 transition-colors">
                    {{ $content['cta_secondary_label'] }}
                </a>
            @endif
        </div>
    </div>
</section>
