@extends('layouts.app')

@php
    $seo = [
        'title' => 'Contact Our Academic Advisory Team',
        'description' => 'Get in touch with The Scholarly Atelier for specialized dissertation support, research consulting, and doctoral-level academic services.'
    ];
@endphp

@section('content')
<!-- Hero Section -->
<header class="pt-40 pb-24 bg-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary rounded-full blur-[150px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-12">
            <div class="max-w-2xl">
                <span class="inline-block py-1.5 px-4 mb-8 bg-primary/5 text-primary text-xs font-black tracking-widest uppercase rounded-full border border-primary/10">Global Advisory</span>
                <h1 class="font-headline text-5xl md:text-8xl font-black text-primary mb-8 tracking-tighter leading-tight italic">
                    Open Your <span class="text-gold not-italic underline decoration-crimson underline-offset-8">Dialogue</span>
                </h1>
                <p class="text-xl md:text-2xl text-primary/60 leading-relaxed font-medium">
                    Whether you are drafting your first proposal or finishing your final chapter, our advisors are here to provide the rigorous support you need.
                </p>
            </div>
            
            <div class="hidden lg:block">
                <div class="w-64 h-64 bg-background rounded-[60px] border-4 border-primary/5 shadow-2xl flex items-center justify-center -rotate-6 transition-transform hover:rotate-0 duration-500">
                    <span class="material-symbols-outlined text- primary text-9xl opacity-20">forum</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Contact Content -->
<section class="py-32 bg-background border-t border-primary/5">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid lg:grid-cols-12 gap-24">
            <!-- Contact Info -->
            <div class="lg:col-span-5 space-y-16">
                <div>
                    <h3 class="text-xs font-black text-primary/40 uppercase tracking-[4px] mb-10">Channel Matrix</h3>
                    <div class="space-y-12">
                        <div class="group flex items-start gap-8">
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-primary shadow-sm border border-primary/5 group-hover:bg-primary group-hover:text-gold transition-all duration-500">
                                <span class="material-symbols-outlined text-3xl">mail</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-black text-primary mb-2 uppercase tracking-tight">Academic Inquiries</h4>
                                <a href="mailto:advisors@scholarlyatelier.com" class="text-xl font-bold text-primary/60 hover:text-gold transition-colors">advisors@scholarlyatelier.com</a>
                                <p class="mt-2 text-sm text-primary/40 font-semibold italic">Response within 4 academic hours</p>
                            </div>
                        </div>

                        <div class="group flex items-start gap-8">
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-primary shadow-sm border border-primary/5 group-hover:bg-primary group-hover:text-gold transition-all duration-500">
                                <span class="material-symbols-outlined text-3xl">call</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-black text-primary mb-2 uppercase tracking-tight">Direct Consultation</h4>
                                <a href="tel:+1800SCHOLAR" class="text-xl font-bold text-primary/60 hover:text-gold transition-colors">+1 (800) SCHOLAR</a>
                                <p class="mt-2 text-sm text-primary/40 font-semibold italic">Mon-Fri: 09:00 - 18:00 GMT</p>
                            </div>
                        </div>

                        <div class="group flex items-start gap-8">
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-primary shadow-sm border border-primary/5 group-hover:bg-primary group-hover:text-gold transition-all duration-500">
                                <span class="material-symbols-outlined text-3xl">location_on</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-black text-primary mb-2 uppercase tracking-tight">Global Headquarters</h4>
                                <address class="not-italic text-xl font-bold text-primary/60 leading-relaxed">
                                    Oxford Science Park,<br>
                                    Oxford, OX4 4GA,<br>
                                    United Kingdom
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Global Presence -->
                <div class="bg-primary p-10 rounded-[40px] text-white overflow-hidden relative group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gold/10 rounded-bl-[100px] transition-all group-hover:scale-150 duration-700"></div>
                    <h4 class="text-2xl font-black mb-6 relative z-10">Global Research Network</h4>
                    <p class="text-white/60 font-medium mb-8 relative z-10 leading-relaxed">
                        We maintain active advisory hubs in London, New York, and Singapore to ensure 24/7 support for terminal degree candidates worldwide.
                    </p>
                    <div class="flex gap-4 relative z-10">
                        <span class="px-4 py-2 bg-white/5 rounded-full text-xs font-bold tracking-widest uppercase border border-white/10">London</span>
                        <span class="px-4 py-2 bg-white/5 rounded-full text-xs font-bold tracking-widest uppercase border border-white/10">NY</span>
                        <span class="px-4 py-2 bg-white/5 rounded-full text-xs font-bold tracking-widest uppercase border border-white/10">Singapore</span>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-7">
                <div class="bg-white p-12 lg:p-16 rounded-[60px] shadow-[0_40px_100px_-20px_rgba(13,34,63,0.1)] border border-primary/5">
                    <div class="mb-12">
                        <h2 class="text-4xl font-black text-primary mb-4 tracking-tight">Initiate <span class="text-gold italic">Inquiry</span></h2>
                        <p class="text-lg text-primary/60 font-medium">Please provide your research context below. A lead advisor will be assigned to your case.</p>
                    </div>

                    @if(session('success'))
                        <div class="bg-primary text-gold p-6 rounded-3xl mb-8 flex items-center gap-4 shadow-xl animate-pulse">
                            <span class="material-symbols-outlined text-2xl">check_circle</span>
                            <span class="font-black uppercase tracking-widest text-sm text-white">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-xs font-black text-primary/40 uppercase tracking-widest pl-2">Formal Name</label>
                                <input type="text" name="name" class="w-full bg-background border border-primary/5 rounded-2xl p-4 focus:ring-2 focus:ring-gold outline-none transition-all font-bold placeholder:text-primary/20" placeholder="Dr. Candidate" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs font-black text-primary/40 uppercase tracking-widest pl-2">Academic Email</label>
                                <input type="email" name="email" class="w-full bg-background border border-primary/5 rounded-2xl p-4 focus:ring-2 focus:ring-gold outline-none transition-all font-bold placeholder:text-primary/20" placeholder="candidate@university.edu" required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-xs font-black text-primary/40 uppercase tracking-widest pl-2">Subject of Inquiry</label>
                            <input type="text" name="subject" class="w-full bg-background border border-primary/5 rounded-2xl p-4 focus:ring-2 focus:ring-gold outline-none transition-all font-bold placeholder:text-primary/20" placeholder="e.g. Mixed Methods Methodology Refinement" required>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-xs font-black text-primary/40 uppercase tracking-widest pl-2">Research Context</label>
                            <textarea name="message" rows="6" class="w-full bg-background border border-primary/5 rounded-2xl p-4 focus:ring-2 focus:ring-gold outline-none transition-all font-bold placeholder:text-primary/20" placeholder="Describe your current research stage and specific challenges..." required></textarea>
                        </div>

                        <button type="submit" class="w-full bg-primary text-white font-black py-6 rounded-3xl hover:bg-[#000B20] transition-all shadow-2xl hover:shadow-primary/30 group flex items-center justify-center gap-4 active:scale-[0.98]">
                            <span class="uppercase tracking-[4px]">Submit Inquiry</span>
                            <span class="material-symbols-outlined transition-transform group-hover:translate-x-2 text-gold">send</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
