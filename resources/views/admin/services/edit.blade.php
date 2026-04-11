@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Service: {{ $service->name }}</h1>
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<form action="{{ route('admin.services.update', $service) }}" method="POST">
    @csrf @method('PUT')
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
        <div class="card">
            <h3 style="margin-bottom: 1.5rem;">Basic Information</h3>
            <div class="form-group">
                <label>Service Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $service->name) }}" required>
            </div>
            
            <div class="form-group">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug', $service->slug) }}" required>
                <small>URL: /services/<strong>{{ $service->slug }}</strong></small>
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description', $service->short_description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Main Content (Description)</label>
                <textarea name="description" class="form-control" rows="10" required>{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Key Features (One per line)</label>
                <textarea name="features" class="form-control" rows="6">{{ old('features', $service->features) }}</textarea>
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
                            <option value="{{ $cat->id }}" {{ $service->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Banner Image URL</label>
                    <input type="text" name="banner_image" class="form-control" value="{{ old('banner_image', $service->banner_image) }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="is_published" class="form-control">
                        <option value="1" {{ $service->is_published ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ !$service->is_published ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem;">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" {{ $service->is_featured ? 'checked' : '' }}>
                    <label for="is_featured" style="margin: 0;">Mark as Featured</label>
                </div>
            </div>

            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">SEO Metadata</h3>
                <div class="form-group">
                    <label>SEO Title</label>
                    <input type="text" name="seo_metadata[title]" class="form-control" value="{{ old('seo_metadata.title', $service->seo_metadata['title'] ?? '') }}">
                </div>
                <div class="form-group">
                    <label>SEO Description</label>
                    <textarea name="seo_metadata[description]" class="form-control" rows="3">{{ old('seo_metadata.description', $service->seo_metadata['description'] ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 2rem; background: white; padding: 1.5rem; border-radius: 0.75rem; display: flex; justify-content: flex-end; gap: 1rem;">
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Update Service</button>
    </div>
</form>
@endsection
