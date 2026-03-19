<x-app-layout>
    <!-- Hero Section -->
    <div class="bg-gray-100 pt-8 pb-12 mb-8 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="text-xs text-gray-500 mb-4">
                <a href="/" class="hover:text-black">Home</a> &gt; 
                <a href="{{ route('categories.index') }}" class="hover:text-black">Categories</a> &gt; 
                <span class="text-gray-900">Shoes</span>
            </nav>
            <h1 class="text-4xl font-bold mb-2 uppercase tracking-tight">Performance Footwear</h1>
            <p class="text-gray-600 text-sm max-w-2xl">Shop the latest selection of running, basketball, training, and lifestyle shoes engineered for maximum performance and everyday comfort.</p>
        </div>
    </div>

    <!-- Main Content layout -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar Filters -->
            <aside class="w-full lg:w-64 flex-shrink-0">
                <!-- Activity / Type -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <h3 class="font-bold mb-4 text-sm uppercase tracking-wider">Activity</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="font-semibold text-black">Running <span class="text-gray-400">(48)</span></a></li>
                        <li><a href="#" class="hover:text-black">Lifestyle <span class="text-gray-400">(36)</span></a></li>
                        <li><a href="#" class="hover:text-black">Training & Gym <span class="text-gray-400">(24)</span></a></li>
                        <li><a href="#" class="hover:text-black">Basketball <span class="text-gray-400">(12)</span></a></li>
                        <li><a href="#" class="hover:text-black">Football <span class="text-gray-400">(8)</span></a></li>
                    </ul>
                </div>
                
                <!-- Shoe Size -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <h3 class="font-bold mb-4 text-sm uppercase tracking-wider">Size (US)</h3>
                    <div class="grid grid-cols-3 gap-2">
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">7</button>
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">7.5</button>
                        <button class="border border-black bg-black text-white py-2 text-sm">8</button>
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">8.5</button>
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">9</button>
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">9.5</button>
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">10</button>
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">10.5</button>
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">11</button>
                    </div>
                </div>

                <!-- Color -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <h3 class="font-bold mb-4 text-sm uppercase tracking-wider">Color</h3>
                    <div class="flex flex-wrap gap-3">
                        <button class="w-8 h-8 rounded-full bg-black ring-2 ring-offset-2 ring-black"></button>
                        <button class="w-8 h-8 rounded-full bg-white border border-gray-300 hover:ring-2 ring-offset-2 ring-gray-400"></button>
                        <button class="w-8 h-8 rounded-full bg-blue-600 hover:ring-2 ring-offset-2 ring-blue-600"></button>
                        <button class="w-8 h-8 rounded-full bg-red-600 hover:ring-2 ring-offset-2 ring-red-600"></button>
                        <button class="w-8 h-8 rounded-full bg-gray-400 hover:ring-2 ring-offset-2 ring-gray-400"></button>
                        <button class="w-8 h-8 rounded-full bg-green-500 hover:ring-2 ring-offset-2 ring-green-500"></button>
                    </div>
                </div>

                <!-- Price -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <h3 class="font-bold mb-4 text-sm uppercase tracking-wider">Price</h3>
                    <div class="space-y-2">
                        <label class="flex items-center text-sm text-gray-600">
                            <input type="checkbox" class="mr-2 rounded border-gray-300"> Under $100
                        </label>
                        <label class="flex items-center text-sm text-gray-600">
                            <input type="checkbox" class="mr-2 rounded border-gray-300" checked> $100 - $150
                        </label>
                        <label class="flex items-center text-sm text-gray-600">
                            <input type="checkbox" class="mr-2 rounded border-gray-300"> Over $150
                        </label>
                    </div>
                </div>
            </aside>

            <!-- Products Area -->
            <div class="flex-1">
                <!-- Toolbar -->
                <div class="flex justify-between items-center mb-6">
                    <span class="text-sm text-gray-500">Showing 1-12 of 128 shoes</span>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Sort by:</span>
                        <select class="bg-white border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:border-black">
                            <option>Featured</option>
                            <option>Price (Low to High)</option>
                            <option>Price (High to Low)</option>
                            <option>Newest Arrivals</option>
                        </select>
                    </div>
                </div>

                <!-- Shoes Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-x-6 gap-y-10">
                    @php
                        $shoes = [
                            ['name' => 'Nike Air Zoom Pegasus', 'cat' => 'Men\'s Running Shoe', 'price' => '$120.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?auto=format&fit=crop&w=600&q=80'],
                            ['name' => 'Adidas Ultraboost Light', 'cat' => 'Men\'s Running Shoe', 'price' => '$190.00', 'sale' => '$149.99', 'img1' => 'https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?auto=format&fit=crop&w=600&q=80'],
                            ['name' => 'Air Max 270', 'cat' => 'Men\'s Lifestyle Shoe', 'price' => '$160.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1600185365926-3a2ce3cdb9eb?auto=format&fit=crop&w=600&q=80'],
                            ['name' => 'Jordan One Mid', 'cat' => 'Men\'s Basketball Shoe', 'price' => '$125.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1597045566677-8cf032ed6634?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1597045566677-8cf032ed6634?auto=format&fit=crop&w=600&q=80'],
                            ['name' => 'Nike Vaporfly', 'cat' => 'Men\'s Racing Shoe', 'price' => '$250.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1460353581641-37baddab0fa2?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=600&q=80'],
                            ['name' => 'NB 550 Classic', 'cat' => 'Men\'s Lifestyle Shoe', 'price' => '$110.00', 'sale' => '$89.99', 'img1' => 'https://images.unsplash.com/photo-1539185441755-769473a23570?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?auto=format&fit=crop&w=600&q=80'],
                        ];
                    @endphp

                    @foreach($shoes as $product)
                    <!-- Product Card -->
                    <div class="group relative flex flex-col">
                        <div class="relative bg-gray-100 aspect-[4/5] overflow-hidden rounded-md mb-4 shadow-sm border border-gray-100">
                            <!-- Wishlist Icon -->
                            <button class="absolute top-3 right-3 z-10 text-gray-400 hover:text-red-500 transition-colors bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-sm">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                            
                            <!-- Badges -->
                            @if($product['sale'])
                                <span class="absolute top-3 left-3 z-10 bg-red-600 text-white text-xs font-bold px-2 py-1">SALE</span>
                            @endif

                            <a href="#" class="block w-full h-full">
                                <img src="{{ $product['img1'] }}" alt="{{ $product['name'] }}" class="main-img w-full h-full object-cover object-center transition-transform duration-500 hover:scale-105">
                                <img src="{{ $product['img2'] }}" alt="{{ $product['name'] }}" class="hover-img w-full h-full object-cover object-center">
                            </a>

                            <!-- Quick Add (Visible on hover) -->
                            <div class="absolute bottom-0 left-0 w-full p-2 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <button class="w-full bg-black text-white py-3 text-sm font-semibold hover:bg-gray-800 tracking-wide uppercase">
                                    Quick Add
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-between items-start">
                            <div>
                                @if($product['sale'])
                                    <p class="text-red-600 text-xs font-bold mb-1 tracking-wider uppercase">Limited Stock</p>
                                @endif
                                <h3 class="text-sm font-medium text-gray-900">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product['name'] }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $product['cat'] }}</p>
                            </div>
                        </div>
                        <div class="mt-2">
                            @if($product['sale'])
                                <span class="text-sm font-medium text-red-600">{{ $product['sale'] }}</span>
                                <span class="text-sm font-normal text-gray-500 line-through ml-2">{{ $product['price'] }}</span>
                            @else
                                <p class="text-sm font-medium text-gray-900">{{ $product['price'] }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
                
                <!-- Pagination -->
                <div class="mt-16 flex items-center justify-center space-x-2">
                    <button class="px-4 py-2 border border-gray-300 bg-white text-gray-400 cursor-not-allowed rounded-md hover:bg-gray-50">Previous</button>
                    <button class="px-4 py-2 bg-black text-white rounded-md font-bold">1</button>
                    <button class="px-4 py-2 border border-gray-300 bg-white hover:bg-gray-50 text-gray-900 rounded-md font-medium">2</button>
                    <button class="px-4 py-2 border border-gray-300 bg-white hover:bg-gray-50 text-gray-900 rounded-md font-medium">3</button>
                    <span class="px-2 text-gray-500">...</span>
                    <button class="px-4 py-2 border border-gray-300 bg-white hover:bg-gray-50 text-gray-900 rounded-md font-medium">Next</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
