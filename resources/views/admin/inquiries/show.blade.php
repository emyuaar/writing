@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Inquiry Details</h1>
    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
    <div class="card">
        <h3 style="margin-bottom: 1.5rem;">Message Content</h3>
        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 0.5rem; border: 1px solid #ddd; min-height: 200px;">
            {{ $inquiry->message }}
        </div>
        
        <div style="margin-top: 2rem; display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
                <strong>Service Reference:</strong>
                <p>{{ $inquiry->service_reference ?? 'N/A' }}</p>
            </div>
            <div>
                <strong>Source URL:</strong>
                <p><small>{{ $inquiry->source_url }}</small></p>
            </div>
        </div>
    </div>

    <div>
        <div class="card">
            <h3 style="margin-bottom: 1.5rem;">Customer Info</h3>
            <p><strong>Name:</strong> {{ $inquiry->name }}</p>
            <p><strong>Email:</strong> {{ $inquiry->email }}</p>
            <p><strong>Phone:</strong> {{ $inquiry->phone ?? 'N/A' }}</p>
            <p><strong>Date:</strong> {{ $inquiry->created_at->format('M d, Y H:i') }}</p>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 1.5rem;">Update Status</h3>
            <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="new" {{ $inquiry->status == 'new' ? 'selected' : '' }}>New</option>
                        <option value="read" {{ $inquiry->status == 'read' ? 'selected' : '' }}>Read</option>
                        <option value="contacted" {{ $inquiry->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="closed" {{ $inquiry->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Save Status</button>
            </form>
        </div>
    </div>
</div>
@endsection
