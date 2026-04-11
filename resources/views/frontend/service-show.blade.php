@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<header class="relative pt-40 pb-24 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ $service->banner_image ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCUQzmiFYLCtcmC-satkMOAT6RCVPUiGwXxVoRwBKfDekSZ-DGpYsYMCpoZDqWmL2oe0402YZ0dMbywae3cwHEAYa6ZYyzS9WGDvolGZiNgqiH4nk0qVmRjbykciemM9Kw55cWKF6Cin9rnY_8VtjufC4sA6I8Kgu-wtTwrtisZAL08lMZJx2_jSGYWhQycGjSoPHDcCWu_hwqLH9ln69Pg2PLBvC11Fe2LwtkLHLoVFwqnPlw7MCAUJdiGfspkN1mLhZRv_JPr4U' }}" alt="Hero Background" class="w-full h-full object-cover opacity-10">
    </div>
    <div class="max-w-7xl mx-auto px-12 relative z-10">
        <span class="inline-block py-1 px-3 mb-6 bg-secondary text-on-secondary text-xs font-bold tracking-widest uppercase rounded">Research Excellence</span>
        <h1 class="font-headline text-5xl md:text-7xl font-extrabold text-primary max-w-4xl tracking-tight leading-tight">
            {{ $service->name }} <br/><span class="text-secondary italic">Consultancy</span>
        </h1>
        <p class="mt-8 text-xl text-on-surface-variant max-w-2xl leading-relaxed">
            {{ $service->short_description }}
        </p>
    </div>
</header>

<!-- Main Content Layout -->
<section class="max-w-7xl mx-auto px-12 pb-32">
    <div class="flex flex-col lg:flex-row gap-16">
        <!-- Left Column: Detailed Benefits -->
        <div class="lg:w-2/3 space-y-20">
            <div class="prose prose-lg max-w-none text-on-surface-variant leading-relaxed">
                {!! nl2br(e($service->description)) !!}
            </div>

            <!-- Features Bento Grid -->
            <div class="space-y-10">
                <h2 class="font-headline text-3xl font-bold text-primary">Atelier Standard Features</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($service->features ?? [] as $feature)
                        <div class="aspect-square bg-[#E3E7FF]/30 p-8 rounded-2xl flex flex-col justify-between group hover:bg-primary transition-all duration-300">
                            <span class="material-symbols-outlined text-3xl text-primary group-hover:text-white transition-colors">verified</span>
                            <span class="font-headline font-bold text-sm group-hover:text-white transition-colors">{{ $feature }}</span>
                        </div>
                    @endforeach
                    
                    @if(empty($service->features))
                        <div class="aspect-square bg-primary text-on-primary p-8 rounded-2xl flex flex-col justify-between">
                            <span class="material-symbols-outlined text-3xl">ink_pen</span>
                            <span class="font-headline font-bold text-sm">Editorial Polish</span>
                        </div>
                        <div class="aspect-square bg-secondary text-on-secondary p-8 rounded-2xl flex flex-col justify-between">
                            <span class="material-symbols-outlined text-3xl">lock</span>
                            <span class="font-headline font-bold text-sm">Strict Confidentiality</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column: Sticky Lead Capture -->
        <div class="lg:w-1/3">
            <div class="sticky top-32">
                <div class="bg-white rounded-3xl shadow-[0_12px_40px_rgba(13,34,63,0.08)] overflow-hidden border border-outline-variant/10">
                    <div class="bg-primary p-8 text-center text-white">
                        <h3 class="font-headline text-2xl font-bold">Reserve Your Consultant</h3>
                        <p class="text-white/80 text-sm mt-2">Personalized pricing for bespoke research.</p>
                    </div>
                    <form action="{{ route('inquiry.store') }}" method="POST" class="p-8 space-y-6">
                        @csrf
                        <input type="hidden" name="subject" value="Service Inquiry: {{ $service->name }}">
                        <div>
                            <label class="block text-xs font-bold tracking-widest uppercase text-on-surface-variant mb-2 ml-1">Full Name</label>
                            <input name="name" class="w-full bg-[#F2F3FF] border-none rounded-lg focus:ring-2 focus:ring-secondary/50 transition-all px-4 py-3" placeholder="Alexander Hamilton" type="text" required />
                        </div>
                        <div>
                            <label class="block text-xs font-bold tracking-widest uppercase text-on-surface-variant mb-2 ml-1">Email</label>
                            <input name="email" class="w-full bg-[#F2F3FF] border-none rounded-lg focus:ring-2 focus:ring-secondary/50 transition-all px-4 py-3" placeholder="hamilton@oxford.ac.uk" type="email" required />
                        </div>
                        <div>
                            <label class="block text-xs font-bold tracking-widest uppercase text-on-surface-variant mb-2 ml-1">Project Brief</label>
                            <textarea name="message" class="w-full bg-[#F2F3FF] border-none rounded-lg focus:ring-2 focus:ring-secondary/50 transition-all px-4 py-3" placeholder="Briefly describe your dissertation topic..." rows="4" required></textarea>
                        </div>
                        <button class="w-full bg-secondary text-on-secondary py-4 rounded-xl font-bold text-sm tracking-wide uppercase shadow-lg hover:brightness-105 active:scale-[0.98] transition-all" type="submit">
                            Initiate Consultation
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.sections.cta', [
    'content' => [
        'title' => 'Elevate your research to the Atelier Standard.',
        'text' => 'Every masterpiece begins with a conversation. Let\'s discuss your contribution to academia.',
        'button_text' => 'Request Quote',
        'button_link' => '/contact-us'
    ]
])
@endsection
