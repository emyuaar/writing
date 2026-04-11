@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Manage Pages</h1>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Create New Page</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Created At</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
            <tr>
                <td><strong>{{ $page->title }}</strong></td>
                <td><code style="background: #eee; padding: 2px 5px; border-radius: 4px;">/{{ $page->slug }}</code></td>
                <td>
                    @if($page->is_published)
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge badge-warning">Draft</span>
                    @endif
                </td>
                <td>{{ $page->created_at->format('M d, Y') }}</td>
                <td style="text-align: right;">
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-secondary" style="padding: 0.5rem 1rem;">Edit</a>
                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 0.5rem 1rem;" onclick="return confirm('Delete this page?')">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 1rem;">
        {{ $pages->links() }}
    </div>
</div>
@endsection
