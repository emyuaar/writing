@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Post: {{ $post->title }}</h1>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<form action="{{ route('admin.posts.update', $post) }}" method="POST">
    @csrf @method('PUT')
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
        <div class="card">
            <h3 style="margin-bottom: 1.5rem;">Post Content</h3>
            <div class="form-group">
                <label>Post Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug', $post->slug) }}" required>
            </div>
            
            <div class="form-group">
                <label>Excerpt</label>
                <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div class="form-group">
                <label>Main Body Content</label>
                <textarea name="content" class="form-control" rows="15" required>{{ old('content', $post->content) }}</textarea>
            </div>
        </div>

        <div>
            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">Categorization & SEO</h3>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach(App\Models\Category::where('type', 'blog')->get() as $cat)
                            <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Featured Image URL</label>
                    <input type="text" name="featured_image" class="form-control" value="{{ old('featured_image', $post->featured_image) }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="is_published" class="form-control">
                        <option value="1" {{ $post->is_published ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ !$post->is_published ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
            </div>

            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">SEO Metadata</h3>
                <div class="form-group">
                    <label>SEO Title</label>
                    <input type="text" name="seo_metadata[title]" class="form-control" value="{{ $post->seo_metadata['title'] ?? '' }}">
                </div>
                <div class="form-group">
                    <label>SEO Description</label>
                    <textarea name="seo_metadata[description]" class="form-control" rows="3">{{ $post->seo_metadata['description'] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 2rem; background: white; padding: 1.5rem; border-radius: 0.75rem; display: flex; justify-content: flex-end; gap: 1rem;">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </div>
</form>
@endsection
