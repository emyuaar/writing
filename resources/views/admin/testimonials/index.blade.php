@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Testimonials</h1>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add Testimonial</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Student/Client</th>
                <th>Role/Institution</th>
                <th>Status</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $testimonial)
            <tr>
                <td><strong>{{ $testimonial->name }}</strong></td>
                <td>{{ $testimonial->role }} {{ $testimonial->institution ? '('.$testimonial->institution.')' : '' }}</td>
                <td>
                    <span class="badge {{ $testimonial->is_visible ? 'badge-success' : 'badge-warning' }}">
                        {{ $testimonial->is_visible ? 'Visible' : 'Hidden' }}
                    </span>
                </td>
                <td style="text-align: right;">
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this testimonial?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">No testimonials found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 1rem;">
        {{ $testimonials->links() }}
    </div>
</div>
@endsection
