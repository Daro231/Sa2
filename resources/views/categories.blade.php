<x-app-layout>
    <!-- Page Header -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 uppercase mb-4">All Categories</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Explore our complete collection of premium sports gear, footwear, and apparel across all collections.</p>
            </div>
        </div>
    </div>

    <!-- Main Sub-Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- Major Categories Section -->
        <div class="space-y-16">
            
            <!-- Men's Collection -->
            <section>
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Men's Collection</h2>
                    <a href="#" class="text-sm font-semibold text-red-600 hover:text-red-800 uppercase tracking-wider">Shop Men &rarr;</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ route('shoes.index') }}" class="group block relative h-80 overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1608231387042-66d1773070a5?auto=format&fit=crop&w=600&q=80" alt="Men's Shoes" class="absolute inset-0 h-full w-full object-cover object-center opacity-80 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-0 w-full p-6 tracking-wide">
                            <h3 class="text-xl font-bold text-white uppercase">Shoes</h3>
                            <p class="text-sm text-gray-200 mt-1 hover:underline">Run, Train, Lifestyle</p>
                        </div>
                    </a>
                    <a href="#" class="group block relative h-80 overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=600&q=80" alt="Men's Clothing" class="absolute inset-0 h-full w-full object-cover object-top opacity-80 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-0 w-full p-6 tracking-wide">
                            <h3 class="text-xl font-bold text-white uppercase">Clothing</h3>
                            <p class="text-sm text-gray-200 mt-1 hover:underline">Tops, Shorts, Pants</p>
                        </div>
                    </a>
                    <a href="#" class="group block relative h-80 overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1553531384-cc64ac80f931?auto=format&fit=crop&w=600&q=80" alt="Men's Accessories" class="absolute inset-0 h-full w-full object-cover object-center opacity-80 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-0 w-full p-6 tracking-wide">
                            <h3 class="text-xl font-bold text-white uppercase">Accessories</h3>
                            <p class="text-sm text-gray-200 mt-1 hover:underline">Hats, Bags, Socks</p>
                        </div>
                    </a>
                </div>
            </section>

            <!-- Women's Collection -->
            <section>
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Women's Collection</h2>
                    <a href="#" class="text-sm font-semibold text-red-600 hover:text-red-800 uppercase tracking-wider">Shop Women &rarr;</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="#" class="group block relative h-80 overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&w=600&q=80" alt="Women's Shoes" class="absolute inset-0 h-full w-full object-cover object-center opacity-80 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-0 w-full p-6 tracking-wide">
                            <h3 class="text-xl font-bold text-white uppercase">Shoes</h3>
                            <p class="text-sm text-gray-200 mt-1 hover:underline">Run, Train, Lifestyle</p>
                        </div>
                    </a>
                    <a href="#" class="group block relative h-80 overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1518310383802-640c2de311b2?auto=format&fit=crop&w=600&q=80" alt="Women's Clothing" class="absolute inset-0 h-full w-full object-cover object-top opacity-80 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-0 w-full p-6 tracking-wide">
                            <h3 class="text-xl font-bold text-white uppercase">Clothing</h3>
                            <p class="text-sm text-gray-200 mt-1 hover:underline">Bras, Leggings, Tops</p>
                        </div>
                    </a>
                    <a href="#" class="group block relative h-80 overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1574015974293-817f0ebebb74?auto=format&fit=crop&w=600&q=80" alt="Women's Accessories" class="absolute inset-0 h-full w-full object-cover object-center opacity-80 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-0 w-full p-6 tracking-wide">
                            <h3 class="text-xl font-bold text-white uppercase">Accessories</h3>
                            <p class="text-sm text-gray-200 mt-1 hover:underline">Bags, Headwear, Mats</p>
                        </div>
                    </a>
                </div>
            </section>
            
            <!-- Kids & Equipment -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <section>
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Kids</h2>
                        <a href="#" class="text-sm font-semibold text-red-600 hover:text-red-800 uppercase tracking-wider">Shop Kids &rarr;</a>
                    </div>
                    <a href="#" class="group block relative h-64 overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1545696562-b918cc870fed?auto=format&fit=crop&w=800&q=80" alt="Kids Collection" class="absolute inset-0 h-full w-full object-cover object-center opacity-80 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-0 w-full p-6 tracking-wide">
                            <h3 class="text-xl font-bold text-white uppercase">Boys & Girls</h3>
                            <p class="text-sm text-gray-200 mt-1 hover:underline">Shoes & Clothing</p>
                        </div>
                    </a>
                </section>
                <section>
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Sports Equipment</h2>
                        <a href="#" class="text-sm font-semibold text-red-600 hover:text-red-800 uppercase tracking-wider">Shop Gear &rarr;</a>
                    </div>
                    <a href="#" class="group block relative h-64 overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1518059885816-6de59620b72a?auto=format&fit=crop&w=800&q=80" alt="Sports Equipment" class="absolute inset-0 h-full w-full object-cover object-center opacity-80 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-0 w-full p-6 tracking-wide">
                            <h3 class="text-xl font-bold text-white uppercase">Balls, Mats, Weights</h3>
                            <p class="text-sm text-gray-200 mt-1 hover:underline">Gear Up</p>
                        </div>
                    </a>
                </section>
            </div>

        </div>
    </div>
</x-app-layout>
