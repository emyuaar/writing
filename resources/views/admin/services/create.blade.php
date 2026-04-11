@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add New Service</h1>
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<form action="{{ route('admin.services.store') }}" method="POST">
    @csrf
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
        <div class="card">
            <h3 style="margin-bottom: 1.5rem;">Basic Information</h3>
            <div class="form-group">
                <label>Service Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            
            <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description') }}</textarea>
                <small>Displayed in grids and excerpts.</small>
            </div>

            <div class="form-group">
                <label>Main Content (Description)</label>
                <textarea name="description" class="form-control" rows="10" required>{{ old('description') }}</textarea>
                <small>Full detail page content.</small>
            </div>

            <div class="form-group">
                <label>Key Features (One per line)</label>
                <textarea name="features" class="form-control" rows="6" placeholder="PhD Certified Experts&#10;Plagiarism Free Guarantee&#10;24/7 Academic Support">{{ old('features') }}</textarea>
                <small>Enter each feature on a new line. These will be displayed as bullet points on the frontend.</small>
            </div>
        </div>

        <div>
            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">Categories & Settings</h3>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach(App\Models\Category::where('type', 'service')->get() as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Banner Image URL</label>
                    <input type="text" name="banner_image" class="form-control" value="{{ old('banner_image') }}" placeholder="https://...">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="is_published" class="form-control">
                        <option value="1">Published</option>
                        <option value="0">Draft</option>
                    </select>
                </div>

                <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem;">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured">
                    <label for="is_featured" style="margin: 0;">Mark as Featured</label>
                </div>
            </div>

            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">SEO Metadata</h3>
                <div class="form-group">
                    <label>SEO Title</label>
                    <input type="text" name="seo_metadata[title]" class="form-control" value="{{ old('seo_metadata.title') }}">
                </div>
                <div class="form-group">
                    <label>SEO Description</label>
                    <textarea name="seo_metadata[description]" class="form-control" rows="3">{{ old('seo_metadata.description') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 2rem; background: white; padding: 1.5rem; border-radius: 0.75rem; display: flex; justify-content: flex-end; gap: 1rem;">
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Save Service</button>
    </div>
</form>
@endsection
