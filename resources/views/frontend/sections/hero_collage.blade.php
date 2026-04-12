@php
    $content = $section->content ?? [];
    $actions = $content['actions'] ?? [];
    $stats = $content['stats'] ?? [];
    $images = $content['images'] ?? [];
@endphp

<section class="w-full overflow-hidden bg-white py-24 lg:py-44 relative">
    <!-- Atmospheric Atmospheric Backdrop -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_30%,rgba(13,34,63,0.02)_0%,transparent_60%)] pointer-events-none"></div>

    <div class="max-w-screen-2xl mx-auto px-8 lg:px-16 grid grid-cols-1 items-center gap-16 lg:grid-cols-2 lg:gap-24 relative z-10">
        
        <!-- Left Column: Content -->
        <div class="flex flex-col items-center text-center lg:items-start lg:text-left space-y-10"
             x-data="{ show: false }" 
             x-init="setTimeout(() => show = true, 100)">
            
            <div x-show="show" 
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 translate-y-12"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="space-y-6">
                
                <h1 class="text-5xl lg:text-7xl xl:text-8xl font-medium text-primary leading-[1.1] tracking-[-0.03em] font-['Cormorant_Garamond']">
                    {!! nl2br(e($content['title'] ?? 'A new way to learn & get knowledge')) !!}
                </h1>
                
                <p class="max-w-md text-lg lg:text-xl text-primary/50 leading-relaxed font-medium lg:ml-2">
                    {{ $content['subtitle'] ?? 'Our atelier provides various courses and materials from skilled doctoral experts all around the world.' }}
                </p>
            </div>

            <!-- Action Ensemble -->
            <div x-show="show" 
                 x-transition:enter="transition ease-out duration-1000 delay-200"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="flex flex-wrap justify-center gap-6 lg:justify-start lg:ml-2">
                @if(count($actions) > 0)
                    @foreach($actions as $action)
                        @if(($action['variant'] ?? 'primary') === 'primary')
                            <a href="{{ $action['link'] ?? '#' }}" 
                               class="bg-primary text-white h-14 px-10 rounded-2xl font-bold text-xs tracking-[3px] uppercase flex items-center shadow-xl hover:shadow-primary/20 transition-all duration-300">
                                {{ $action['text'] }}
                            </a>
                        @else
                            <a href="{{ $action['link'] ?? '#' }}" 
                               class="border border-primary/10 text-primary h-14 px-10 rounded-2xl font-bold text-xs tracking-[3px] uppercase flex items-center hover:bg-primary/5 transition-all duration-300">
                                {{ $action['text'] }}
                            </a>
                        @endif
                    @endforeach
                @else
                    <a href="#" class="bg-primary text-white h-14 px-10 rounded-2xl font-bold text-xs tracking-[3px] uppercase flex items-center shadow-xl">Join the Class</a>
                    <a href="#" class="border border-primary/10 text-primary h-14 px-10 rounded-2xl font-bold text-xs tracking-[3px] uppercase flex items-center">Learn More</a>
                @endif
            </div>

            <!-- Stats Module -->
            <div x-show="show" 
                 x-transition:enter="transition ease-out duration-1000 delay-400"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="flex flex-wrap justify-center gap-12 lg:justify-start pt-8 lg:ml-2">
                @if(count($stats) > 0)
                    @foreach($stats as $stat)
                        <div class="flex items-center gap-4 group">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/[0.03] group-hover:bg-primary transition-colors duration-500">
                                <span class="material-symbols-outlined text-primary group-hover:text-gold transition-colors">
                                    {{ $stat['icon'] ?? 'groups' }}
                                </span>
                            </div>
                            <div class="space-y-0.5">
                                <p class="text-2xl font-bold text-primary tracking-tight leading-none">{{ $stat['value'] }}</p>
                                <p class="text-[10px] font-black uppercase tracking-[3px] text-primary/30">{{ $stat['label'] }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex items-center gap-4 group">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/[0.03]">
                            <span class="material-symbols-outlined text-primary">groups</span>
                        </div>
                        <div class="space-y-0.5">
                            <p class="text-2xl font-bold text-primary tracking-tight leading-none">15.2K</p>
                            <p class="text-[10px] font-black uppercase tracking-[3px] text-primary/30">Active Students</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Right Column: Image Collage -->
        <div class="relative h-[450px] w-full sm:h-[600px] lg:scale-110 xl:scale-125"
             x-data="{ show: false }" 
             x-init="setTimeout(() => show = true, 400)">
            
            <!-- Animated Floating Shapes -->
            <div class="absolute -top-4 left-1/4 h-20 w-20 rounded-full bg-gold/10 blur-xl animate-float"></div>
            <div class="absolute bottom-10 right-1/4 h-16 w-16 rounded-3xl bg-crimson/5 blur-xl animate-float-delayed"></div>

            <!-- Collage Architecture -->
            @for($i = 0; $i < 3; $i++)
                @php
                    $imgUrl = $images[$i]['url'] ?? match($i) {
                        0 => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1000',
                        1 => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=1000',
                        2 => 'https://plus.unsplash.com/premium_photo-1663054774427-55adfb2be76f?q=80&w=1000',
                    };
                    $styles = [
                        0 => 'absolute left-1/2 top-0 h-48 w-48 sm:h-72 sm:w-72 -translate-x-1/2 z-20',
                        1 => 'absolute right-0 top-1/3 h-40 w-40 sm:h-64 sm:w-64 z-30',
                        2 => 'absolute bottom-4 left-0 h-32 w-32 sm:h-56 sm:w-56 z-10'
                    ];
                    $transitions = [
                        0 => 'duration-1000 delay-0',
                        1 => 'duration-1000 delay-200',
                        2 => 'duration-1000 delay-400'
                    ];
                @endphp
                <div x-show="show" 
                     x-transition:enter="transition ease-out {{ $transitions[$i] }}"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="{{ $styles[$i] }} p-3 bg-white shadow-[0_32px_64px_-16px_rgba(13,34,63,0.2)] rounded-[40px] border border-primary/5 hover:scale-105 transition-transform duration-700">
                    <div class="w-full h-full rounded-[30px] overflow-hidden grayscale-[20%] hover:grayscale-0 transition-all duration-700">
                        <img src="{{ $imgUrl }}" 
                             alt="Collage Image {{ $i + 1 }}" 
                             class="w-full h-full object-cover">
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-float-delayed { animation: float 8s ease-in-out infinite 1s; }
</style>
