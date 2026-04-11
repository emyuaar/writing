<header class="pt-40 pb-24 px-8 max-w-7xl mx-auto flex flex-col md:flex-row md:items-end justify-between gap-8">
    <div class="max-w-2xl">
        <span class="font-label text-sm font-semibold tracking-widest text-primary uppercase mb-4 block">{{ $content['badge'] ?? 'Inquiry Office' }}</span>
        <h1 class="font-headline text-5xl md:text-7xl font-extrabold text-primary tracking-tighter leading-tight">
            {{ $content['title_part_1'] ?? 'Refined discourse starts with a single' }} <span class="text-secondary italic">{{ $content['title_italic'] ?? 'message' }}</span>.
        </h1>
    </div>
    <div class="flex flex-col gap-2 border-l-2 border-secondary pl-6">
        <p class="text-on-surface-variant font-medium">{{ $content['hours_label'] ?? 'Operating hours' }}</p>
        <p class="font-headline font-bold text-xl">{{ $content['hours_value'] ?? 'Mon — Fri: 09:00 — 18:00' }}</p>
    </div>
</header>
