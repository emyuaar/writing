@extends('layouts.app')

@section('content')
<section class="relative min-h-[95vh] flex items-center bg-[#F4F1EE] overflow-hidden">
    <!-- Atmospheric Atmospheric Layering: Depth and Contrast anchoring -->
    <div class="absolute inset-0 bg-gradient-to-tr from-[#ECE9E6]/50 via-transparent to-transparent opacity-80"></div>
    <div class="absolute top-0 left-0 w-full h-[600px] bg-[radial-gradient(ellipse_at_top_left,rgba(13,34,63,0.04)_0%,transparent_70%)] pointer-events-none"></div>

    <!-- Fine-line Accent: Architectural Brand marker -->
    <div class="absolute top-0 right-[25%] bottom-0 w-px bg-primary/5 hidden lg:block"></div>

    <div class="max-w-screen-2xl mx-auto px-8 lg:px-12 w-full pt-44 pb-24">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <!-- Hero Composition (Text Block) -->
            <div class="space-y-12 relative z-10" 
                 x-data="{ show: false }" 
                 x-init="setTimeout(() => show = true, 200)">
                
                <div x-show="show" 
                     x-transition:enter="transition ease-out duration-1200"
                     x-transition:enter-start="opacity-0 translate-y-12"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-8">
                    
                    <div class="flex items-center gap-4 text-xs font-bold tracking-[4px] uppercase text-primary/40 italic">
                        <span class="w-8 h-px bg-gold/40"></span>
                        THE SCHOLARLY ATELIER | EST. 2008
                    </div>

                    <h1 class="text-7xl lg:text-[100px] font-medium text-primary leading-[0.9] tracking-[-0.03em] font-['Cormorant_Garamond']">
                        Elevating <br>
                        <span class="italic font-normal">Global Research</span> <br>
                        <span class="text-gold tracking-[0.05em] uppercase text-[15px] font-black font-['Manrope'] block pt-4">to the Atelier Standard</span>
                    </h1>

                    <p class="text-primary/70 text-lg lg:text-xl leading-relaxed max-w-xl font-medium border-l-2 border-gold/10 pl-8">
                        Specialized methodological and editorial oversight for doctorate candidates and distinguished scholarly practitioners seeking the terminal contribution.
                    </p>
                </div>

                <div x-show="show" 
                     x-transition:enter="transition ease-out duration-1200 delay-300"
                     x-transition:enter-start="opacity-0 translate-y-6"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="flex flex-wrap gap-8 pt-6">
                    <a href="/services" class="group bg-primary text-white px-12 py-5 rounded-2xl font-bold text-xs tracking-[3px] uppercase hover:bg-white hover:text-primary transition-all duration-500 shadow-2xl shadow-primary/30 border border-primary/10 flex items-center gap-4">
                        Consult the Directory
                        <span class="material-symbols-outlined text-gold transition-transform group-hover:translate-x-1">arrow_forward</span>
                    </a>
                    
                    <div class="flex items-center gap-12">
                        <div class="h-10 w-px bg-primary/10"></div>
                        <div class="space-y-1">
                            <span class="text-primary text-lg font-bold block leading-none tracking-tight">Global</span>
                            <span class="text-primary/30 text-[9px] font-black uppercase tracking-[3px]">Faculty Network</span>
                        </div>
                    </div>
                </div>

                <!-- Verified Authority Status -->
                <div x-show="show" 
                     x-transition:enter="transition ease-out duration-1200 delay-500"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     class="pt-16 flex items-center gap-4">
                    <div class="flex -space-x-3">
                        @for($i=1; $i<=4; $i++)
                            <img src="https://i.pravatar.cc/100?u={{$i}}" class="w-10 h-10 rounded-full border-2 border-[#F4F1EE] shadow-sm">
                        @endfor
                        <div class="w-10 h-10 rounded-full border-2 border-[#F4F1EE] bg-white flex items-center justify-center text-primary/40 text-[10px] font-bold">+9k</div>
                    </div>
                    <span class="text-[10px] font-bold tracking-[2px] uppercase text-primary/40">
                        Candidates Guided to Completion
                    </span>
                </div>
            </div>

            <!-- Hero Composition (Image / Editorial Frame) -->
            <div class="relative" 
                 x-data="{ show: false }" 
                 x-init="setTimeout(() => show = true, 400)">
                
                <!-- The Editorial Standard Frame -->
                <div x-show="show" 
                     x-transition:enter="transition ease-out duration-1200"
                     x-transition:enter-start="opacity-0 scale-95 blur-sm"
                     x-transition:enter-end="opacity-100 scale-100 blur-0"
                     class="relative z-10 p-4 bg-white/30 backdrop-blur-sm rounded-[40px] border border-white/50 shadow-2xl overflow-hidden group">
                    
                    <div class="relative overflow-hidden rounded-[30px] shadow-inner">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2959210?q=80&w=2670" 
                             alt="Luxury Academic Guidance" 
                             class="w-full aspect-[4/5] lg:aspect-square object-cover grayscale-[20%] group-hover:scale-105 transition-transform duration-[3s]">
                        
                        <!-- Rich Signature Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/30 via-transparent to-transparent pointer-events-none"></div>
                    </div>
                </div>

                <!-- Decorative Atmospheric Accents -->
                <div class="absolute -top-12 -right-12 w-96 h-96 bg-gold/5 rounded-full blur-[100px] -z-10 animate-pulse"></div>
                <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-primary/5 rounded-full blur-[80px] -z-10"></div>
                
                <!-- Floating Decorative Seal -->
                <div class="absolute -bottom-8 -right-8 w-24 h-24 bg-white/80 backdrop-blur-md rounded-full shadow-2xl flex items-center justify-center border border-primary/5 z-20">
                    <span class="material-symbols-outlined text-gold/60 text-4xl">verified_user</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional sections can follow here -->
@endsection
