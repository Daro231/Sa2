@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="max-w-4xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8">My Orders</h1>

    @if($orders->count() > 0)
        @foreach($orders as $order)
            <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="text-gray-600">Order #{{ $order->order_number }}</span>
                        <span class="ml-4 px-2 py-1 bg-{{ $order->status === 'completed' ? 'green' : 'yellow' }}-100 text-{{ $order->status === 'completed' ? 'green' : 'yellow' }}-800 rounded text-sm">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <span class="text-gray-600">{{ $order->created_at->format('d M Y') }}</span>
                </div>

                <div class="space-y-2 mb-4">
                    @foreach($order->items as $item)
                        <div class="flex justify-between">
                            <span>{{ $item->quantity }}x {{ $item->product_name }}</span>
                            <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t pt-4 flex justify-between items-center">
                    <span class="font-semibold">Total: ${{ number_format($order->total_amount, 2) }}</span>
                    <a href="/orders/receipt/{{ $order->id }}" class="text-blue-500 hover:text-blue-600">
                        View Receipt
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center py-12">
            <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-xl mb-4">No orders yet</p>
            <a href="/products" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                Start Shopping
            </a>
        </div>
    @endif
</div>
@endsection