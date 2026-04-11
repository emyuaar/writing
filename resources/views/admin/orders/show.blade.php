@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Order #{{ $order->order_number }}</h1>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
    <div class="card">
        <h3 style="margin-bottom: 1.5rem;">Order Details</h3>
        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 0.5rem; border: 1px solid #ddd; min-height: 150px;">
            {{ $order->order_details }}
        </div>
        
        <div style="margin-top: 2rem;">
            <strong>Requested Service:</strong>
            <p>{{ $order->service->name ?? 'N/A' }}</p>
        </div>
    </div>

    <div>
        <div class="card">
            <h3 style="margin-bottom: 1.5rem;">Customer Info</h3>
            <p><strong>Name:</strong> {{ $order->customer_name }}</p>
            <p><strong>Email:</strong> {{ $order->customer_email }}</p>
            <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 1.5rem;">Management</h3>
            <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Order Status</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Payment Status</label>
                    <select name="payment_status" class="form-control">
                        <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        <option value="partial" {{ $order->payment_status == 'partial' ? 'selected' : '' }}>Partial</option>
                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="refunded" {{ $order->payment_status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Amount (GBP)</label>
                    <input type="number" step="0.01" name="amount" value="{{ $order->amount }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Update Order</button>
            </form>
        </div>
    </div>
</div>
@endsection
