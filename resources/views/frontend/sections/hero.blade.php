@php
    $content = $section->content ?? [];
@endphp

<section class="relative min-h-[95vh] flex items-center bg-[#F4F1EE] overflow-hidden pt-32 lg:pt-0">
    <!-- Signature Editorial Backdrop -->
    <div
        class="absolute inset-0 bg-gradient-to-br from-[#ECE9E6]/30 via-transparent to-transparent opacity-60 pointer-events-none">
    </div>
    <div class="absolute top-0 right-0 w-1/3 h-full bg-primary/[0.015] hidden lg:block"></div>

    <!-- Atmospheric Atmospheric Layering -->
    <div
        class="absolute top-0 left-0 w-full h-[700px] bg-[radial-gradient(ellipse_at_top_left,rgba(13,34,63,0.03)_0%,transparent_70%)] pointer-events-none">
    </div>

    <div class="max-w-screen-2xl mx-auto px-8 lg:px-12 w-full pt-20 pb-20 relative z-10">
        <div class="grid lg:grid-cols-12 gap-8 lg:gap-0 items-center">

            <!-- Hero Composition (Text & Signature Block) -->
            <div
                class="lg:col-span-12 xl:col-span-12 flex flex-col lg:flex-row gap-12 lg:gap-24 items-start lg:items-center">

                <div class="lg:w-7/12 space-y-16" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">

                    <!-- 1. Dynamic Gold Badge -->
                    <div x-show="show" x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0 -translate-x-8"
                        x-transition:enter-end="opacity-100 translate-x-0">
                        @if(!empty($content['badge']))
                            <div
                                class="inline-flex items-center gap-3 px-5 py-2.5 bg-white border border-gold/20 rounded-full shadow-sm group">
                                <span class="w-1.5 h-1.5 bg-gold rounded-full animate-pulse"></span>
                                <span
                                    class="text-[10px] font-black tracking-[4px] uppercase text-primary/60 italic leading-none">
                                    {{ $content['badge'] }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- 2. Layered Typography (Main & Crimson Accent) -->
                    <div x-show="show" x-transition:enter="transition ease-out duration-1200 delay-100"
                        x-transition:enter-start="opacity-0 translate-y-12"
                        x-transition:enter-end="opacity-100 translate-y-0" class="relative">

                        <h1
                            class="text-6xl sm:text-7xl lg:text-[115px] xl:text-[130px] font-medium text-primary leading-[0.95] lg:leading-[0.85] tracking-[-0.04em] font-['Cormorant_Garamond'] relative z-10 w-full break-words">
                            {{ $content['title'] ?? 'Expert Research' }}
                        </h1>

                        @if(!empty($content['title_accent']))
                            <div class="mt-8 lg:mt-6 lg:ml-32 group">
                                <span
                                    class="text-crimson text-5xl sm:text-7xl xl:text-8xl font-normal italic font-['Cormorant_Garamond'] tracking-tight block transform rotate-[-2deg] opacity-90 group-hover:rotate-0 transition-transform duration-700">
                                    {{ $content['title_accent'] }}
                                </span>
                                <div class="w-24 lg:w-48 h-px bg-crimson/20 mt-4 mx-auto lg:mx-0"></div>
                            </div>
                        @endif
                    </div>

                    <!-- 3. Dynamic Subtitle -->
                    <div x-show="show" x-transition:enter="transition ease-out duration-1200 delay-200"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        class="lg:max-w-xl lg:ml-32">
                        <p
                            class="text-primary/60 text-lg lg:text-xl leading-[1.621] font-medium border-l-2 border-primary/5 pl-10">
                            {{ $content['subtitle'] ?? 'Elevate your doctoral journey with bespoke methodological oversight and editorial excellence.' }}
                        </p>
                    </div>

                    <!-- 4. Dynamic CTA Ensemble -->
                    <div x-show="show" x-transition:enter="transition ease-out duration-1200 delay-300"
                        x-transition:enter-start="opacity-0 translate-y-6"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="flex flex-col sm:flex-row flex-wrap gap-5 sm:gap-8 pt-8 lg:ml-32 items-start sm:items-center w-full">

                        @if(!empty($content['cta_primary_label']))
                            <a href="{{ $content['cta_primary_link'] ?? '#' }}"
                                class="group bg-primary text-white h-14 sm:h-16 px-8 sm:px-12 rounded-2xl font-bold text-[10px] sm:text-xs tracking-[4px] uppercase hover:gap-8 transition-all duration-500 shadow-[0_25px_50px_-12px_rgba(13,34,63,0.3)] flex items-center gap-6 w-full sm:w-auto justify-center sm:justify-start">
                                {{ $content['cta_primary_label'] }}
                                <span
                                    class="material-symbols-outlined text-gold transition-transform group-hover:translate-x-2">arrow_forward</span>
                            </a>
                        @endif

                        @if(!empty($content['cta_secondary_label']))
                            <a href="{{ $content['cta_secondary_link'] ?? '#' }}"
                                class="group text-primary font-black text-[11px] tracking-[4px] uppercase flex items-center gap-4 hover:text-gold transition-colors duration-300">
                                {{ $content['cta_secondary_label'] }}
                                <div
                                    class="w-10 h-px bg-primary/10 group-hover:bg-gold group-hover:w-14 transition-all duration-300">
                                </div>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Hero Imagery & Glass Insight (Asymmetrical Side) -->
                <div class="lg:w-5/12 relative mt-20 lg:mt-0" x-data="{ show: false }"
                    x-init="setTimeout(() => show = true, 400)">

                    <!-- The Studio Architectural Frame -->
                    <div x-show="show" x-transition:enter="transition ease-out duration-1500"
                        x-transition:enter-start="opacity-0 scale-95 blur-xl"
                        x-transition:enter-end="opacity-100 scale-100 blur-0" class="relative group">

                        <!-- Floating Glass Background Element -->
                        <div
                            class="absolute -inset-8 bg-white/20 backdrop-blur-3xl rounded-[60px] border border-white/40 -z-10">
                        </div>

                        <div
                            class="relative rounded-[50px] overflow-hidden shadow-[0_60px_100px_-20px_rgba(13,34,63,0.25)] border-4 border-white aspect-[4/5] xl:aspect-square transition-transform duration-1000">
                            <img src="{{ $content['image_url'] ?? 'https://images.unsplash.com/photo-1521791136064-7986c2959210?q=80&w=2670' }}"
                                alt="Editorial Research Office"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[6s] ease-out">
                            <div class="absolute inset-0 bg-primary/20 mix-blend-color opacity-30"></div>
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-primary/60 via-transparent to-transparent opacity-40">
                            </div>
                        </div>

                        <!-- The Signature Faculty Insight (Glass Module) -->
                        @if(!empty($content['advisor_name']))
                            <div x-show="show" x-transition:enter="transition ease-out duration-1200 delay-800"
                                x-transition:enter-start="opacity-0 translate-y-12"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="absolute -bottom-8 left-4 right-4 sm:-bottom-16 sm:left-auto sm:-left-12 lg:-left-32 xl:-left-40 bg-white/80 backdrop-blur-2xl p-6 sm:p-10 rounded-[30px] sm:rounded-[50px] shadow-[0_45px_100px_-15px_rgba(0,0,0,0.15)] border border-white/60 sm:max-w-[360px] z-20 hover:-translate-y-2 transition-transform duration-500 cursor-default">

                                <div class="flex gap-6 items-center mb-8">
                                    <div class="w-16 h-16 rounded-2xl overflow-hidden shadow-2xl ring-4 ring-white/50">
                                        <img src="{{ $content['advisor_image'] ?? 'https://i.pravatar.cc/200?u=faculty' }}"
                                            alt="{{ $content['advisor_name'] }}"
                                            class="w-full h-full object-cover grayscale-[30%]">
                                    </div>
                                    <div class="space-y-1">
                                        <h5 class="text-primary font-bold text-lg leading-none tracking-tight">
                                            {{ $content['advisor_name'] }}</h5>
                                        <p class="text-primary/70 text-[10px] font-black uppercase tracking-[4px]">
                                            {{ $content['advisor_role'] ?? 'Senior Research Advisor' }}</p>
                                    </div>
                                </div>

                                <div class="relative">
                                    <div
                                        class="absolute -top-6 -left-4 text-gold/10 text-7xl font-serif select-none pointer-events-none">
                                        “</div>
                                    <p
                                        class="text-primary/70 text-[15px] font-medium leading-relaxed italic relative z-10 line-clamp-3">
                                        {{ $content['advisor_quote'] ?? 'Our mission is to refine your vision into an authoritative scholarly contribution.' }}
                                    </p>
                                </div>

                                <!-- Signature Underline -->
                                <div class="mt-8 h-px w-12 bg-gold/30"></div>
                            </div>
                        @endif

                        <!-- Signature Scholarly Motif (Arched Text or Icon) -->
                        <div
                            class="absolute -top-12 -right-12 w-32 h-32 bg-gold rounded-full flex items-center justify-center -z-10 animate-spin-slow opacity-10 blur-sm">
                        </div>
                        <div
                            class="absolute -top-4 -right-4 w-12 h-12 bg-white rounded-full flex items-center justify-center border border-primary/5 shadow-xl z-20">
                            <span class="material-symbols-outlined text-primary text-xl">stylus</span>
                        </div>
                    </div>

                    <!-- Ambient Decorative Layering -->
                    <div class="absolute -top-24 -right-24 w-96 h-96 bg-gold/5 rounded-full blur-[100px] -z-20"></div>
                    <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-primary/5 rounded-full blur-[90px] -z-20">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .animate-spin-slow {
        animation: spin-slow 20s linear infinite;
    }
</style>