@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Blog Posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create New Post</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td><strong>{{ $post->title }}</strong></td>
                <td>{{ $post->author->name ?? 'Admin' }}</td>
                <td>{{ $post->category->name ?? 'N/A' }}</td>
                <td>
                    @if($post->is_published)
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge badge-warning">Draft</span>
                    @endif
                </td>
                <td>{{ $post->created_at->format('M d, Y') }}</td>
                <td style="text-align: right;">
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this post?')">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 1rem;">
        {{ $posts->links() }}
    </div>
</div>
@endsection
