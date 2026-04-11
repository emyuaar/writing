@php
    $content = $section->content ?? [];
    $columns = !empty($content['columns']) ? (is_string($content['columns']) ? explode(',', $content['columns']) : $content['columns']) : ['Fundamental', 'Elite', 'Master'];
    $items = !empty($content['items']) ? $content['items'] : [];
@endphp

<section class="max-w-5xl mx-auto px-8 mb-32">
    <div class="text-center mb-16">
        <h2 class="font-headline text-3xl font-bold text-primary mb-4">
            {{ $content['heading'] ?? 'Granular Feature Breakdown' }}
        </h2>
        <div class="h-1 w-24 bg-gold mx-auto rounded-full"></div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-outline-variant/20">
                    <th class="py-6 font-manrope font-bold text-sm uppercase tracking-widest text-on-surface-variant">Framework Feature</th>
                    @foreach($columns as $col)
                        <th class="py-6 text-center font-manrope font-bold text-sm uppercase tracking-widest text-primary">{{ $col }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/10">
                @if(!empty($items))
                    @foreach($items as $item)
                        @if(!empty($item['is_category']))
                            <tr>
                                <td class="py-8 font-manrope font-black text-xs uppercase tracking-[0.2em] text-secondary" colspan="{{ count($columns) + 1 }}">
                                    {{ $item['feature'] ?? '' }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="py-5 font-medium text-on-surface-variant">{{ $item['feature'] ?? '' }}</td>
                                @for($i = 0; $i < count($columns); $i++)
                                    @php
                                        $valKey = 'val_' . ($i + 1);
                                        $val = $item[$valKey] ?? '';
                                    @endphp
                                    <td class="py-5 text-center">
                                        @if(strtolower($val) === 'yes' || strtolower($val) === 'check' || $val === '1' || $val === true)
                                            <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check</span>
                                        @elseif(strtolower($val) === 'no' || $val === '0' || $val === false)
                                            <span class="text-outline-variant">—</span>
                                        @else
                                            <span class="text-on-surface text-sm {{ strpos($val, 'Priority') !== false ? 'font-bold' : '' }}">{{ $val }}</span>
                                        @endif
                                    </td>
                                @endfor
                            </tr>
                        @endif
                    @endforeach
                @else
                    <!-- Fallback placeholders if no items -->
                    <tr>
                        <td class="py-8 font-manrope font-black text-xs uppercase tracking-[0.2em] text-secondary" colspan="4">Foundational Access</td>
                    </tr>
                    <tr>
                        <td class="py-5 font-medium text-on-surface-variant">Access to Archive</td>
                        <td class="py-5 text-center"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check</span></td>
                        <td class="py-5 text-center"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check</span></td>
                        <td class="py-5 text-center"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check</span></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</section>
