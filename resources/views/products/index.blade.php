@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="mb-6">
        <a href="/" class="text-blue-500 hover:text-blue-600">
            <i class="fas fa-arrow-left mr-2"></i>Back
        </a>
        <h1 class="text-3xl font-bold mt-4">ORDER FLOW</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300x300' }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                    <p class="text-gray-500 text-sm mb-2">{{ $product->stock }} in stock</p>
                    <p class="text-2xl font-bold text-blue-600 mb-4">${{ number_format($product->price, 2) }}</p>
                    <a href="/products/{{ $product->id }}" 
                       class="block w-full bg-blue-500 text-white text-center font-semibold py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        View Details
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500 text-xl">No products found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection