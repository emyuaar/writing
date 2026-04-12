@php
    $content = $section->content ?? [];
    $badge = $content['badge'] ?? 'Research Excellence';
    $title = $content['title'] ?? '';
    $subtitle = $content['subtitle'] ?? '';
    $image = $content['image_url'] ?? '';
    $formTitle = $content['form_title'] ?? 'Reserve Your Consultant';
    $formSubtitle = $content['form_subtitle'] ?? 'Personalized support for bespoke research.';
    $formButton = $content['form_button'] ?? 'Initiate Consultation';
@endphp

<section class="relative pt-48 pb-32 overflow-hidden bg-surface">
    <!-- Background Visual -->
    <div class="absolute inset-0 z-0">
        @if($image)
            <img src="{{ $image }}" alt="Bespoke Research" class="w-full h-full object-cover opacity-5">
        @endif
        <div class="absolute inset-0 bg-gradient-to-b from-surface via-transparent to-surface"></div>
    </div>

    <div class="max-w-7xl mx-auto px-8 lg:px-16 relative z-10">
        <div class="grid lg:grid-cols-12 gap-16 items-start">
            
            <!-- Left: Strategic Content -->
            <div class="lg:col-span-7 pt-8">
                <span class="inline-flex items-center gap-2 py-1.5 px-3 mb-8 bg-secondary/10 border border-secondary/20 rounded-full">
                    <span class="w-1.5 h-1.5 bg-secondary rounded-full"></span>
                    <span class="text-[10px] font-bold tracking-[2px] uppercase text-secondary">{{ $badge }}</span>
                </span>

                <h1 class="font-headline text-5xl lg:text-7xl font-bold text-primary leading-[1.1] mb-10">
                    {!! nl2br(e($title)) !!}
                </h1>

                <div class="max-w-xl">
                    <p class="text-xl text-on-surface-variant leading-relaxed mb-12">
                        {!! nl2br(e($subtitle)) !!}
                    </p>

                    @if($content['cta_label'])
                        <a href="{{ $content['cta_link'] }}" class="inline-flex items-center gap-3 text-primary font-bold uppercase tracking-[2px] text-xs hover:gap-5 transition-all">
                            {{ $content['cta_label'] }}
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    @endif
                </div>

                <!-- Trust Badges (Academic Identity) -->
                <div class="mt-20 pt-10 border-t border-outline-variant/30 flex flex-wrap gap-12">
                    <div class="flex items-center gap-4 opacity-40">
                        <span class="material-symbols-outlined text-3xl">school</span>
                        <span class="text-[10px] font-bold tracking-widest uppercase">Ph.D. Faculty</span>
                    </div>
                    <div class="flex items-center gap-4 opacity-40">
                        <span class="material-symbols-outlined text-3xl">shield_person</span>
                        <span class="text-[10px] font-bold tracking-widest uppercase">NDA Protected</span>
                    </div>
                    <div class="flex items-center gap-4 opacity-40">
                        <span class="material-symbols-outlined text-3xl">terminal</span>
                        <span class="text-[10px] font-bold tracking-widest uppercase">Methodology Experts</span>
                    </div>
                </div>
            </div>

            <!-- Right: Premium Consultation Form -->
            <div class="lg:col-span-5">
                <div class="bg-white rounded-[40px] shadow-[0_50px_100px_-20px_rgba(13,34,63,0.15)] border border-primary/5 p-10 lg:p-12 relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="font-headline text-3xl font-bold text-primary mb-2">{{ $formTitle }}</h3>
                        <p class="text-on-surface-variant text-sm mb-10">{{ $formSubtitle }}</p>

                        <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="subject" value="Elite Service Inquiry: {{ $title }}">
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-primary/40 mb-2 ml-1">Full Name</label>
                                    <input name="name" type="text" required placeholder="Alexander Hamilton"
                                        class="w-full bg-[#F8FAFF] border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-secondary/20 transition-all">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-primary/40 mb-2 ml-1">Email</label>
                                    <input name="email" type="email" required placeholder="name@oxford.ac.uk"
                                        class="w-full bg-[#F8FAFF] border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-secondary/20 transition-all">
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-primary/40 mb-2 ml-1">Academic Level</label>
                                    <select name="academic_level" class="w-full bg-[#F8FAFF] border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-secondary/20 transition-all appearance-none cursor-pointer">
                                        <option>Postgraduate</option>
                                        <option>Doctorate (PhD)</option>
                                        <option>Undergraduate</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-primary/40 mb-2 ml-1">Deadline</label>
                                    <input name="deadline" type="text" placeholder="Q3 2026"
                                        class="w-full bg-[#F8FAFF] border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-secondary/20 transition-all">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-primary/40 mb-2 ml-1">Research Discipline</label>
                                <input name="subject" type="text" placeholder="Sociology / Computer Science"
                                    class="w-full bg-[#F8FAFF] border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-secondary/20 transition-all">
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-primary/40 mb-2 ml-1">Project Brief</label>
                                <textarea name="message" rows="4" required placeholder="Briefly describe your dissertation topic or requirements..."
                                    class="w-full bg-[#F8FAFF] border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-secondary/20 transition-all resize-none"></textarea>
                            </div>

                            <button type="submit" class="w-full bg-secondary text-secondary-container py-5 rounded-2xl font-black text-xs uppercase tracking-[3px] shadow-xl hover:scale-[1.02] active:scale-[0.98] transition-all">
                                {{ $formButton }}
                            </button>
                        </form>
                        
                        <p class="mt-8 text-[10px] text-center text-on-surface-variant/60 leading-relaxed uppercase tracking-widest px-8">
                            By submitting, you agree to our strictly confidential processing protocols.
                        </p>
                    </div>

                    <!-- Subtle Advisor Peek -->
                    <div class="mt-12 pt-8 border-t border-outline-variant/30 flex items-center gap-5">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150&h=150&fit=crop" class="w-12 h-12 rounded-full grayscale opacity-70 object-cover" alt="Advisor">
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-secondary">Available Lead Advisor</p>
                            <p class="font-headline font-bold text-primary text-sm">Dr. Julian Vance</p>
                            <p class="text-[9px] text-on-surface-variant uppercase tracking-widest">Philosophy & Ethics Specialty</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
