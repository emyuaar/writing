@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Manage FAQs</h1>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Add New FAQ</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Question</th>
                <th>Category</th>
                <th>Status</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($faqs as $faq)
            <tr>
                <td><strong>{{ $faq->question }}</strong></td>
                <td>{{ $faq->category ?? 'General' }}</td>
                <td>
                    <span class="badge {{ $faq->is_visible ? 'badge-success' : 'badge-warning' }}">
                        {{ $faq->is_visible ? 'Visible' : 'Hidden' }}
                    </span>
                </td>
                <td style="text-align: right;">
                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this FAQ?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">No FAQs found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 1rem;">
        {{ $faqs->links() }}
    </div>
</div>
@endsection
