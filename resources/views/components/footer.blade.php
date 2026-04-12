<footer class="bg-[#000B20] dark:bg-[#000B20] w-full py-12 sm:py-16 px-6 md:px-12 border-t-[0.5px] border-white/10 font-['Manrope']">
    <div class="max-w-screen-2xl mx-auto flex flex-col gap-12">
        <div class="flex flex-col md:flex-row justify-between items-start w-full gap-8">
            <div class="flex flex-col items-start gap-4">
                <a href="/" class="group block relative">
                    <img src="{{ asset('storage/images/ODA-white.png') }}"
                        alt="{{ $siteSettings['site_name'] ?? 'Online Dissertation Advisors' }}" 
                        class="h-10 sm:h-14 w-auto object-contain transition-opacity duration-300 group-hover:opacity-80">
                </a>
                <p class="font-manrope text-sm tracking-wide text-white/60 max-w-sm">
                    {{ $siteSettings['footer_about'] ?? 'A bespoke consultancy for the modern academic and distinguished researcher.' }}
                </p>
            </div>
            <div class="flex flex-wrap flex-col sm:flex-row gap-4 sm:gap-8 w-full md:w-auto">
                @if($footerMenu)
                    @foreach($footerMenu->items as $item)
                        <a class="text-white/60 hover:text-white transition-colors font-manrope text-sm tracking-wide"
                            href="{{ $item->link }}">
                            {{ $item->label }}
                        </a>
                    @endforeach
                @else
                    <a class="text-white/60 hover:text-white transition-colors font-manrope text-sm tracking-wide"
                        href="#">Privacy Policy</a>
                    <a class="text-white/60 hover:text-white transition-colors font-manrope text-sm tracking-wide"
                        href="#">Terms of Service</a>
                    <a class="text-white/60 hover:text-white transition-colors font-manrope text-sm tracking-wide"
                        href="#">Academic Integrity</a>
                    <a class="text-[#FDC003] underline underline-offset-4 font-manrope text-sm tracking-wide mt-2 sm:mt-0"
                        href="/contact-us">Contact</a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 pt-12 border-t border-white/5">
            <div>
                <h5 class="text-[#FDC003] font-bold mb-6 text-sm uppercase tracking-widest">Academic Strategy</h5>
                <ul class="space-y-4">
                    <li><a class="text-white/60 hover:text-white transition-colors text-sm" href="#">Dissertation
                            Aid</a></li>
                    <li><a class="text-white/60 hover:text-white transition-colors text-sm" href="#">Grant Writing</a>
                    </li>
                </ul>
            </div>
            <div>
                <h5 class="text-[#FDC003] font-bold mb-6 text-sm uppercase tracking-widest">Global Faculty</h5>
                <ul class="space-y-4">
                    <li><a class="text-white/60 hover:text-white transition-colors text-sm" href="#">Editorial
                            Standards</a></li>
                    <li><a class="text-white/60 hover:text-white transition-colors text-sm" href="#">Peer Review
                            Support</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-[#FDC003] font-bold mb-6 text-sm uppercase tracking-widest">Connect</h5>
                <ul class="space-y-4 text-sm text-white/60">
                    <li class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-xs">mail</span>
                        {{ $siteSettings['contact_email'] ?? 'office@scholarlyatelier.com' }}
                    </li>
                    <li class="flex items-center gap-2 text-tertiary font-bold">
                        <span class="material-symbols-outlined text-xs">verified</span>
                        Privacy First Office
                    </li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 text-center md:text-left">
            <p class="font-manrope text-sm tracking-wide text-white/40">
                © {{ date('Y') }} {{ $siteSettings['site_name'] ?? 'The Scholarly Atelier' }}. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>