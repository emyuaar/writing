@extends('layouts.app')

@section('content')
<main class="pt-40 pb-24 px-8 max-w-7xl mx-auto">
    <!-- Hero Section -->
    <header class="mb-20">
        <div class="inline-block px-4 py-1.5 mb-6 rounded bg-secondary text-on-secondary font-label text-xs font-bold tracking-widest uppercase">
            Curated Insights
        </div>
        <h1 class="text-5xl md:text-7xl font-headline font-extrabold text-primary tracking-tight leading-none mb-6">
            The Academic <span class="text-[#BA1A1A]">Journal</span>
        </h1>
        <p class="text-xl text-on-surface-variant max-w-2xl leading-relaxed">
            Exploring the intersection of rigorous academic methodology and modern professional excellence. Insights from our faculty advisors.
        </p>
    </header>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
        <!-- Main Content: Blog List -->
        <div class="lg:col-span-8 space-y-20">
            @if($posts->currentPage() == 1 && $posts->count() > 0)
                @php $featured = $posts->shift(); @endphp
                <!-- Featured Post -->
                <article class="group relative overflow-hidden rounded-2xl bg-white shadow-sm transition-all hover:shadow-xl border border-outline/10">
                    <div class="aspect-[16/9] overflow-hidden">
                        <img src="{{ $featured->featured_image ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAFfZ-tHdl8L97ESOxZnR_JySCJ_Bqi0Fe_o34uXOsCfpVpWxdHznUkEhfNphCC8nEoH1tA4G6FcoUB1NhRwXlWdqJsDo0ibKSXaTccBfWbUMHxlvOgmEq7U7nBITe-tMLQ-vHak4wr1tGx2RGh56mLQpH4OjLML4SL_-Jr6eBXf359MC4DJb9kqMLFKwXs9RCe2eP2QFWLNWg2IL3Fni4iqVC0JPVou_1zyvvpr0Y608edG6oVGKqAqDnDbjh3IrEsJSu5nLfxbxY' }}" alt="{{ $featured->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="p-8 md:p-12">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="text-xs font-bold uppercase tracking-widest text-primary">{{ $featured->category->name ?? 'Uncategorized' }}</span>
                            <span class="w-1.5 h-1.5 rounded-full bg-[#BA1A1A]"></span>
                            <time class="text-xs font-medium text-on-surface-variant">{{ $featured->created_at->format('F d, Y') }}</time>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-headline font-extrabold mb-6 leading-tight group-hover:text-[#BA1A1A] transition-colors">
                            <a href="{{ route('blog.show', $featured->slug) }}">{{ $featured->title }}</a>
                        </h2>
                        <p class="text-on-surface-variant text-lg leading-relaxed mb-8">
                            {{ $featured->excerpt }}
                        </p>
                        <a href="{{ route('blog.show', $featured->slug) }}" class="inline-flex items-center gap-2 text-primary font-bold tracking-wide uppercase text-sm border-b-2 border-secondary hover:border-[#BA1A1A] transition-all">
                            Read Full Thesis <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                </article>
            @endif

            <!-- Regular Grid Items -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                @foreach($posts as $post)
                    <article class="group">
                        <div class="aspect-[4/3] rounded-xl overflow-hidden mb-6 bg-surface-container shadow-sm border border-outline/5">
                            <img src="{{ $post->featured_image ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuC073MArXOxzCheXKofqpi1VQgdt_x3MraJvebGhpIHJnDQn1aqVPfkXqiOee_FA10DinImZkfTItlp3AEHRbFxnXlqeZNxPj6ltEUrr0nVEg5_gCFjxPduyIJymlmvW7x-YhJsCECo9m4h3fEYUb4Olc4kq8s3Oq51suInLEEndh4awdjj1-HsvfsTVeYA2HlaE8WIxkr5J7ZZdUJmKB-mXg4v-TAy70EyfxrWL7xCUdNsFIH5Gq8M6F8HXSY6QFjXoZYeQVXmG68' }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <span class="text-[10px] font-bold uppercase tracking-widest text-[#BA1A1A]">{{ $post->category->name ?? 'Journal' }}</span>
                                <time class="text-[10px] font-medium text-on-surface-variant">{{ $post->created_at->format('M d, Y') }}</time>
                            </div>
                            <h3 class="text-xl font-headline font-bold leading-tight group-hover:text-primary transition-colors">
                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-20">
                {{ $posts->links() }}
            </div>
        </div>

        <!-- Sidebar -->
        <aside class="lg:col-span-4 space-y-12">
            <!-- Search -->
            <div class="p-8 rounded-2xl bg-[#F2F3FF] border border-outline/5 shadow-sm">
                <h4 class="font-headline font-extrabold text-sm uppercase tracking-widest text-primary mb-6">Archive Search</h4>
                <form action="{{ route('blog.index') }}" method="GET" class="relative">
                    <input name="search" class="w-full bg-white border border-outline/10 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-secondary transition-all placeholder:text-outline/50" placeholder="Search insights..." type="text">
                    <button type="submit" class="material-symbols-outlined absolute right-3 top-2.5 text-outline">search</button>
                </form>
            </div>

            <!-- Category Listing -->
            <div class="p-8">
                <h4 class="font-headline font-extrabold text-sm uppercase tracking-widest text-primary mb-8">Faculty Departments</h4>
                <ul class="space-y-4">
                    @foreach(App\Models\Category::where('type', 'blog')->get() as $cat)
                        <li>
                            <a href="#" class="flex justify-between items-center group">
                                <span class="text-on-surface-variant font-medium group-hover:text-[#BA1A1A] transition-colors">{{ $cat->name }}</span>
                                <span class="text-[10px] font-bold bg-surface-container-high px-2 py-1 rounded text-on-surface-variant">{{ $cat->posts()->count() }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Newsletter CTA -->
            <div class="relative p-8 rounded-2xl bg-primary overflow-hidden shadow-xl text-white">
                <div class="relative z-10">
                    <h4 class="font-headline font-extrabold text-xl mb-4">Join the Registry</h4>
                    <p class="text-white/80 text-sm leading-relaxed mb-6">
                        Receive bi-weekly curated academic insights and exclusive methodology papers directly in your inbox.
                    </p>
                    <input class="w-full bg-white/10 border-white/20 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-secondary transition-all placeholder:text-white/40 mb-4 text-white" placeholder="academic.email@university.edu" type="email">
                    <button class="w-full bg-secondary text-primary font-bold text-xs py-3 rounded-lg uppercase tracking-widest hover:brightness-110 transition-all">
                        Subscribe
                    </button>
                </div>
            </div>
        </aside>
    </div>
</main>
@endsection
