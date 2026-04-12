@extends('layouts.app')

@php
    $seo = [
        'title' => 'Investment Plans & Academic Pricing',
        'description' => 'Transparent, value-driven pricing for doctoral research, dissertation writing, and high-level academic consulting.'
    ];

    // Sample pricing data that matches the Stitch pricing_cards structure
    $pricingSection = (object)[
        'content' => [
            'heading' => 'Academic Investment Tiers',
            'paragraph' => 'We provide specialized research support tailored to the rigor of your doctoral program. Select the tier that aligns with your current research phase.',
            'availability_text' => 'Currently accepting 4 new dissertation projects for May 2026',
            'cards' => [
                [
                    'name' => 'Proposal & Pilot',
                    'description' => 'Perfect for candidates in the initial research design and methodology phase.',
                    'price' => '$299',
                    'features' => "Research Questions Refinement\nLiterature Review Mapping\nMethodology Consistency Check\nProposal Defense Deck",
                    'button_label' => 'Start Proposal',
                    'button_link' => '#order-form',
                    'is_featured' => false
                ],
                [
                    'name' => 'Doctoral Candidate',
                    'description' => 'Comprehensive support for full dissertation development and analysis.',
                    'price' => '$599',
                    'features' => "Full Chapter Development\nStatistical/Thematic Analysis\nRigorous Peer Review\nUnlimited Academic Revisions\nDirect Lead Advisor Access",
                    'button_label' => 'Secure Success',
                    'button_link' => '#order-form',
                    'is_featured' => true
                ],
                [
                    'name' => 'Final Defense',
                    'description' => 'Intensive final polish, formatting, and viva voce preparation.',
                    'price' => '$199',
                    'features' => "Final Formatting Compliance\nPlagiarism Sensitivity Audit\nMock Viva Session\nAbstract & Summary Polish",
                    'button_label' => 'Ready to Defend',
                    'button_link' => '#order-form',
                    'is_featured' => false
                ]
            ]
        ]
    ];
@endphp

@section('content')
<!-- Hero Section -->
<header class="pt-40 pb-24 bg-[#0D223F] text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute -top-24 -right-24 w-[500px] h-[500px] bg-gold rounded-full blur-[150px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10 text-center">
        <h1 class="font-headline text-5xl md:text-7xl font-black mb-8 tracking-tighter">
            Invest in Your <span class="text-gold italic">Excellence</span>
        </h1>
        <p class="text-xl md:text-2xl text-white/70 max-w-3xl mx-auto leading-relaxed font-light">
            Transparent pricing models designed for the depth and complexity of doctoral-level research.
        </p>
    </div>
</header>

<!-- Pricing Cards Section -->
<div class="py-32 bg-background">
    @include('frontend.sections.pricing_cards', ['section' => $pricingSection])
</div>

<!-- Order Request Section -->
<section id="order-form" class="py-24 bg-white border-y border-primary/5">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-primary mb-8 tracking-tight">Request a Custom <span class="text-gold">Quote</span></h2>
                <p class="text-lg text-primary/70 mb-12 leading-relaxed font-medium">
                    Every research project is unique. If our standard tiers don't perfectly align with your needs, provide your project details below for a tailored consultation and bespoke quote.
                </p>
                
                <div class="space-y-8">
                    <div class="flex items-start gap-6">
                        <div class="w-14 h-14 bg-gold/10 rounded-2xl flex items-center justify-center flex-shrink-0 text-gold border border-gold/20">
                            <span class="material-symbols-outlined text-3xl">verified</span>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-primary mb-2">No Hidden Costs</h4>
                            <p class="text-primary/60 font-medium">Our quotes include all revisions and editorial checks required for your standard.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-6">
                        <div class="w-14 h-14 bg-crimson/10 rounded-2xl flex items-center justify-center flex-shrink-0 text-crimson border border-crimson/20">
                            <span class="material-symbols-outlined text-3xl">security</span>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-primary mb-2">Full Confidentiality</h4>
                            <p class="text-primary/60 font-medium">Your research integrity and privacy are protected by non-disclosure agreements.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-background p-10 lg:p-14 rounded-[40px] shadow-[0_40px_100px_-20px_rgba(13,34,63,0.15)] border border-primary/5 relative">
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-gold rounded-3xl -rotate-12 z-0 opacity-50 blur-2xl"></div>
                <div class="relative z-10">
                    <h3 class="text-3xl font-black text-primary mb-10 leading-tight">Project Details</h3>
                    
                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 p-6 rounded-2xl mb-8 flex items-center gap-4 border border-green-200 shadow-sm animate-pulse">
                            <span class="material-symbols-outlined text-2xl">check_circle</span>
                            <span class="font-bold">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('order.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-xs font-black text-primary/40 uppercase tracking-widest pl-2">Full Name</label>
                                <input type="text" name="customer_name" class="w-full bg-white border border-primary/5 rounded-2xl p-4 focus:ring-2 focus:ring-gold outline-none transition-all font-bold placeholder:text-primary/20 shadow-sm" placeholder="John Doe" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs font-black text-primary/40 uppercase tracking-widest pl-2">Email Address</label>
                                <input type="email" name="customer_email" class="w-full bg-white border border-primary/5 rounded-2xl p-4 focus:ring-2 focus:ring-gold outline-none transition-all font-bold placeholder:text-primary/20 shadow-sm" placeholder="john@university.edu" required>
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="block text-xs font-black text-primary/40 uppercase tracking-widest pl-2">Research Service</label>
                            <select name="service_id" class="w-full bg-white border border-primary/5 rounded-2xl p-4 focus:ring-2 focus:ring-gold outline-none transition-all font-bold appearance-none shadow-sm" required>
                                <option value="" disabled selected>Select your research area...</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-xs font-black text-primary/40 uppercase tracking-widest pl-2">Project Scope & Objectives</label>
                            <textarea name="order_details" rows="5" class="w-full bg-white border border-primary/5 rounded-2xl p-4 focus:ring-2 focus:ring-gold outline-none transition-all font-bold placeholder:text-primary/20 shadow-sm" placeholder="Briefly describe your Dissertation topic and what stage you are currently at..." required></textarea>
                        </div>

                        <button type="submit" class="w-full bg-primary text-white font-black py-5 rounded-2xl hover:bg-[#000B20] transition-all shadow-xl hover:shadow-primary/20 group flex items-center justify-center gap-3 active:scale-[0.98]">
                            Submit For Review
                            <span class="material-symbols-outlined transition-transform group-hover:translate-x-2">arrow_right_alt</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
