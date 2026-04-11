@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">{{ $page->title }}</h1>
        <p class="text-slate-400 text-sm">Manage sections and content for this page.</p>
    </div>
    <div class="flex gap-3">
        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
            <span class="material-symbols-outlined mr-2">arrow_back</span>
            Back
        </a>
        <button form="page-edit-form" type="submit" class="btn btn-primary">
            <span class="material-symbols-outlined mr-2">save</span>
            Save Changes
        </button>
    </div>
</div>

<form id="page-edit-form" action="{{ route('admin.pages.update', $page) }}" method="POST">
    @csrf @method('PUT')
    
    <div style="display: grid; grid-template-columns: 1fr 350px; gap: 2rem; align-items: start;">
        <!-- Left: Section Builder -->
        <div>
            <div class="card">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-xl font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">view_quilt</span>
                        Section Builder
                    </h3>
                    <div class="flex gap-2">
                        <select id="section-type-selector" class="form-control" style="width: 250px;">
                            <option value="">-- Add New Section --</option>
                            @foreach($availableSections as $type => $info)
                                <option value="{{ $type }}">{{ $info['name'] }}</option>
                            @endforeach
                        </select>
                        <button type="button" id="add-section-btn" class="btn btn-primary btn-sm">
                            <span class="material-symbols-outlined">add</span>
                        </button>
                    </div>
                </div>

                <div id="sections-container" class="space-y-6">
                    @foreach($page->sections as $index => $section)
                        @include('admin.sections.form_wrapper', [
                            'section' => $section,
                            'type' => $section->type,
                            'index' => $index,
                            'schema' => \App\Services\SectionRegistry::getSchema($section->type)
                        ])
                    @endforeach

                    @if($page->sections->isEmpty())
                        <div class="empty-state py-20 text-center border-2 border-dashed border-slate-200 rounded-xl">
                            <span class="material-symbols-outlined text-6xl text-slate-200 mb-4">layer_adaptive</span>
                            <p class="text-slate-400 font-medium">No sections added yet. Select a type above to start building.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right: Sidebar Settings -->
        <div style="position: sticky; top: 2rem;">
            <div class="card">
                <h4 class="font-bold mb-4 uppercase text-xs tracking-widest text-slate-400">Page Settings</h4>
                <div class="form-group">
                    <label>Page Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $page->slug) }}" required>
                </div>
                <div class="form-group">
                    <label>Visibility</label>
                    <select name="is_published" class="form-control">
                        <option value="1" {{ $page->is_published ? 'selected' : '' }}>Published (Live)</option>
                        <option value="0" {{ !$page->is_published ? 'selected' : '' }}>Draft (Admin Only)</option>
                    </select>
                </div>
            </div>

            <div class="card">
                <h4 class="font-bold mb-4 uppercase text-xs tracking-widest text-slate-400">SEO Metadata</h4>
                <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" name="seo_metadata[title]" class="form-control" value="{{ $page->seo_metadata['title'] ?? '' }}" placeholder="SEO Title">
                </div>
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="seo_metadata[description]" class="form-control" rows="4" placeholder="Brief summary for search engines...">{{ $page->seo_metadata['description'] ?? '' }}</textarea>
                </div>
            </div>

            <div class="card" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                <p class="text-xs text-slate-500 leading-relaxed">
                    <strong>Pro Tip:</strong> Reorder sections by dragging the handle. Changes are only permanent after clicking <strong>Save Changes</strong>.
                </p>
            </div>
        </div>
    </div>
</form>

