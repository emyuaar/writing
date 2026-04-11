@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Manage Services</h1>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Create New Service</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Service Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Featured</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td><strong>{{ $service->name }}</strong></td>
                <td>{{ $service->category->name ?? 'N/A' }}</td>
                <td>
                    @if($service->is_published)
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge badge-warning">Draft</span>
                    @endif
                </td>
                <td>
                    @if($service->is_featured)
                        <span class="badge badge-info">Yes</span>
                    @else
                        <span class="badge badge-secondary">No</span>
                    @endif
                </td>
                <td style="text-align: right;">
                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this service?')">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 1rem;">
        {{ $services->links() }}
    </div>
</div>
@endsection
