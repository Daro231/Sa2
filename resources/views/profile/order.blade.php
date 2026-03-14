@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="{{ route('profile.show') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Profile
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-8">
            <h1 class="text-2xl font-bold text-white">My Orders</h1>
            <p class="text-blue-100">View your order history</p>
        </div>

        <div class="p-6">
            @if($orders->count() > 0)
                <!-- Order Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ $orders->total() }}</div>
                        <div class="text-sm text-gray-600">Total Orders</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <div class="text-2xl font-bold text-green-600">
                            {{ $orders->where('payment_status', 'completed')->count() }}
                        </div>
                        <div class="text-sm text-gray-600">Completed</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <div class="text-2xl font-bold text-yellow-600">
                            {{ $orders->where('status', 'processing')->count() }}
                        </div>
                        <div class="text-sm text-gray-600">Processing</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <div class="text-2xl font-bold text-blue-600">
                            ${{ number_format($orders->sum('total_amount'), 0) }}
                        </div>
                        <div class="text-sm text-gray-600">Total Spent</div>
                    </div>
                </div>

                <!-- Orders List -->
                <div class="space-y-4">
                    @foreach($orders as $order)
                        <div class="border rounded-lg overflow-hidden hover:shadow-lg transition duration-200">
                            <!-- Order Header -->
                            <div class="bg-gray-50 px-6 py-4 flex flex-wrap items-center justify-between">
                                <div>
                                    <span class="text-sm text-gray-600">Order #</span>
                                    <span class="font-medium text-gray-900">{{ $order->order_number }}</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y - h:i A') }}</span>
                                    <span class="px-3 py-1 text-xs rounded-full 
                                        @if($order->status == 'completed') bg-green-100 text-green-800
                                        @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                        @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                    <span class="px-3 py-1 text-xs rounded-full 
                                        @if($order->payment_status == 'completed') bg-green-100 text-green-800
                                        @elseif($order->payment_status == 'failed') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        Payment: {{ ucfirst($order->payment_status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Order Items -->
                            <div class="p-6">
                                <div class="space-y-3">
                                    @foreach($order->items as $item)
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <span class="text-gray-600">{{ $item->quantity }}x</span>
                                                <span class="ml-2 font-medium text-gray-900">{{ $item->product_name }}</span>
                                            </div>
                                            <span class="text-gray-900">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Order Footer -->
                                <div class="mt-4 pt-4 border-t flex flex-wrap items-center justify-between">
                                    <div>
                                        <span class="text-sm text-gray-600">Shipping to:</span>
                                        <span class="ml-2 text-sm text-gray-900">{{ $order->full_name }}, {{ $order->city }}, {{ $order->country }}</span>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="text-lg font-bold text-gray-900">Total: ${{ number_format($order->total_amount, 2) }}</span>
                                        <a href="{{ route('checkout.receipt', $order->id) }}" 
                                           class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-receipt"></i> View Receipt
                                        </a>
                                        @if($order->status == 'pending')
                                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Are you sure you want to cancel this order?')"
                                                        class="text-red-600 hover:text-red-800">
                                                    <i class="fas fa-times-circle"></i> Cancel
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="text-6xl text-gray-300 mb-4">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">No orders yet</h3>
                    <p class="text-gray-600 mb-6">Looks like you haven't placed any orders yet.</p>
                    <a href="{{ route('products.index') }}" 
                       class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection