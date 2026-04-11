@php
    $content = $section->content ?? [];
    $members = !empty($content['members']) ? $content['members'] : [];
@endphp

<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="mb-20 text-center max-w-3xl mx-auto">
            @if(!empty($content['badge']))
                <span class="text-secondary font-bold tracking-[0.2em] uppercase text-xs">
                    {{ $content['badge'] }}
                </span>
            @endif
            <h2 class="font-headline text-4xl font-extrabold text-primary mt-4 mb-6">
                {{ $content['heading'] ?? 'Meet the Distinguished Faculty' }}
            </h2>
            <p class="text-on-surface-variant leading-relaxed">
                {{ $content['paragraph'] ?? '' }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @if(!empty($members))
                @foreach($members as $member)
                    <div class="group">
                        <div class="aspect-[3/4] rounded overflow-hidden mb-6 relative">
                            <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" 
                                 src="{{ $member['image'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuC85SqYKxKZ7p1VipxNnh9gdGjadUi5SZGXJ2WvxoINGDZPzhgsZsjppzkzXtEb3lxhhjdtDiKF7zoTLh6I_kP8FOmbJq5hRhqSK1T7jROe83h1Viq6FG_lbLTHepXYjKULBTmv9YS4SP_fGA80bkSC_m92ObGfcfzijz46SZI1LSMmDxqVvysc06yvLqRb0D-KM8xBnMztlB6cSoeZHtiuU3dHGRt09S86FT0T5rK5buBPImJSvCz9ZnYoZjnxs1M9SFVC6FWkxHk' }}">
                            <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <h3 class="font-headline text-2xl font-bold text-primary">{{ $member['name'] ?? '' }}</h3>
                        <p class="text-crimson font-semibold text-sm uppercase tracking-wider mb-3">{{ $member['role'] ?? '' }}</p>
                        <p class="text-on-surface-variant text-sm leading-relaxed">{{ $member['bio'] ?? '' }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
