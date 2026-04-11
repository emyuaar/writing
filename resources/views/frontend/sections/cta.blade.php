<section class="px-8 pb-24">
    <div class="max-w-7xl mx-auto signature-gradient rounded p-12 lg:p-20 text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-[#FDC003]/5 rounded-full -mr-32 -mt-32"></div>
        <div class="relative z-10">
            <h2 class="text-4xl lg:text-6xl font-extrabold text-white mb-6">
                {{ $content['title'] ?? 'Invest in Your Future' }}
            </h2>
            <p class="text-white/80 text-xl lg:text-2xl mb-12 max-w-2xl mx-auto font-medium">
                {{ $content['text'] ?? 'Secure your academic milestone with a tailored advisory plan.' }}
            </p>
            
            <form action="{{ route('inquiry.store') }}" method="POST" class="max-w-md mx-auto bg-white/10 p-6 rounded-lg backdrop-blur-sm">
                @csrf
                <input type="hidden" name="type" value="cta">
                <div class="flex flex-col gap-4">
                    <input type="text" name="name" placeholder="Your Name" class="bg-white/10 border-white/20 text-white placeholder:text-white/50 rounded p-3" required>
                    <input type="email" name="email" placeholder="Email Address" class="bg-white/10 border-white/20 text-white placeholder:text-white/50 rounded p-3" required>
                    <button type="submit" class="bg-[#FDC003] text-[#0D223F] px-10 py-4 rounded font-bold text-xl hover:scale-105 transition-transform shadow-2xl">
                        {{ $content['button_text'] ?? 'Claim Your Discount Now' }}
                    </button>
                </div>
            </form>
            
            @if(session('success'))
                <p class="mt-4 text-[#FDC003] font-bold">{{ session('success') }}</p>
            @endif
        </div>
    </div>
</section>
