@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Manage Orders</h1>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Order #</th>
                <th>Customer</th>
                <th>Service</th>
                <th>Status</th>
                <th>Date</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td><strong>{{ $order->order_number }}</strong></td>
                <td>{{ $order->customer_name }}<br><small>{{ $order->customer_email }}</small></td>
                <td>{{ $order->service->name ?? 'N/A' }}</td>
                <td>
                    <span class="badge badge-info">{{ $order->status }}</span>
                </td>
                <td>{{ $order->created_at->format('M d, Y') }}</td>
                <td style="text-align: right;">
                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-secondary">View</a>
                    <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this order?')">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 1rem;">
        {{ $orders->links() }}
    </div>
</div>
@endsection
