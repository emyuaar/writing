@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 mb-1">Service Editor</h1>
            <p class="text-sm text-slate-500 font-medium">{{ $service->name }} — Manage branding, content, and sections.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 rounded-lg border border-slate-200 text-slate-600 font-bold text-sm bg-white hover:bg-slate-50 transition-colors">
                Cancel
            </a>
            <a href="{{ route('services.show', $service->slug) }}" target="_blank" class="px-6 py-2.5 rounded-lg border border-primary/20 text-primary font-bold text-sm bg-primary/5 hover:bg-primary/10 transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">open_in_new</span>
                Preview Live Page
            </a>
            <button form="service-edit-form" type="submit" class="px-8 py-2.5 rounded-lg bg-primary text-white font-black text-xs uppercase tracking-widest shadow-lg shadow-primary/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                Publish Changes
            </button>
        </div>
    </div>
</div>

<form id="service-edit-form" action="{{ route('admin.services.update', $service) }}" method="POST">
    @csrf @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- MAIN EDITORIAL COLUMN -->
        <div class="lg:col-span-8">
            
            <!-- Dynamic Section Builder -->
            <div class="mb-10">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-sm">view_quilt</span>
                        </div>
                        <h2 class="text-lg font-bold text-slate-800">Page Content Architecture</h2>
                    </div>
                    <div class="flex items-center gap-2">
                        <select id="section-type-selector" class="border border-slate-200 rounded-lg px-4 py-2 text-sm font-medium bg-white focus:ring-2 focus:ring-primary/10 transition-all">
                            <option value="">-- Add New Building Block --</option>
                            @foreach($availableSections as $type => $info)
                                <option value="{{ $type }}">{{ $info['name'] }}</option>
                            @endforeach
                        </select>
                        <button type="button" id="add-section-btn" class="w-10 h-10 rounded-lg bg-slate-900 text-white flex items-center justify-center hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-xl">add</span>
                        </button>
                    </div>
                </div>

                <div id="sections-container" class="space-y-4">
                    <input type="hidden" name="sections_builder_active" value="1">
                    @foreach($service->sections as $index => $section)
                        @include('admin.sections.form_wrapper', [
                            'section' => $section,
                            'type' => $section->type,
                            'index' => $index,
                            'schema' => \App\Services\SectionRegistry::getSchema($section->type)
                        ])
                    @endforeach

                    @if($service->sections->isEmpty())
                        <div class="empty-state py-24 text-center border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50/50">
                            <div class="w-16 h-16 rounded-full bg-white shadow-sm flex items-center justify-center mx-auto mb-4">
                                <span class="material-symbols-outlined text-3xl text-slate-300">layer_adaptive</span>
                            </div>
                            <h4 class="text-slate-600 font-bold mb-1">No custom sections yet.</h4>
                            <p class="text-slate-400 text-xs">Add sections from the menu above to build a premium landing page.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Legacy Fallback Content -->
            <div class="mt-16 bg-slate-50 border border-slate-200 rounded-2xl p-10">
                <div class="flex items-center gap-3 mb-8 opacity-40">
                    <span class="material-symbols-outlined text-2xl">history</span>
                    <h3 class="text-lg font-bold text-slate-800 uppercase tracking-widest text-xs">Standard Page Fallback</h3>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Short Description</label>
                        <textarea name="short_description" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/5 shadow-sm" rows="3">{{ $service->short_description }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Main Body Narrative</label>
                        <textarea name="description" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/5 shadow-sm" rows="8">{{ $service->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- STICKY SIDEBAR -->
        <div class="lg:col-span-4 lg:sticky lg:top-8">
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden mb-6">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-sm">settings</span>
                        Publish Settings
                    </h3>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase mb-2">Service Name</label>
                        <input type="text" name="name" class="w-full bg-slate-50 border-none rounded-lg px-4 py-2.5 text-xs font-bold text-slate-600 focus:ring-2 focus:ring-primary/5" value="{{ $service->name }}" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase mb-2">Url Slug</label>
                        <input type="text" name="slug" class="w-full bg-slate-50 border-none rounded-lg px-4 py-2.5 text-xs font-bold text-slate-600 focus:ring-2 focus:ring-primary/5" value="{{ $service->slug }}" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase mb-2">Academic Category</label>
                        <select name="category_id" class="w-full bg-slate-50 border-none rounded-lg px-4 py-2.5 text-xs font-bold text-slate-600 focus:ring-2 focus:ring-primary/5">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $service->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg">
                        <span class="text-xs font-bold text-slate-600">Active Status</span>
                        <div class="form-switch">
                            <input type="checkbox" name="is_published" value="1" {{ $service->is_published ? 'checked' : '' }} class="rounded text-primary h-5 w-5">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-900 rounded-2xl p-6 text-white overflow-hidden relative mb-6">
                <span class="material-symbols-outlined absolute -top-4 -right-4 text-7xl opacity-10">search</span>
                <h4 class="font-bold mb-4 text-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-xs">manage_search</span>
                    SEO Metadata
                </h4>
                <div class="space-y-4">
                    <input type="text" name="seo_metadata[title]" placeholder="Meta Title" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-xs text-white/70" value="{{ $service->seo_metadata['title'] ?? '' }}">
                    <textarea name="seo_metadata[description]" placeholder="Meta Description" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-xs text-white/70" rows="3">{{ $service->seo_metadata['description'] ?? '' }}</textarea>
                </div>
            </div>

            <!-- Protocol Advice -->
            <div class="bg-primary/5 border border-primary/20 rounded-2xl p-6">
                <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-3">Editorial Protocol</p>
                <p class="text-xs text-primary/80 leading-relaxed mb-4">
                    "Ensure sections are ordered logically. Use specific PhD-level terminology for best academic positioning."
                </p>
                <ul class="text-[9px] font-bold text-primary/60 uppercase tracking-tighter space-y-1">
                    <li class="flex items-center gap-2"><span class="w-1 h-1 bg-primary/40 rounded-full"></span> Validate all outgoing research links</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 bg-primary/40 rounded-full"></span> Use high-resolution library visuals</li>
                </ul>
            </div>
        </div>
    </div>
