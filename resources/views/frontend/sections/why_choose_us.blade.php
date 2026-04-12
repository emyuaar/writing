@php
    $content = $section->content ?? [];
@endphp

<section class="relative py-24 sm:py-32 lg:py-44 bg-white overflow-hidden">
    <!-- Subtle Scholarly Atmosphere -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_30%,rgba(13,34,63,0.02)_0%,transparent_60%)] pointer-events-none"></div>

    <div class="max-w-screen-2xl mx-auto px-8 lg:px-16 relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 sm:gap-16 lg:gap-24 items-center">
            
            <!-- Credibility Narrative -->
            <div class="lg:col-span-6 space-y-16" 
                 x-data="{ show: false }" 
                 x-init="setTimeout(() => show = true, 200)">
                
                <div x-show="show" 
                     x-transition:enter="transition ease-out duration-1200"
                     x-transition:enter-start="opacity-0 translate-y-12"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-8">
                    
                    <div x-show="show" 
                         x-transition:enter="transition ease-out duration-1000"
                         x-transition:enter-start="opacity-0 -translate-x-8"
                         x-transition:enter-end="opacity-100 translate-x-0">
                        <div class="inline-flex items-center gap-3 px-5 py-2.5 bg-white border border-gold/20 rounded-full shadow-sm group">
                            <span class="w-1.5 h-1.5 bg-gold rounded-full animate-pulse"></span>
                            <span class="text-[10px] font-black tracking-[4px] uppercase text-primary/60 italic leading-none">
                                Credibility Standards
                            </span>
                        </div>
                    </div>

                    <h2 class="text-5xl lg:text-7xl font-medium text-primary leading-[1.1] tracking-[-0.03em] font-['Cormorant_Garamond']">
                        {{ $content['heading'] ?? 'Professional Academic Excellence' }}
                    </h2>

                    <p class="text-primary/60 text-lg lg:text-xl leading-relaxed max-w-xl font-medium border-l-2 border-gold/20 pl-8">
                        {{ $content['paragraph'] ?? 'Empowering doctoral candidates through rigorous methodological oversight and scholarly integrity.' }}
                    </p>
                </div>

                <!-- Credibility Pillars (Repeater) -->
                <div x-show="show" 
                     x-transition:enter="transition ease-out duration-1200 delay-300"
                     x-transition:enter-start="opacity-0 translate-y-12"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="grid sm:grid-cols-2 gap-x-12 gap-y-14 pt-4">
                    
                    @if(!empty($content['highlights']))
                        @foreach($content['highlights'] as $highlight)
                            <div class="group">
                                <div class="w-14 h-14 rounded-2xl bg-primary/[0.03] flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all duration-500 shadow-sm border border-primary/5">
                                    <span class="material-symbols-outlined text-primary group-hover:text-gold transition-colors duration-500">
                                        {{ $highlight['icon'] ?? 'verified' }}
                                    </span>
                                </div>
                                <h4 class="text-primary font-bold text-lg mb-3 tracking-tight">{{ $highlight['title'] ?? 'PhD Verification' }}</h4>
                                <p class="text-primary/50 text-sm leading-relaxed font-medium">
                                    {{ $highlight['text'] ?? 'All advisors hold terminal degrees from internationally recognized research institutions.' }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <!-- Defaults if empty -->
                        <div class="group">
                            <div class="w-14 h-14 rounded-2xl bg-primary/[0.03] flex items-center justify-center mb-6">
                                <span class="material-symbols-outlined text-primary">school</span>
                            </div>
                            <h4 class="text-primary font-bold text-lg mb-3 tracking-tight">PhD Foundations</h4>
                            <p class="text-primary/50 text-sm leading-relaxed font-medium">Guided by active faculty and senior research strategists.</p>
                        </div>
                        <div class="group">
                            <div class="w-14 h-14 rounded-2xl bg-primary/[0.03] flex items-center justify-center mb-6">
                                <span class="material-symbols-outlined text-primary">policy</span>
                            </div>
                            <h4 class="text-primary font-bold text-lg mb-3 tracking-tight">Methodological Rigor</h4>
                            <p class="text-primary/50 text-sm leading-relaxed font-medium">Meticulous alignment with UK academic standards and ethical frameworks.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Visual Proof & Performance Metric -->
            <div class="lg:col-span-6 relative" 
                 x-data="{ show: false }" 
                 x-init="setTimeout(() => show = true, 500)">
                
                <div x-show="show" 
                     x-transition:enter="transition ease-out duration-1500"
                     x-transition:enter-start="opacity-0 translate-x-16"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     class="relative">
                    
                    <!-- Luxury Studio Frame -->
                    <div class="relative p-4 bg-[#F4F1EE] rounded-[50px] border border-primary/5 shadow-inner">
                        <div class="relative overflow-hidden rounded-[40px] shadow-2xl aspect-[4/5] xl:aspect-square group">
                            <img src="{{ $content['image_url'] ?? asset('storage/images/academic-excellence.png') }}" 
                                 alt="Academic Excellence" 
                                 class="w-full h-full object-cover grayscale-[20%] group-hover:scale-105 transition-transform duration-[5s] ease-out">
                            <div class="absolute inset-0 bg-primary/10 mix-blend-multiply pointer-events-none"></div>
                        </div>
                    </div>

                    <!-- Signature Excellence Badge -->
                    @if(!empty($content['stat_value']))
                        <div class="absolute -top-6 -right-2 sm:-top-10 sm:-right-10 bg-primary text-white p-6 sm:p-10 rounded-[30px] sm:rounded-[40px] shadow-[0_45px_100px_-15px_rgba(13,34,63,0.3)] border border-white/10 text-center transform hover:-translate-y-2 transition-transform duration-500 max-w-[150px] sm:max-w-none">
                            <div class="space-y-1">
                                <p class="text-4xl sm:text-5xl font-medium text-gold font-['Cormorant_Garamond'] leading-none">{{ $content['stat_value'] }}</p>
                                <p class="text-[8px] sm:text-[9px] font-black uppercase tracking-[2px] sm:tracking-[4px] opacity-60 leading-tight pt-1 pb-2">
                                    {{ $content['stat_label'] ?? 'Success Rate' }}
                                </p>
                            </div>
                            <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-white/10">
                                <span class="material-symbols-outlined text-gold text-xl sm:text-2xl">verified</span>
                            </div>
                        </div>
                    @endif

                    <!-- Scholarly Decorative Accents -->
                    <div class="absolute -bottom-16 -right-16 w-64 h-64 bg-primary/[0.02] rounded-full blur-[80px] -z-10"></div>
                    <div class="absolute top-1/2 -left-12 w-24 h-24 bg-gold/5 rounded-full blur-[40px] -z-10"></div>
                </div>
            </div>
        </div>
    </div>
</section>
