<x-app-layout>
    <div class="bg-blue-50 py-12 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 uppercase mb-4">Kids Collection</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Durable, comfortable, and stylish gear for the little champions.</p>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @if(isset($products) && count($products) > 0)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <!-- Product Card -->
                    <div class="group relative flex flex-col">
                        <div class="relative bg-gray-100 aspect-[4/5] overflow-hidden rounded-md mb-4 shadow-sm border border-gray-100">
                            <a href="#" class="block w-full h-full">
                                <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80' }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center transition-transform duration-500 hover:scale-105">
                            </a>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">{{ $product->name }}</h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $product->category }}</p>
                            </div>
                        </div>
                        <div class="mt-2">
                            <p class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-24">
                <i class="fa-solid fa-child-reaching text-6xl text-gray-300 mb-4"></i>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Coming Soon</h2>
                <p class="text-gray-500">We are restocking our Kids collection. Check back soon!</p>
                <a href="/" class="inline-block mt-6 px-6 py-3 bg-black text-white font-medium rounded hover:bg-gray-800 transition">Back to Home</a>
            </div>
        @endif
    </div>
</x-app-layout>
