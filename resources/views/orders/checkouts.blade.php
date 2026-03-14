@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="{{ route('cart.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Cart
        </a>
    </div>

    <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
        @csrf
        
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Shipping Information -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <h2 class="text-2xl font-semibold mb-6">Shipping Information</h2>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                            <input type="text" name="full_name" id="full_name" 
                                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('full_name') border-red-500 @enderror"
                                   value="{{ old('full_name', $user->full_name ?? '') }}" required>
                            @error('full_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" name="email" id="email" 
                                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                                   value="{{ old('email', $user->email ?? '') }}" required>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="street_address" class="block text-sm font-medium text-gray-700 mb-2">Street Address *</label>
                            <input type="text" name="street_address" id="street_address" 
                                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('street_address') border-red-500 @enderror"
                                   value="{{ old('street_address', $user->address ?? '') }}" 
                                   placeholder="House number and street name" required>
                            @error('street_address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="street_address2" class="block text-sm font-medium text-gray-700 mb-2">Apartment, suite, etc. (optional)</label>
                            <input type="text" name="street_address2" id="street_address2" 
                                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   value="{{ old('street_address2') }}">
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                            <input type="text" name="city" id="city" 
                                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('city') border-red-500 @enderror"
                                   value="{{ old('city') }}" required>
                            @error('city')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700 mb-2">State/Province *</label>
                            <input type="text" name="state" id="state" 
                                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('state') border-red-500 @enderror"
                                   value="{{ old('state') }}" required>
                            @error('state')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="zip_code" class="block text-sm font-medium text-gray-700 mb-2">ZIP / Postal Code *</label>
                            <input type="text" name="zip_code" id="zip_code" 
                                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('zip_code') border-red-500 @enderror"
                                   value="{{ old('zip_code', $user->zip_code ?? '') }}" required>
                            @error('zip_code')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" name="phone_number" id="phone_number" 
                                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('phone_number') border-red-500 @enderror"
                                   value="{{ old('phone_number', $user->phone_number ?? '') }}" 
                                   placeholder="+1 234 567 8900" required>
                            @error('phone_number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-6">Payment Method</h2>
                    
                    <div class="space-y-4">
                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition @error('payment_method') border-red-500 @enderror">
                            <input type="radio" name="payment_method" value="acleda" class="h-4 w-4 text-blue-600 focus:ring-blue-500" {{ old('payment_method') == 'acleda' ? 'checked' : '' }} checked>
                            <span class="ml-3 flex items-center">
                                <img src="https://www.acledabank.com.kh/kh/eng/images/logo.png" alt="ACLEDA Bank" class="h-8 mr-3">
                                <span class="font-medium">ACLEDA Bank (QR Code)</span>
                            </span>
                        </label>

                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" name="payment_method" value="credit_card" class="h-4 w-4 text-blue-600 focus:ring-blue-500" {{ old('payment_method') == 'credit_card' ? 'checked' : '' }}>
                            <span class="ml-3 flex items-center">
                                <i class="fas fa-credit-card text-2xl text-gray-600 mr-3"></i>
                                <span class="font-medium">Credit / Debit Card</span>
                            </span>
                        </label>

                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" name="payment_method" value="paypal" class="h-4 w-4 text-blue-600 focus:ring-blue-500" {{ old('payment_method') == 'paypal' ? 'checked' : '' }}>
                            <span class="ml-3 flex items-center">
                                <i class="fab fa-paypal text-2xl text-blue-600 mr-3"></i>
                                <span class="font-medium">PayPal</span>
                            </span>
                        </label>
                    </div>
                    @error('payment_method')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order Notes -->
                <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
                    <h2 class="text-2xl font-semibold mb-6">Order Notes (Optional)</h2>
                    <textarea name="notes" id="notes" rows="3" 
                              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Special instructions for delivery">{{ old('notes') }}</textarea>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-4">
                    <h2 class="text-2xl font-semibold mb-6">Order Summary</h2>
                    
                    <!-- Cart Items -->
                    <div class="space-y-4 mb-6 max-h-96 overflow-y-auto">
                        @foreach($cartItems as $item)
                            <div class="flex items-center space-x-4">
                                <img src="{{ $item->product->image_url ?? 'https://via.placeholder.com/80x80' }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="w-16 h-16 object-cover rounded-lg">
                                <div class="flex-1">
                                    <h3 class="font-medium text-gray-900">{{ $item->product->name }}</h3>
                                    <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                                </div>
                                <p class="font-medium text-gray-900">
                                    ${{ number_format($item->product->price * $item->quantity, 2) }}
                                </p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Price Breakdown -->
                    <div class="border-t pt-4 space-y-2">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping</span>
                            <span>${{ number_format($shipping, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Tax (10%)</span>
                            <span>${{ number_format($tax, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-xl font-bold pt-2 border-t">
                            <span>Total</span>
                            <span class="text-blue-600">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <!-- Place Order Button -->
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-200 mt-6 flex items-center justify-center space-x-2"
                            id="place-order-btn">
                        <span>Place Order</span>
                        <i class="fas fa-lock text-sm"></i>
                    </button>

                    <p class="text-xs text-gray-500 text-center mt-4">
                        By placing your order, you agree to our 
                        <a href="#" class="text-blue-600 hover:underline">Terms of Service</a> and 
                        <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>.
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.getElementById('checkout-form').addEventListener('submit', function(e) {
    const btn = document.getElementById('place-order-btn');
    btn.disabled = true;
    btn.innerHTML = '<span>Processing...</span><i class="fas fa-spinner fa-spin ml-2"></i>';
});
</script>
@endpush
@endsection