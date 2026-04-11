<nav class="fixed top-0 w-full z-50 bg-[#000B20] backdrop-blur-xl">
    <div class="flex justify-between items-center px-12 h-20 w-full mx-auto max-w-screen-2xl">
        <a href="/" class="text-xl font-extrabold text-white tracking-tighter">
            {{ $siteSettings['site_name'] ?? 'The Scholarly Atelier' }}
        </a>
        
        <div class="hidden md:flex items-center gap-8 font-['Manrope'] font-semibold tracking-tight text-sm uppercase">
            @if($headerMenu)
                @foreach($headerMenu->items as $item)
                    <a class="{{ request()->is(ltrim($item->link, '/')) || (request()->is('/') && $item->link == '/') ? 'text-[#FDC003] border-b-2 border-[#785900]' : 'text-white/90' }} pb-1 transition-all duration-300 hover:text-[#FDC003]" 
                       href="{{ $item->link }}">
                        {{ $item->label }}
                    </a>
                @endforeach
            @endif
        </div>
        
        <div class="flex items-center gap-4">
            <a href="/contact-us" class="bg-[#FDC003] text-[#0D223F] px-6 py-2.5 rounded font-['Manrope'] font-bold text-sm tracking-wide uppercase active:scale-95 transition-transform">
                Start Your Dissertation
            </a>
            <button class="md:hidden text-white">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </div>
</nav>

