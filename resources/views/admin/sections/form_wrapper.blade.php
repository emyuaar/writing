@php
    $section = $section ?? null;
    $content = $section ? $section->content : [];
    $typeInfo = \App\Services\SectionRegistry::getAvailableSections()[$type] ?? ['name' => $type];
@endphp

<div class="section-item bg-white border rounded-lg mb-6 overflow-hidden shadow-sm hover:shadow-md transition-shadow" data-type="{{ $type }}">
    <!-- Header -->
    <div class="flex items-center justify-between px-6 py-4 bg-slate-50 border-b cursor-move section-handle">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-slate-400">drag_indicator</span>
            <span class="material-symbols-outlined text-primary">{{ $typeInfo['icon'] ?? 'settings' }}</span>
            <div>
                <span class="font-bold text-slate-700">{{ $typeInfo['name'] }}</span>
                <span class="text-xs text-slate-400 block uppercase font-bold tracking-widest">{{ $type }}</span>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="sections[{{ $index }}][is_active]" value="1" {{ ($section && $section->is_active) || !$section ? 'checked' : '' }} class="rounded text-primary focus:ring-primary h-4 w-4">
                <label class="text-sm font-medium text-slate-600">Active</label>
            </div>
            <button type="button" class="text-red-500 hover:text-red-700 remove-section" title="Remove Section">
                <span class="material-symbols-outlined">delete</span>
            </button>
            <button type="button" class="text-slate-400 hover:text-slate-600 toggle-section" title="Collapse/Expand">
                <span class="material-symbols-outlined transition-transform">expand_more</span>
            </button>
        </div>
    </div>

    <!-- Body -->
    <div class="section-content p-6">
        <input type="hidden" name="sections[{{ $index }}][type]" value="{{ $type }}">
        @if($section)
            <input type="hidden" name="sections[{{ $index }}][id]" value="{{ $section->id }}">
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($schema as $fieldName => $fieldConfig)
                <div class="{{ ($fieldConfig['type'] === 'textarea' || $fieldConfig['type'] === 'repeater') ? 'md:col-span-2' : '' }}">
                    @if($fieldConfig['type'] !== 'repeater')
                        <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
                            {{ $fieldConfig['label'] }}
                        </label>
                        
                        @if($fieldConfig['type'] === 'text')
                            <input type="text" name="sections[{{ $index }}][content][{{ $fieldName }}]" 
                                   value="{{ $content[$fieldName] ?? $fieldConfig['default'] ?? '' }}"
                                   placeholder="{{ $fieldConfig['placeholder'] ?? '' }}"
                                   class="w-full rounded-lg border-slate-200 focus:border-primary focus:ring-primary px-4 py-2.5">
                        
                        @elseif($fieldConfig['type'] === 'textarea')
                            <textarea name="sections[{{ $index }}][content][{{ $fieldName }}]" rows="4"
                                      class="w-full rounded-lg border-slate-200 focus:border-primary focus:ring-primary px-4 py-2.5">{{ $content[$fieldName] ?? $fieldConfig['default'] ?? '' }}</textarea>
                        
                        @elseif($fieldConfig['type'] === 'checkbox')
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="sections[{{ $index }}][content][{{ $fieldName }}]" value="1"
                                       {{ !empty($content[$fieldName]) ? 'checked' : '' }}
                                       class="rounded text-primary focus:ring-primary h-5 w-5">
                                <span class="text-sm text-slate-500">Enabled</span>
                            </div>
                        @endif
                    @else
                        <!-- Repeater Field Type -->
                        <div class="repeater-field mt-4 border-t pt-8" data-field="{{ $fieldName }}">
                            <div class="flex items-center justify-between mb-6">
                                <h4 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                                    <span class="material-symbols-outlined text-slate-400">layers</span>
                                    {{ $fieldConfig['label'] }}
                                </h4>
                                <button type="button" class="add-repeater-item bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 transition-colors">
                                    <span class="material-symbols-outlined text-sm">add</span>
                                    Add Item
                                </button>
                            </div>

                            <div class="repeater-items space-y-4">
                                @php
                                    $items = $content[$fieldName] ?? [];
                                @endphp
                                @foreach($items as $itemIndex => $itemSubContent)
                                    <div class="repeater-item bg-slate-50 border border-slate-200 rounded-lg p-6 relative group">
                                        <button type="button" class="remove-repeater-item absolute top-4 right-4 text-red-400 hover:text-red-600 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <span class="material-symbols-outlined text-sm">delete</span>
                                        </button>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach($fieldConfig['fields'] as $subFieldName => $subFieldConfig)
                                                <div class="{{ $subFieldConfig['type'] === 'textarea' ? 'md:col-span-2' : '' }}">
                                                    <label class="block text-xs font-bold text-slate-500 mb-1 uppercase tracking-widest">
                                                        {{ $subFieldConfig['label'] }}
                                                    </label>
                                                    @if($subFieldConfig['type'] === 'text')
                                                        <input type="text" name="sections[{{ $index }}][content][{{ $fieldName }}][{{ $itemIndex }}][{{ $subFieldName }}]" 
                                                               value="{{ $itemSubContent[$subFieldName] ?? $subFieldConfig['default'] ?? '' }}"
                                                               class="w-full rounded border-slate-200 focus:border-primary focus:ring-primary px-3 py-2 text-sm bg-white">
                                                    @elseif($subFieldConfig['type'] === 'textarea')
                                                        <textarea name="sections[{{ $index }}][content][{{ $fieldName }}][{{ $itemIndex }}][{{ $subFieldName }}]" rows="2"
                                                                  class="w-full rounded border-slate-200 focus:border-primary focus:ring-primary px-3 py-2 text-sm bg-white">{{ $itemSubContent[$subFieldName] ?? $subFieldConfig['default'] ?? '' }}</textarea>
                                                    @elseif($subFieldConfig['type'] === 'checkbox')
                                                        <input type="checkbox" name="sections[{{ $index }}][content][{{ $fieldName }}][{{ $itemIndex }}][{{ $subFieldName }}]" value="1"
                                                               {{ !empty($itemSubContent[$subFieldName]) ? 'checked' : '' }}
                                                               class="rounded text-primary focus:ring-primary h-4 w-4">
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Template for JS cloning -->
                            <template class="repeater-item-template">
                                <div class="repeater-item bg-slate-50 border border-slate-200 rounded-lg p-6 relative group">
                                    <button type="button" class="remove-repeater-item absolute top-4 right-4 text-red-400 hover:text-red-600 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        @foreach($fieldConfig['fields'] as $subFieldName => $subFieldConfig)
                                            <div class="{{ $subFieldConfig['type'] === 'textarea' ? 'md:col-span-2' : '' }}">
                                                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase tracking-widest">
                                                    {{ $subFieldConfig['label'] }}
                                                </label>
                                                @if($subFieldConfig['type'] === 'text')
                                                    <input type="text" name="sections[{{ $index }}][content][{{ $fieldName }}][__ITEM_INDEX__][{{ $subFieldName }}]" 
                                                           value="{{ $subFieldConfig['default'] ?? '' }}"
                                                           class="w-full rounded border-slate-200 focus:border-primary focus:ring-primary px-3 py-2 text-sm bg-white">
                                                @elseif($subFieldConfig['type'] === 'textarea')
                                                    <textarea name="sections[{{ $index }}][content][{{ $fieldName }}][__ITEM_INDEX__][{{ $subFieldName }}]" rows="2"
                                                              class="w-full rounded border-slate-200 focus:border-primary focus:ring-primary px-3 py-2 text-sm bg-white">{{ $subFieldConfig['default'] ?? '' }}</textarea>
                                                @elseif($subFieldConfig['type'] === 'checkbox')
                                                    <input type="checkbox" name="sections[{{ $index }}][content][{{ $fieldName }}][__ITEM_INDEX__][{{ $subFieldName }}]" value="1"
                                                           class="rounded text-primary focus:ring-primary h-4 w-4">
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