@push('styles')
<style>
    /* Scoped Tailwind-like utils for builder */
    .flex { display: flex; }
    .flex-col { flex-direction: column; }
    .items-center { align-items: center; }
    .justify-between { justify-content: space-between; }
    .gap-2 { gap: 0.5rem; }
    .gap-3 { gap: 0.75rem; }
    .gap-4 { gap: 1rem; }
    .space-y-6 > * + * { margin-top: 1.5rem; }
    .space-y-4 > * + * { margin-top: 1rem; }
    .mr-2 { margin-right: 0.5rem; }
    .mb-2 { margin-bottom: 0.5rem; }
    .mb-4 { margin-bottom: 1rem; }
    .mb-6 { margin-bottom: 1.5rem; }
    .mb-8 { margin-bottom: 2rem; }
    .pt-8 { border-top-width: 1px; padding-top: 2rem; }
    .p-6 { padding: 1.5rem; }
    .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
    .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
    .rounded-lg { border-radius: 0.5rem; }
    .rounded-xl { border-radius: 0.75rem; }
    .bg-white { background-color: #ffffff; }
    .bg-slate-50 { background-color: #f8fafc; }
    .border { border: 1px solid #e2e8f0; }
    .border-b { border-bottom: 1px solid #e2e8f0; }
    .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
    .text-sm { font-size: 0.875rem; }
    .text-xs { font-size: 0.75rem; }
    .font-bold { font-weight: 700; }
    .uppercase { text-transform: uppercase; }
    .tracking-widest { letter-spacing: 0.1em; }
    .tracking-wide { letter-spacing: 0.025em; }
    .text-slate-400 { color: #94a3b8; }
    .text-slate-600 { color: #475569; }
    .text-slate-700 { color: #334155; }
    .overflow-hidden { overflow: hidden; }
    
    /* Builder Specific */
    .section-handle { cursor: grab; }
    .section-handle:active { cursor: grabbing; }
    .section-content.collapsed { display: none; }
    
    .repeater-item { border: 1px solid #e2e8f0; border-radius: 0.5rem; margin-bottom: 1rem; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('sections-container');
        
        // Initialize Drag and Drop
        new Sortable(container, {
            handle: '.section-handle',
            animation: 150,
            ghostClass: 'bg-slate-100',
            onEnd: function() {
                reindexSections();
            }
        });

        // Add Section
        document.getElementById('add-section-btn').addEventListener('click', function() {
            const selector = document.getElementById('section-type-selector');
            const type = selector.value;
            if (!type) return;

            const index = container.querySelectorAll('.section-item').length;
            
            fetch(`{{ route('admin.pages.sections.get-form') }}?type=${type}&index=${index}`)
                .then(response => response.text())
                .then(html => {
                    if (container.querySelector('.empty-state')) {
                        container.querySelector('.empty-state').remove();
                    }
                    container.insertAdjacentHTML('beforeend', html);
                    selector.value = '';
                });
        });

        // Event Delegation for Section Controls
        container.addEventListener('click', function(e) {
            // Remove Section
            if (e.target.closest('.remove-section')) {
                if (confirm('Are you sure you want to remove this section?')) {
                    e.target.closest('.section-item').remove();
                    reindexSections();
                }
            }

            // Toggle Collapse
            if (e.target.closest('.toggle-section')) {
                const btn = e.target.closest('.toggle-section');
                const content = btn.closest('.section-item').querySelector('.section-content');
                const icon = btn.querySelector('.material-symbols-outlined');
                
                content.classList.toggle('collapsed');
                icon.style.transform = content.classList.contains('collapsed') ? 'rotate(-90deg)' : 'rotate(0deg)';
            }

            // Add Repeater Item
            if (e.target.closest('.add-repeater-item')) {
                const btn = e.target.closest('.add-repeater-item');
                const repeater = btn.closest('.repeater-field');
                const itemsContainer = repeater.querySelector('.repeater-items');
                const template = repeater.querySelector('.repeater-item-template').innerHTML;
                
                const itemIndex = itemsContainer.querySelectorAll('.repeater-item').length;
                const html = template.replace(/__ITEM_INDEX__/g, itemIndex);
                
                itemsContainer.insertAdjacentHTML('beforeend', html);
            }

            // Remove Repeater Item
            if (e.target.closest('.remove-repeater-item')) {
                e.target.closest('.repeater-item').remove();
                // We don't necessarily need to reindex sub-items unless the order matters greatly, 
                // but let's keep it simple for now.
            }
        });

        function reindexSections() {
            container.querySelectorAll('.section-item').forEach((item, index) => {
                // Update names for top-level inputs
                item.querySelectorAll('[name^="sections["]').forEach(input => {
                    input.name = input.name.replace(/sections\[\d+\]/, `sections[${index}]`);
                });
            });
        }
    });
</script>
@endpush
@endsection
