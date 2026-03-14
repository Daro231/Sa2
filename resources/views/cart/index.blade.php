@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="max-w-4xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8">My Shopping Cart</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->count() > 0)
        @foreach($cartItems as $item)
            <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
                <div class="flex items-center">
                    <img src="{{ $item->product->image_url ?? 'https://via.placeholder.com/150x150' }}" 
                         alt="{{ $item->product->name }}" 
                         class="w-24 h-24 object-cover rounded-lg">
                    
                    <div class="flex-1 ml-6">
                        <h3 class="text-xl font-semibold">{{ $item->product->name }}</h3>
                        <p class="text-gray-600">${{ number_format($item->product->price, 2) }}</p>
                        
                        <div class="flex items-center mt-4">
                            <form action="/cart/update/{{ $item->id }}" method="POST" class="flex items-center">
                                @csrf
                                @method('PUT')
                                <button type="button" onclick="decrementCart({{ $item->id }})" class="px-3 py-1 bg-gray-200 rounded-l-lg hover:bg-gray-300">-</button>
                                <input type="number" name="quantity" id="cart-{{ $item->id }}" value="{{ $item->quantity }}" 
                                       min="1" max="{{ $item->product->stock }}" 
                                       class="w-16 text-center border-0 focus:ring-0" readonly>
                                <button type="button" onclick="incrementCart({{ $item->id }})" class="px-3 py-1 bg-gray-200 rounded-r-lg hover:bg-gray-300">+</button>
                                <input type="hidden" name="quantity" id="cart-quantity-{{ $item->id }}" value="{{ $item->quantity }}">
                            </form>

                            <form action="/cart/remove/{{ $item->id }}" method="POST" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="text-right">
                        <p class="text-lg font-semibold">
                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
            <div class="flex justify-between items-center text-xl font-bold">
                <span>TOTAL:</span>
                <span>${{ number_format($total, 2) }}</span>
            </div>

            <a href="/checkout" 
               class="block w-full bg-blue-500 text-white text-center font-semibold py-3 rounded-lg hover:bg-blue-600 transition duration-200 mt-4">
                Proceed to Checkout
            </a>
        </div>
    @else
        <div class="text-center py-12">
            <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-xl mb-4">Your cart is empty</p>
            <a href="/products" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                Continue Shopping
            </a>
        </div>
    @endif
</div>

@push('scripts')
<script>
function incrementCart(id) {
    const input = document.getElementById('cart-' + id);
    const hiddenInput = document.getElementById('cart-quantity-' + id);
    const current = parseInt(input.value);
    const max = parseInt(input.getAttribute('max'));
    
    if (current < max) {
        input.value = current + 1;
        hiddenInput.value = current + 1;
        updateCart(id, current + 1);
    }
}

function decrementCart(id) {
    const input = document.getElementById('cart-' + id);
    const hiddenInput = document.getElementById('cart-quantity-' + id);
    const current = parseInt(input.value);
    
    if (current > 1) {
        input.value = current - 1;
        hiddenInput.value = current - 1;
        updateCart(id, current - 1);
    }
}

function updateCart(id, quantity) {
    fetch('/cart/update/' + id, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ quantity: quantity })
    }).then(response => {
        if (response.ok) {
            location.reload();
        }
    });
}
</script>
@endpush
@endsection