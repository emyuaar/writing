@extends('layouts.app')

@section('content')
<main class="pt-20">
    <!-- Hero Section -->
    <header class="relative w-full h-[716px] min-h-[500px] flex items-end overflow-hidden mb-16">
        <img src="{{ $post->featured_image ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuB7ZGL8xnO5zlzfEZnS6lwKf09L44xy9sB78dEN4fGYEVwAU8U-jCOjkyWcHu0xqmIiR2qUNiBRpGHeVEytF1XnZdN2o75lRBpGIEJamg3Oziff4AMd1CseBGS1Y4-WNaUWw5Dccm_ZrPRc1GrzmFNERg-AzzKnzV69wP_ECVuPP36MksWFDp5w7Z_ZXbpsmeH7OIDsAIrAK41CkYanmH9rbObYdz6m6JdRElAaNo4rmJdCbm5EBQg2-ZYdVJVhiggMhsqrVQxMN9k' }}" alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>
        <div class="relative max-w-7xl mx-auto w-full px-8 pb-16">
            <div class="flex flex-col gap-6 max-w-4xl">
                <span class="inline-block px-4 py-1 bg-secondary text-on-secondary font-manrope font-bold text-xs uppercase tracking-widest rounded-full w-fit">
                    {{ $post->category->name ?? 'Academic Insight' }}
                </span>
                <h1 class="font-headline font-black text-5xl md:text-7xl text-white leading-[1.1] tracking-tighter">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center gap-6 text-white/80 font-medium">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined">calendar_today</span>
                        <span>{{ $post->created_at->format('F d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Content Layout -->
    <div class="max-w-7xl mx-auto px-8 pb-24 grid grid-cols-1 lg:grid-cols-12 gap-16">
        <!-- Article Body -->
        <article class="lg:col-span-8 editorial-content prose prose-lg max-w-none">
            <p class="text-xl font-medium text-primary mb-12 leading-relaxed">
                {{ $post->excerpt }}
            </p>
            
            <div class="text-on-surface-variant leading-relaxed">
                {!! nl2br($post->content) !!}
            </div>

            <!-- Author Footer -->
            <div class="mt-16 pt-12 border-t border-outline-variant/30">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
                    <div class="flex items-center gap-4">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4BZmCUKBzeuDKwA0E_EcetBnxIGi7iITvviib0Worcj2yNwjqiK8P8wtmJMbIbhGmuR7-5X-T_0fRnc4uDE7NvCAkstg_6gejbEHtItJ21srAQHn_yg4Q8WS7P8sK8cz9qmvVnxtVzq-5hXkJNZbxBW0frU5Cmywbf9LZtFn29nWek6z1g8D3gxqdgsUwop4NWNB4HOs8GA3GEPyrX-GXgb9Rek7AqQ-5JJmnUkgYdctMthcOo6H1DBRLv6eywuL8BydSMrO7exQ" alt="Author" class="w-16 h-16 rounded-full object-cover grayscale">
                        <div>
                            <p class="text-sm font-bold text-on-surface mb-0">The Academic Atelier</p>
                            <p class="text-xs text-on-surface-variant">Lead Faculty Advisor</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant mr-2">Share:</span>
                        <button class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all">
                            <span class="material-symbols-outlined text-lg">share</span>
                        </button>
                    </div>
                </div>
            </div>
        </article>

        <!-- Sidebar -->
        <aside class="lg:col-span-4 space-y-12">
            <!-- Categories -->
            <div class="p-8 bg-[#F2F3FF] rounded-2xl border border-outline/5">
                <h3 class="font-headline font-bold text-lg mb-6 text-on-surface">Specializations</h3>
                <ul class="space-y-4">
                    @foreach(App\Models\Category::where('type', 'blog')->get() as $cat)
                        <li>
                            <a href="#" class="flex justify-between items-center group text-on-surface-variant hover:text-primary transition-colors">
                                <span class="text-sm font-medium">{{ $cat->name }}</span>
                                <span class="text-xs bg-white px-2 py-1 rounded-md">{{ $cat->posts()->count() }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Recent Posts -->
            <div>
                <h3 class="font-headline font-bold text-lg mb-6 text-on-surface">Latest Thinking</h3>
                <div class="space-y-6">
                    @foreach($recentPosts as $recent)
                        <a href="{{ route('blog.show', $recent->slug) }}" class="flex gap-4 group">
                            <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 border border-outline/10">
                                <img src="{{ $recent->featured_image ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCBnTuwx8PNHnWRY-IJMX6ALlYVnVCuHH1Bajcd1t4XBWW4Nn1zUaXsMDa-4AAC3dbjVAaEBEmuDxfG1QxzenaooBYOtQeJOz1lNkbwI3HgB3sKmAfvJPkwroypgsIntkbN5i6r44stl2Az7CKbICUl8DBdYqLFrqnfaw30EId6eE24jTiTpJie1QDwHXNhb4C3Wdx3MMSWmRwrGMrhfzUlbDCyyNWXb4RUYJb_69XOxRiDvcSDEYnteVojZckqsWXV3RArMiGWuY4' }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="flex flex-col justify-center">
                                <p class="text-xs font-bold text-secondary mb-1">{{ $recent->category->name ?? 'Methodology' }}</p>
                                <h4 class="text-sm font-bold leading-snug group-hover:text-primary transition-colors">{{ $recent->title }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </aside>
    </div>
</main>

<style>
    .editorial-content h2 {
        font-family: 'Manrope', sans-serif;
        font-weight: 800;
        font-size: 2.25rem;
        color: #0D223F;
        margin-top: 3rem;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }
    .editorial-content p {
        font-family: 'Manrope', sans-serif;
        font-size: 1.125rem;
        line-height: 1.8;
        color: #44474E;
        margin-bottom: 2rem;
    }
    .editorial-content blockquote {
        border-left: 4px solid #FDC003;
        padding-left: 2rem;
        font-style: italic;
        font-size: 1.5rem;
        color: #0D223F;
        margin: 3rem 0;
        font-weight: 300;
    }
</style>
@endsection
