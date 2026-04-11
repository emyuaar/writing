<section class="max-w-7xl mx-auto px-8 py-24">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
        <!-- Contact Form Section (7 Columns) -->
        <div class="lg:col-span-7 bg-white rounded-xl p-8 md:p-12 border border-outline/10 shadow-sm">
            <div class="mb-10">
                <h2 class="font-headline text-3xl font-bold text-primary mb-2">{{ $content['form_title'] ?? 'Send a Brief' }}</h2>
                <p class="text-on-surface-variant">{{ $content['form_subtitle'] ?? '' }}</p>
            </div>
            <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex flex-col gap-2">
                        <label class="font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant ml-1">Full Name</label>
                        <input name="name" class="w-full bg-surface-container-low border border-outline/20 rounded-lg p-4 focus:ring-2 focus:ring-primary/20 focus:border-primary text-on-surface transition-all" placeholder="Johnathan Sterling" type="text" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant ml-1">Academic Email</label>
                        <input name="email" class="w-full bg-surface-container-low border border-outline/20 rounded-lg p-4 focus:ring-2 focus:ring-primary/20 focus:border-primary text-on-surface transition-all" placeholder="sterling@university.edu" type="email" required />
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant ml-1">Subject of Interest</label>
                    <select name="subject" class="w-full bg-surface-container-low border border-outline/20 rounded-lg p-4 focus:ring-2 focus:ring-primary/20 focus:border-primary text-on-surface transition-all">
                        <option value="Dissertation Consultancy">Dissertation Consultancy</option>
                        <option value="Editorial Review">Editorial Review</option>
                        <option value="Institutional Research">Institutional Research</option>
                        <option value="Other Scholarly Inquiry">Other Scholarly Inquiry</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label text-xs font-bold uppercase tracking-widest text-on-surface-variant ml-1">The Message</label>
                    <textarea name="message" class="w-full bg-surface-container-low border border-outline/20 rounded-lg p-4 focus:ring-2 focus:ring-primary/20 focus:border-primary text-on-surface transition-all" placeholder="Please describe the nature of your inquiry in detail..." rows="5" required></textarea>
                </div>
                <div class="pt-4">
                    <button class="w-full md:w-auto bg-secondary text-on-secondary px-10 py-4 rounded-lg font-bold text-sm tracking-widest uppercase hover:opacity-90 active:scale-95 transition-all shadow-lg flex items-center justify-center gap-3" type="submit">
                        Submit Inquiry
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Info & Map Section (5 Columns) -->
        <aside class="lg:col-span-5 space-y-12">
            <div class="grid grid-cols-1 gap-8">
                @foreach($content['contact_info'] ?? [] as $info)
                    <div class="group flex gap-6 items-start p-6 rounded-xl hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-outline/10">
                        <div class="w-12 h-12 rounded-lg bg-primary text-secondary flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined">{{ $info['icon'] ?? 'mail' }}</span>
                        </div>
                        <div>
                            <h3 class="font-headline font-bold text-lg text-primary">{{ $info['label'] ?? '' }}</h3>
                            <p class="text-on-surface-variant whitespace-pre-line">{{ $info['value'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($content['map_image'] ?? false)
                <!-- Interactive Map Placeholder -->
                <div class="relative rounded-xl overflow-hidden shadow-sm h-80 bg-surface-container group border border-outline/10">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" src="{{ $content['map_image'] }}" alt="Map">
                    <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors"></div>
                    <div class="absolute bottom-6 left-6 right-6 p-4 bg-white/90 backdrop-blur-md rounded-lg border border-primary/10 flex justify-between items-center">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-primary">Location</p>
                            <p class="font-headline font-bold">{{ $content['location_name'] ?? 'Oxford District' }}</p>
                        </div>
                        <a class="w-10 h-10 rounded-lg bg-primary text-secondary flex items-center justify-center shadow-md hover:scale-110 transition-transform" href="#">
                            <span class="material-symbols-outlined text-sm">directions</span>
                        </a>
                    </div>
                </div>
            @endif
        </aside>
    </div>
</section>
