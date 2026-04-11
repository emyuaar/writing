@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Manage Inquiries</h1>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Subject/Service</th>
                <th>Status</th>
                <th>Date</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inquiries as $inquiry)
            <tr>
                <td><strong>{{ $inquiry->name }}</strong><br><small>{{ $inquiry->email }}</small></td>
                <td><span class="badge badge-info">{{ $inquiry->type }}</span></td>
                <td>{{ $inquiry->service_reference ?? $inquiry->subject }}</td>
                <td>
                    <span class="badge {{ $inquiry->status == 'new' ? 'badge-warning' : 'badge-success' }}">
                        {{ $inquiry->status }}
                    </span>
                </td>
                <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                <td style="text-align: right;">
                    <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-secondary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 1rem;">
        {{ $inquiries->links() }}
    </div>
</div>
@endsection
