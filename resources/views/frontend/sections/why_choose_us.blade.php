@php
    $content = $section->content ?? [];
@endphp

<section class="py-24 px-8 max-w-7xl mx-auto">
    <div class="grid lg:grid-cols-2 gap-16 items-center">
        <div>
            <h2 class="font-headline text-4xl lg:text-5xl font-bold text-navy mb-8 leading-tight">
                {{ $content['heading'] ?? 'The Scholarly Distinction' }}
            </h2>
            <p class="text-on-surface-variant text-lg mb-12">
                {{ $content['paragraph'] ?? '' }}
            </p>
            
            <div class="grid sm:grid-cols-2 gap-x-8 gap-y-10">
                @if(!empty($content['highlights']))
                    @foreach($content['highlights'] as $highlight)
                        <div class="flex flex-col gap-3">
                            <div class="w-12 h-12 rounded bg-navy/5 flex items-center justify-center">
                                <span class="material-symbols-outlined text-navy">
                                    {{ $highlight['icon'] ?? 'groups' }}
                                </span>
                            </div>
                            <h4 class="font-headline font-bold text-lg">{{ $highlight['title'] ?? '' }}</h4>
                            <p class="text-sm text-on-surface-variant">{{ $highlight['text'] ?? '' }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        
        <div class="relative">
            <img alt="The Scholarly Distinction" class="rounded shadow-2xl" 
                 src="{{ $content['image_url'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCIxmdcg90yjlwil_vgr-Jj4_GHaKRCkhOj90ezFSmnD_Hw8IuFoOKoFWWNYpUuMcANQGHZiPHey_Gp2YBdLxC_YCnJ8cBX8kQ20Tjne88gW4TXEC0ZDo1LgQnMmecoHMBXu_AsdaG5SzWWrooH6xPaULi2GadSvR1HXq33K58b-jItSipSDVDOAeLvYQsQYSC_MQj9hErm_bfgIHIjBwxsSY4ukFgbmszMeOkc5_oz8TMAcxABk67UBXmtCfGG3BDAc-NMCo51e70' }}">
            
            @if(!empty($content['stat_value']))
                <div class="absolute -top-6 -right-6 bg-gold p-8 rounded text-navy shadow-xl text-center hidden md:block">
                    <p class="text-4xl font-black">{{ $content['stat_value'] }}</p>
                    <p class="text-xs font-bold uppercase tracking-widest opacity-80">{{ $content['stat_label'] ?? 'Approval Rate' }}</p>
                </div>
            @endif
        </div>
    </div>
</section>
