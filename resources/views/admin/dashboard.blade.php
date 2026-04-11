@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard Overview</h1>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
    <div class="card">
        <div style="font-size: 0.875rem; font-weight: 700; color: #666; margin-bottom: 0.5rem;">TOTAL PAGES</div>
        <div style="font-size: 2rem; font-weight: 800;">{{ $stats['pages'] }}</div>
    </div>
    <div class="card">
        <div style="font-size: 0.875rem; font-weight: 700; color: #666; margin-bottom: 0.5rem;">SERVICES</div>
        <div style="font-size: 2rem; font-weight: 800;">{{ $stats['services'] }}</div>
    </div>
    <div class="card">
        <div style="font-size: 0.875rem; font-weight: 700; color: #666; margin-bottom: 0.5rem;">NEW INQUIRIES</div>
        <div style="font-size: 2rem; font-weight: 800; color: var(--secondary);">{{ $stats['inquiries'] }}</div>
    </div>
    <div class="card">
        <div style="font-size: 0.875rem; font-weight: 700; color: #666; margin-bottom: 0.5rem;">PENDING ORDERS</div>
        <div style="font-size: 2rem; font-weight: 800;">{{ $stats['orders'] }}</div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
    <div class="card">
        <h3 style="margin-bottom: 1.5rem;">Recent Inquiries</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentInquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->name }}</td>
                    <td><span class="badge badge-info">{{ $inquiry->type }}</span></td>
                    <td>{{ $inquiry->created_at->format('M d') }}</td>
                    <td><a href="{{ route('admin.inquiries.show', $inquiry) }}" style="color: var(--secondary); font-weight: 700;">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card">
        <h3 style="margin-bottom: 1.5rem;">Recent Orders</h3>
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td><span class="badge badge-warning">{{ $order->status }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
