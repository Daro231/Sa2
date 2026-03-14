@extends('layouts.app')

@section('title', 'Order Receipt')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Receipt -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-8 py-8 text-center">
            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check-circle text-4xl text-green-500"></i>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Payment Successful!</h1>
            <p class="text-green-100">Thank you for your purchase</p>
        </div>

        <!-- Receipt Content -->
        <div class="p-8">
            <!-- Company Info -->
            <div class="text-center mb-8 pb-8 border-b">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">YOUR COMPANY NAME</h2>
                <p class="text-gray-600">No. 86A, Street 110, Russian Federation Blvd (110)</p>
                <p class="text-gray-600">Phnom Penh, Cambodia</p>
                <p class="text-gray-600">company@gmail.com | +885 0962 460 507</p>
            </div>

            <!-- Order Info -->
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div>
                    <h3 class="font-semibold text-gray-700 mb-2">Order Information</h3>
                    <p class="text-gray-600"><span class="font-medium">Order Number:</span> {{ $order->order_number }}</p>
                    <p class="text-gray-600"><span class="font-medium">Order Date:</span> {{ $order->created_at->format('F d, Y') }}</p>
                    <p class="text-gray-600"><span class="font-medium">Payment Method:</span> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                    <p class="text-gray-600"><span class="font-medium">Payment Status:</span> 
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">{{ ucfirst($order->payment_status) }}</span>
                    </p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-700 mb-2">Shipping Address</h3>
                    <p class="text-gray-600">{{ $order->full_name }}</p>
                    <p class="text-gray-600">{{ $order->street_address }}</p>
                    @if($order->street_address2)
                        <p class="text-gray-600">{{ $order->street_address2 }}</p>
                    @endif
                    <p class="text-gray-600">{{ $order->city }}, {{ $order->state }} {{ $order->zip_code }}</p>
                    <p class="text-gray-600">Phone: {{ $order->phone_number }}</p>
                    <p class="text-gray-600">Email: {{ $order->email }}</p>
                </div>
            </div>

            <!-- Order Items -->
            <div class="mb-8">
                <h3 class="font-semibold text-gray-700 mb-4">Order Items</h3>
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Product</th>
                            <th class="text-center py-3 px-4 text-sm font-medium text-gray-600">Quantity</th>
                            <th class="text-right py-3 px-4 text-sm font-medium text-gray-600">Price</th>
                            <th class="text-right py-3 px-4 text-sm font-medium text-gray-600">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($order->items as $item)
                        <tr>
                            <td class="py-4 px-4">
                                <div class="font-medium text-gray-800">{{ $item->product_name }}</div>
                            </td>
                            <td class="text-center py-4 px-4 text-gray-600">{{ $item->quantity }}</td>
                            <td class="text-right py-4 px-4 text-gray-600">${{ number_format($item->price, 2) }}</td>
                            <td class="text-right py-4 px-4 font-medium text-gray-800">${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Price Summary -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <div class="flex justify-between text-gray-600 mb-2">
                    <span>Subtotal</span>
                    <span>${{ number_format($order->subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between text-gray-600 mb-2">
                    <span>Shipping</span>
                    <span>${{ number_format($order->shipping, 2) }}</span>
                </div>
                <div class="flex justify-between text-gray-600 mb-4">
                    <span>Tax (10%)</span>
                    <span>${{ number_format($order->tax, 2) }}</span>
                </div>
                <div class="flex justify-between text-xl font-bold pt-4 border-t">
                    <span>Total</span>
                    <span class="text-green-600">${{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('orders.history') }}" 
                   class="bg-gray-100 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-200 transition duration-200 flex items-center justify-center">
                    <i class="fas fa-history mr-2"></i>
                    View Order History
                </a>
                <a href="{{ route('products.index') }}" 
                   class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-200 flex items-center justify-center">
                    <i class="fas fa-shopping mr-2"></i>
                    Continue Shopping
                </a>
                <button onclick="window.print()" 
                        class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition duration-200 flex items-center justify-center">
                    <i class="fas fa-print mr-2"></i>
                    Print Receipt
                </button>
            </div>

            <!-- Footer Note -->
            <p class="text-center text-sm text-gray-500 mt-8">
                This is an electronically generated receipt. No signature required.
            </p>
        </div>
    </div>
</div>
@endsection