</form>

@push('styles')
<style>
    .section-handle { cursor: grab; }
    .section-handle:active { cursor: grabbing; }
    /* No generic CSS that might conflict globally */
</style>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        corePlugins: {
            preflight: false,
        },
        theme: {
            extend: {
                colors: {
                    primary: '#000B20',
                }
            }
        }
    }
</script>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('sections-container');
        
        if (container) {
            new Sortable(container, {
                handle: '.section-handle', // Drag handle explicitly isolated to the icon
                animation: 250,
                ghostClass: 'opacity-50',
                onEnd: function() { reindexSections(); }
            });
        }

        // Add Section Logic
        const addBtn = document.getElementById('add-section-btn');
        if(addBtn){
            addBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const selector = document.getElementById('section-type-selector');
                if (!selector.value) return;

                const index = container.querySelectorAll('.section-item').length;
                fetch(`{{ route('admin.pages.sections.get-form') }}?type=${selector.value}&index=${index}`)
                    .then(r => r.text())
                    .then(html => {
                        const empty = container.querySelector('.empty-state');
                        if (empty) empty.remove();
                        
                        const div = document.createElement('div');
                        div.innerHTML = html.trim();
                        container.appendChild(div.firstChild);
                        selector.value = '';
                    });
            });
        }

        // Main Container Event Delegation
        if(container){
            container.addEventListener('click', function(e) {
                if (e.target.closest('.toggle-section')) {
                    e.preventDefault();
                    const item = e.target.closest('.section-item');
                    const content = item.querySelector('.section-content');
                    const btnIcon = e.target.closest('.toggle-section').querySelector('.material-symbols-outlined');
                    
                    content.classList.toggle('hidden');
                    btnIcon.classList.toggle('rotate-180');
                }

                // 3. Remove Section
                if (e.target.closest('.remove-section')) {
                    e.preventDefault();
                    if (confirm('Permanently remove this section block?')) {
                        e.target.closest('.section-item').remove();
                        reindexSections();
                    }
                }

                // 4. Add Repeater Sub-Item
                if (e.target.closest('.add-repeater-item')) {
                    e.preventDefault();
                    const repeater = e.target.closest('.repeater-field');
                    const items = repeater.querySelector('.repeater-items');
                    const template = repeater.querySelector('.repeater-item-template').innerHTML;
                    const index = items.querySelectorAll('.repeater-item').length;
                    items.insertAdjacentHTML('beforeend', template.replace(/__ITEM_INDEX__/g, index));
                }

                // 5. Remove Repeater Sub-Item
                if (e.target.closest('.remove-repeater-item')) {
                    e.preventDefault();
                    e.target.closest('.repeater-item').remove();
                }
            });
        }

        function reindexSections() {
            container.querySelectorAll('.section-item').forEach((item, i) => {
                item.querySelectorAll('[name^="sections["]').forEach(inp => {
                    inp.name = inp.name.replace(/sections\[\d+\]/, `sections[${i}]`);
                });
            });
        }
    });
</script>
@endpush
@endsection
