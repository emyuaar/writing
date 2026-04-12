<nav x-data="{ 
    mobileMenuOpen: false,
    scrolled: false
}" @scroll.window="scrolled = (window.pageYOffset > 50)" :class="{
    'bg-[#0D223F] h-20 shadow-2xl border-b border-gold/10 backdrop-blur-md': scrolled,
    'bg-white/72 h-24 shadow-sm border-b border-white/40 backdrop-blur-3xl': !scrolled
}" class="fixed top-0 w-full z-50 transition-all duration-700 ease-in-out">
    <div class="flex justify-between items-center px-8 lg:px-16 w-full mx-auto max-w-screen-2xl h-full">
        <!-- Logo Architecture -->
        <a href="/" class="relative flex items-center h-20 w-48 md:w-72">
            <!-- Top State Logo (Colored) -->
            <img src="{{ asset('storage/images/Online-Dissertation.png') }}"
                alt="{{ $siteSettings['site_name'] ?? 'Online Dissertation Advisors' }}"
                :class="scrolled ? 'opacity-0 -translate-x-4 scale-95' : 'opacity-100 translate-x-0 scale-100'"
                class="absolute left-0 h-full w-auto object-contain transition-all duration-700 ease-in-out z-20">

            <!-- Scrolled State Logo (White) -->
            <img src="{{ asset('storage/images/ODA-white.png') }}"
                alt="{{ $siteSettings['site_name'] ?? 'Online Dissertation Advisors' }}"
                :class="scrolled ? 'opacity-100 translate-x-0 scale-100' : 'opacity-0 -translate-x-4 scale-95'"
                class="absolute left-0 h-full w-auto object-contain transition-all duration-700 ease-in-out z-10">
        </a>

        <!-- Central Academic Directory -->
        <div class="hidden lg:flex items-center gap-12 font-['Manrope'] font-bold tracking-[3.5px] text-[11px] uppercase transition-colors duration-700"
            :class="scrolled ? 'text-white/80' : 'text-[#0D223F]'">
            @if($headerMenu)
                @foreach($headerMenu->items as $item)
                    @if(str_contains(strtolower($item->label), 'service'))
                        <!-- Mega Menu Trigger -->
                        <div class="group relative h-full flex items-center">
                            <a class="flex items-center gap-2 group-hover:text-gold transition-all relative py-2"
                                :class="{ 'text-gold': {{ request()->is(ltrim($item->link, '/')) ? 'true' : 'false' }} }"
                                href="{{ $item->link }}">
                                {{ $item->label }}
                                <span
                                    class="material-symbols-outlined text-[16px] transition-transform group-hover:rotate-180 opacity-40">expand_more</span>
                                <span
                                    class="absolute bottom-0 left-0 w-0 h-[1.5px] bg-gold transition-all duration-500 group-hover:w-full"
                                    :class="{ 'w-full': {{ request()->is(ltrim($item->link, '/')) ? 'true' : 'false' }} }"></span>
                            </a>

                            <!-- Mega Menu Content -->
                            <div
                                class="invisible group-hover:visible opacity-0 group-hover:opacity-100 absolute top-full left-1/2 -translate-x-1/2 w-[900px] bg-white rounded-3xl shadow-[0_50px_100px_-20px_rgba(13,34,63,0.3)] border border-primary/5 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0 overflow-hidden z-50">
                                <div class="grid grid-cols-12">
                                    <div class="col-span-4 bg-primary p-12 text-white">
                                        <h4
                                            class="text-gold text-[11px] font-black tracking-[4px] uppercase mb-6 italic opacity-60">
                                            Academic Focus</h4>
                                        <h3 class="text-3xl font-bold mb-6 leading-[1.2] font-['Cormorant_Garamond']">Elevating
                                            Global Research Standards</h3>
                                        <p class="text-white/50 text-xs leading-relaxed mb-10 font-medium">
                                            Specialized methodological and editorial oversight for doctorate candidates seeking the
                                            terminal contribution.
                                        </p>
                                        <a href="/services"
                                            class="inline-flex items-center gap-3 text-gold text-[11px] font-black uppercase tracking-[3px] group/link border-b border-gold/20 pb-1">
                                            View Directory
                                            <span
                                                class="material-symbols-outlined text-xs transition-transform group-hover/link:translate-x-2">arrow_forward</span>
                                        </a>
                                    </div>
                                    <div class="col-span-8 p-12 bg-white">
                                        <div class="grid grid-cols-2 gap-12 text-primary">
                                            @foreach($serviceCategories->take(4) as $category)
                                                <div>
                                                    <h5
                                                        class="text-primary/30 text-[11px] font-black tracking-[3px] uppercase mb-6 border-b border-primary/5 pb-2">
                                                        {{ $category->name }}
                                                    </h5>
                                                    <ul class="space-y-4">
                                                        @foreach($category->services->take(4) as $service)
                                                            <li>
                                                                <a href="{{ route('services.show', $service->slug) }}"
                                                                    class="group/item flex items-center gap-3">
                                                                    <div
                                                                        class="w-1 h-1 rounded-full bg-gold/30 transition-all group-hover/item:w-3 group-hover/item:bg-crimson">
                                                                    </div>
                                                                    <span
                                                                        class="font-bold text-[11px] tracking-wider opacity-70 hover:opacity-100 transition-opacity">{{ $service->name }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="relative py-2 transition-all duration-500 hover:text-gold group"
                            :class="{ 'text-gold': {{ request()->is(ltrim($item->link, '/')) ? 'true' : 'false' }} }"
                            href="{{ $item->link }}">
                            {{ $item->label }}
                            <span
                                class="absolute bottom-0 left-0 w-0 h-[1.5px] bg-gold transition-all duration-500 group-hover:w-full"
                                :class="{ 'w-full': {{ request()->is(ltrim($item->link, '/')) ? 'true' : 'false' }} }"></span>
                        </a>
                    @endif
                @endforeach
            @endif
        </div>

        <!-- Call to Action Architecture -->
        <div class="flex items-center gap-8">
            <a href="/contact-us"
                class="hidden sm:inline-block px-8 py-3.5 rounded-xl font-['Manrope'] font-bold text-[10px] tracking-[3px] uppercase transition-all shadow-xl active:scale-95 border"
                :class="scrolled ? 'bg-gold text-primary border-transparent hover:bg-white shadow-gold/20' : 'bg-primary text-gold border-primary/10 hover:bg-[#1A3352] shadow-primary/10'">
                Initiate Venture
            </a>
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 transition-colors duration-500"
                :class="scrolled ? 'text-white' : 'text-primary'">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        class="md:hidden p-8 border-t border-white/5 shadow-2xl"
        :class="scrolled ? 'bg-primary text-white' : 'bg-white text-primary'">
        <div class="space-y-6">
            @if($headerMenu)
                @foreach($headerMenu->items as $item)
                    <a class="block text-lg font-bold hover:text-gold transition-colors"
                        href="{{ $item->link }}">{{ $item->label }}</a>
                @endforeach
            @endif
        </div>
    </div>
</nav>