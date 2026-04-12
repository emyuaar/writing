@php
    $section = $section ?? null;
    $content = $section ? $section->content : [];
    $type = (string)($type ?? '');
    $typeInfo = \App\Services\SectionRegistry::getAvailableSections()[$type] ?? ['name' => $type, 'icon' => 'settings'];
@endphp

<div class="section-item bg-white border border-slate-200 rounded-xl mb-4 overflow-hidden shadow-sm transition-all" data-type="{{ $type }}">
    <!-- COMPACT HEADER -->
    <div class="flex items-center justify-between px-6 py-4 bg-slate-50 border-b border-slate-200 cursor-move section-handle">
        <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-slate-300">drag_indicator</span>
            <div class="w-10 h-10 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500">
                <span class="material-symbols-outlined">{{ $typeInfo['icon'] }}</span>
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <span class="font-bold text-slate-800">{{ $typeInfo['name'] }}</span>
                    <span class="text-[9px] px-1.5 py-0.5 rounded bg-slate-200 text-slate-500 uppercase font-black tracking-widest">{{ $type }}</span>
                </div>
                <p class="text-xs text-slate-400 mt-0.5 leading-none">{{ $typeInfo['editorial_hint'] ?? $typeInfo['description'] ?? '' }}</p>
            </div>
        </div>
        
        <div class="flex items-center gap-6">
            <!-- Visibility Status -->
            <div class="flex items-center gap-2 pr-4 border-r border-slate-200">
                <input type="checkbox" name="sections[{{ $index }}][is_active]" value="1" 
                       {{ ($section && $section->is_active) || !$section ? 'checked' : '' }} 
                       class="rounded text-primary focus:ring-primary h-4 w-4">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-tighter">Active</span>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" class="p-2 text-slate-300 hover:text-red-500 transition-all remove-section" title="Remove">
                    <span class="material-symbols-outlined text-xl">delete</span>
                </button>
                <button type="button" class="p-2 text-slate-500 hover:text-primary transition-all toggle-section" title="Toggle Fields">
                    <span class="material-symbols-outlined transform transition-transform duration-300">expand_more</span>
                </button>
            </div>
        </div>
    </div>

    <!-- FIELD BODY (Collapsed by default) -->
    <div class="section-content hidden p-8 bg-white">
        <input type="hidden" name="sections[{{ $index }}][type]" value="{{ $type }}">
        @if($section)
            <input type="hidden" name="sections[{{ $index }}][id]" value="{{ $section->id }}">
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
            @foreach($schema as $fieldName => $fieldConfig)
                @php $isFullWidth = ($fieldConfig['type'] === 'textarea' || $fieldConfig['type'] === 'repeater'); @endphp
                
                <div class="{{ $isFullWidth ? 'md:col-span-2' : '' }}">
                    @if($fieldConfig['type'] !== 'repeater')
                        <div class="mb-1.5 flex items-center justify-between">
                            <label class="text-xs font-bold text-slate-700 uppercase tracking-tight">
                                {{ $fieldConfig['label'] }}
                                @if(isset($fieldConfig['hint']))
                                    <span class="text-[10px] text-slate-400 font-normal lowercase italic ml-1">— {{ $fieldConfig['hint'] }}</span>
                                @endif
                            </label>
                        </div>
                        
                        @if($fieldConfig['type'] === 'text')
                            <input type="text" name="sections[{{ $index }}][content][{{ $fieldName }}]" 
                                   value="{{ $content[$fieldName] ?? $fieldConfig['default'] ?? '' }}"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-700 focus:bg-white focus:ring-1 focus:ring-primary focus:border-primary transition-all">
                        
                        @elseif($fieldConfig['type'] === 'textarea')
                            <textarea name="sections[{{ $index }}][content][{{ $fieldName }}]" rows="3"
                                      class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-700 focus:bg-white focus:ring-1 focus:ring-primary focus:border-primary transition-all">{{ $content[$fieldName] ?? $fieldConfig['default'] ?? '' }}</textarea>
                        
                        @elseif($fieldConfig['type'] === 'checkbox')
                            <div class="flex items-center gap-3 py-2">
                                <input type="checkbox" name="sections[{{ $index }}][content][{{ $fieldName }}]" value="1"
                                       {{ !empty($content[$fieldName]) ? 'checked' : '' }}
                                       class="rounded text-primary focus:ring-primary h-5 w-5">
                                <span class="text-xs font-medium text-slate-600">{{ $fieldConfig['label'] }} Active</span>
                            </div>
                        @endif
                    @else
                        <!-- REPEATER -->
                        <div class="repeater-field mt-4 p-6 bg-slate-50 rounded-xl border border-slate-200" data-field="{{ $fieldName }}">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="font-bold text-slate-800 text-sm flex items-center gap-2">
                                    <span class="material-symbols-outlined text-slate-400">layers</span>
                                    {{ $fieldConfig['label'] }}
                                </h4>
                                <button type="button" class="add-repeater-item px-3 py-1.5 bg-white border border-slate-200 rounded shadow-sm text-[10px] font-black uppercase text-slate-600 hover:bg-slate-50">
                                    Add New Item
                                </button>
                            </div>

                            <div class="repeater-items space-y-3">
                                @php $items = $content[$fieldName] ?? []; @endphp
                                @foreach($items as $itemIndex => $itemSubContent)
                                    <div class="repeater-item bg-white border border-slate-200 rounded-lg p-5 relative group shadow-sm transition-shadow hover:shadow-md">
                                        <button type="button" class="remove-repeater-item absolute top-2 right-2 text-slate-300 hover:text-red-500">
                                            <span class="material-symbols-outlined text-lg">close</span>
                                        </button>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach($fieldConfig['fields'] as $subFieldName => $subFieldConfig)
                                                <div class="{{ $subFieldConfig['type'] === 'textarea' ? 'md:col-span-2' : '' }}">
                                                    <label class="block text-[10px] font-black text-slate-400 mb-1 uppercase tracking-widest">{{ $subFieldConfig['label'] }}</label>
                                                    @if($subFieldConfig['type'] === 'text')
                                                        <input type="text" name="sections[{{ $index }}][content][{{ $fieldName }}][{{ $itemIndex }}][{{ $subFieldName }}]" 
                                                               value="{{ $itemSubContent[$subFieldName] ?? $subFieldConfig['default'] ?? '' }}"
                                                               class="w-full bg-slate-50 border border-slate-100 rounded px-2 py-1.5 text-xs text-slate-600 focus:bg-white">
                                                    @elseif($subFieldConfig['type'] === 'textarea')
                                                        <textarea name="sections[{{ $index }}][content][{{ $fieldName }}][{{ $itemIndex }}][{{ $subFieldName }}]" rows="2"
                                                                  class="w-full bg-slate-50 border border-slate-100 rounded px-2 py-1.5 text-xs text-slate-600 focus:bg-white">{{ $itemSubContent[$subFieldName] ?? $subFieldConfig['default'] ?? '' }}</textarea>
                                                    @elseif($subFieldConfig['type'] === 'checkbox')
                                                        <input type="checkbox" name="sections[{{ $index }}][content][{{ $fieldName }}][{{ $itemIndex }}][{{ $subFieldName }}]" value="1"
                                                               {{ !empty($itemSubContent[$subFieldName]) ? 'checked' : '' }}
                                                               class="rounded text-primary h-4 w-4">
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <template class="repeater-item-template">
                                <div class="repeater-item bg-white border border-slate-200 rounded-lg p-5 relative shadow-sm">
                                    <button type="button" class="remove-repeater-item absolute top-2 right-2 text-slate-300 hover:text-red-500"><span class="material-symbols-outlined text-lg">close</span></button>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        @foreach($fieldConfig['fields'] as $subFieldName => $subFieldConfig)
                                            <div class="{{ $subFieldConfig['type'] === 'textarea' ? 'md:col-span-2' : '' }}">
                                                <label class="block text-[10px] font-black text-slate-400 mb-1 uppercase tracking-widest">{{ $subFieldConfig['label'] }}</label>
                                                @if($subFieldConfig['type'] === 'text')
                                                    <input type="text" name="sections[{{ $index }}][content][{{ $fieldName }}][__ITEM_INDEX__][{{ $subFieldName }}]" 
                                                           value="{{ $subFieldConfig['default'] ?? '' }}"
                                                           class="w-full bg-slate-50 border border-slate-100 rounded px-2 py-1.5 text-xs text-slate-600">
                                                @elseif($subFieldConfig['type'] === 'textarea')
                                                    <textarea name="sections[{{ $index }}][content][{{ $fieldName }}][__ITEM_INDEX__][{{ $subFieldName }}]" rows="2"
                                                              class="w-full bg-slate-50 border border-slate-100 rounded px-2 py-1.5 text-xs text-slate-600">{{ $subFieldConfig['default'] ?? '' }}</textarea>
                                                @elseif($subFieldConfig['type'] === 'checkbox')
                                                    <input type="checkbox" name="sections[{{ $index }}][content][{{ $fieldName }}][__ITEM_INDEX__][{{ $subFieldName }}]" value="1"
                                                           class="rounded text-primary h-4 w-4">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </template>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
