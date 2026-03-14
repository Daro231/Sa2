@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-4xl mx-auto px-4">
    <a href="/products" class="text-blue-500 hover:text-blue-600 mb-4 inline-block">
        <i class="fas fa-arrow-left mr-2"></i>Back
    </a>

    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2">
                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/500x500' }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-full object-cover">
            </div>
            <div class="md:w-1/2 p-8">
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-gray-700 mb-6">{{ $product->description }}</p>
                
                <div class="mb-4">
                    <span class="text-gray-600">Stock:</span>
                    <span class="font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $product->stock > 0 ? $product->stock . ' in stock' : 'Out of stock' }}
                    </span>
                </div>

                <div class="text-3xl font-bold text-blue-600 mb-6">
                    ${{ number_format($product->price, 2) }}
                </div>

                @auth
                    <form action="/cart/add/{{ $product->id }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="flex items-center space-x-4">
                            <label for="quantity" class="text-gray-700">Quantity:</label>
                            <div class="flex items-center border rounded-lg">
                                <button type="button" onclick="decrementQuantity()" class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" 
                                       class="w-16 text-center border-0 focus:ring-0">
                                <button type="button" onclick="incrementQuantity()" class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                            </div>
                        </div>

                        <div class="flex space-x-4">
                            <button type="submit" class="flex-1 bg-blue-500 text-white font-semibold py-3 rounded-lg hover:bg-blue-600 transition duration-200">
                                Add to Cart
                            </button>
                            <a href="/checkout?product={{ $product->id }}" 
                               class="flex-1 bg-green-500 text-white font-semibold py-3 rounded-lg hover:bg-green-600 transition duration-200 text-center">
                                BUY NOW
                            </a>
                        </div>
                    </form>
                @else
                    <div class="text-center py-4 bg-gray-100 rounded-lg">
                        <p class="text-gray-600 mb-2">Please login to purchase this item</p>
                        <a href="/login" class="text-blue-500 hover:text-blue-600">Login</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function incrementQuantity() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.getAttribute('max'));
    const current = parseInt(input.value);
    if (current < max) {
        input.value = current + 1;
    }
}

function decrementQuantity() {
    const input = document.getElementById('quantity');
    const current = parseInt(input.value);
    if (current > 1) {
        input.value = current - 1;
    }
}
</script>
@endpush
@endsection