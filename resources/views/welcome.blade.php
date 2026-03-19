<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modern Sports Retail</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .group:hover .hover-img { display: block; }
        .group:hover .main-img { display: none; }
        .hover-img { display: none; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <!-- Topbar -->
    <div class="bg-black text-white text-xs py-2 px-6 flex justify-between items-center">
        <div class="flex space-x-4">
            <a href="#" class="hover:text-gray-300">Help</a>
            <a href="#" class="hover:text-gray-300">Find a Store</a>
        </div>
        <div class="flex space-x-4 items-center">
            <span><i class="fa-solid fa-globe mr-1"></i> EN | KH</span>
        </div>
    </div>

    <!-- Sticky Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('categories.index') }}" class="text-2xl font-bold tracking-tighter uppercase">
                        Sport<span class="text-red-600">Fit</span>
                    </a>
                </div>

                <!-- Navigation Menu -->
                @include('partials.navbar-links')

                <!-- Actions -->
                <div class="flex items-center space-x-6">
                    <!-- Search -->
                    <div class="hidden lg:flex relative">
                        <input type="text" class="bg-gray-100 rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-gray-300 w-48 transition-all" placeholder="Search...">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-3 text-gray-500"></i>
                    </div>
                    
                    @auth
                        @if(auth()->user()->isAdmin)
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-red-600 transition-colors mr-2" title="Admin Panel"><i class="fa-solid fa-lock text-xl"></i></a>
                        @endif
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-black transition-colors" title="Dashboard"><i class="fa-regular fa-user text-xl"></i></a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-red-600 transition-colors" title="Log Out">
                                <i class="fa-solid fa-arrow-right-from-bracket text-xl"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-black transition-colors">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-medium text-white bg-black px-4 py-2 rounded hover:bg-gray-800 transition-colors">Register</a>
                        @endif
                    @endauth
                    <a href="#" class="text-gray-700 hover:text-black transition-colors"><i class="fa-regular fa-heart text-xl"></i></a>
                    <a href="#" class="text-gray-700 hover:text-black transition-colors relative">
                        <i class="fa-solid fa-bag-shopping text-xl"></i>
                        <span class="absolute -top-1 -right-2 bg-red-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">3</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Hero/Breadcrumb Section -->
        <div class="mb-8">
            <nav class="text-xs text-gray-500 mb-4">
                <a href="#" class="hover:text-black">Home</a> &gt; <a href="#" class="hover:text-black">Men</a> &gt; <span class="text-gray-900">Clothing & Shoes</span>
            </nav>
            <h1 class="text-4xl font-bold mb-2">Men's Core Collection</h1>
            <p class="text-gray-600 text-sm">Explore our latest arrivals featuring premium activewear and performance footwear designed to elevate your game.</p>
        </div>

        <!-- Categories Blocks -->
        <div class="mb-12">
            <div class="flex justify-between items-end mb-4">
                <h2 class="text-2xl font-bold uppercase tracking-tight">Shop by Category</h2>
                <a href="{{ route('categories.index') }}" class="text-sm font-semibold underline underline-offset-4 hover:text-red-600 transition-colors">View All Categories <i class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('shoes.index') }}" class="group relative aspect-[4/3] bg-gray-200 overflow-hidden flex items-center justify-center shadow-sm">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=400&q=80" alt="Shoes" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors"></div>
                    <span class="relative text-white font-bold text-xl tracking-widest drop-shadow-md uppercase">Shoes</span>
                </a>
                <a href="#" class="group relative aspect-[4/3] bg-gray-200 overflow-hidden flex items-center justify-center shadow-sm">
                    <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=400&q=80" alt="Clothing" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors"></div>
                    <span class="relative text-white font-bold text-xl tracking-widest drop-shadow-md uppercase">Clothing</span>
                </a>
                <a href="#" class="group relative aspect-[4/3] bg-gray-200 overflow-hidden flex items-center justify-center shadow-sm">
                    <img src="https://images.unsplash.com/photo-1611080010629-8f35f3d45e12?auto=format&fit=crop&w=400&q=80" alt="Accessories" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors"></div>
                    <span class="relative text-white font-bold text-xl tracking-widest drop-shadow-md uppercase">Accessories</span>
                </a>
                <a href="#" class="group relative aspect-[4/3] bg-gray-200 overflow-hidden flex items-center justify-center shadow-sm">
                    <img src="https://images.unsplash.com/photo-1518059885816-6de59620b72a?auto=format&fit=crop&w=400&q=80" alt="Equipment" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors"></div>
                    <span class="relative text-white font-bold text-xl tracking-widest drop-shadow-md uppercase">Equipment</span>
                </a>
            </div>
        </div>

        <!-- Layout: Sidebar + Grid -->
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar Filters -->
            <aside class="w-full lg:w-64 flex-shrink-0">
                <!-- Category -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <h3 class="font-bold mb-4 text-sm uppercase tracking-wider">Category</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="{{ route('shoes.index') }}" class="hover:text-black">Shoes <span class="text-gray-400">(124)</span></a></li>
                        <li><a href="#" class="font-semibold text-black">Clothing <span class="text-gray-400">(86)</span></a></li>
                        <li><a href="#" class="hover:text-black">Accessories <span class="text-gray-400">(42)</span></a></li>
                        <li><a href="#" class="hover:text-black">Equipment <span class="text-gray-400">(18)</span></a></li>
                    </ul>
                </div>
                
                <!-- Size -->
                {{-- <div class="mb-6 pb-6 border-b border-gray-200">
                    <h3 class="font-bold mb-4 text-sm uppercase tracking-wider">Size</h3>
                    <div class="grid grid-cols-4 gap-2">
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">S</button>
                        <button class="border border-black bg-black text-white py-2 text-sm">M</button>
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">L</button>
                        <button class="border border-gray-300 py-2 text-sm hover:border-black">XL</button>
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
                    </div>
                </div> --}}

                <!-- Price -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <h3 class="font-bold mb-4 text-sm uppercase tracking-wider">Price</h3>
                    <div class="space-y-2">
                        <label class="flex items-center text-sm text-gray-600">
                            <input type="checkbox" class="mr-2 rounded border-gray-300">
                            Under $50
                        </label>
                        <label class="flex items-center text-sm text-gray-600">
                            <input type="checkbox" class="mr-2 rounded border-gray-300" checked>
                            $50 - $100
                        </label>
                        <label class="flex items-center text-sm text-gray-600">
                            <input type="checkbox" class="mr-2 rounded border-gray-300">
                            Over $100
                        </label>
                    </div>
                </div>
            </aside>

            <!-- Products Area -->
            <div class="flex-1">
                <!-- Toolbar -->
                <div class="flex justify-between items-center mb-6">
                    <span class="text-sm text-gray-500">Showing 1-24 of 252 items</span>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Sort by:</span>
                        <select class="bg-white border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:border-black">
                            <option>Featured</option>
                            <option>Price (Low to High)</option>
                            <option>Price (High to Low)</option>
                            <option>Newest</option>
                        </select>
                    </div>
                </div>

                <!-- Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-10">
                    @php
                        if(isset($dbProducts) && $dbProducts->isNotEmpty()) {
                            $products = $dbProducts->map(function($p) {
                                return [
                                    'name' => $p->name,
                                    'cat' => $p->category,
                                    'price' => '$' . number_format($p->price, 2),
                                    'sale' => null,
                                    'img1' => $p->image_url ?? 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80',
                                    'img2' => $p->image_url ?? 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?auto=format&fit=crop&w=600&q=80',
                                ];
                            });
                        } else {
                            $products = [
                                ['name' => 'Nike Air Zoom Pegasus', 'cat' => 'Men\'s Running Shoe', 'price' => '$120.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?auto=format&fit=crop&w=600&q=80'],
                                ['name' => 'Adidas Ultraboost Light', 'cat' => 'Men\'s Shoe', 'price' => '$190.00', 'sale' => '$149.99', 'img1' => 'https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?auto=format&fit=crop&w=600&q=80'],
                                ['name' => 'Essentials Dri-FIT Tee', 'cat' => 'Men\'s Training T-Shirt', 'price' => '$35.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1581655353564-df123a1eb820?auto=format&fit=crop&w=600&q=80'],
                                ['name' => 'Tech Fleece Joggers', 'cat' => 'Men\'s Pants', 'price' => '$110.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?auto=format&fit=crop&w=600&q=80'],
                                ['name' => 'Pro Training Shorts', 'cat' => 'Men\'s Shorts', 'price' => '$45.00', 'sale' => '$39.99', 'img1' => 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1610996884697-39b036ca6d5f?auto=format&fit=crop&w=600&q=80'],
                                ['name' => 'Air Max 270', 'cat' => 'Men\'s Lifestyle Shoe', 'price' => '$160.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1600185365926-3a2ce3cdb9eb?auto=format&fit=crop&w=600&q=80'],
                                ['name' => 'Element 1/2 Zip', 'cat' => 'Men\'s Running Top', 'price' => '$65.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=600&q=80'],
                                ['name' => 'Jordan One Mid', 'cat' => 'Men\'s Shoe', 'price' => '$125.00', 'sale' => null, 'img1' => 'https://images.unsplash.com/photo-1597045566677-8cf032ed6634?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1597045566677-8cf032ed6634?auto=format&fit=crop&w=600&q=80']
                            ];
                        }
                    @endphp

                    @foreach($products as $product)
                    <!-- Product Card -->
                    <div class="group relative flex flex-col">
                        <div class="relative bg-gray-100 aspect-[4/5] overflow-hidden rounded-md mb-4">
                            <!-- Wishlist Icon -->
                            <button class="absolute top-3 right-3 z-10 text-gray-400 hover:text-red-500 transition-colors bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-sm">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                            
                            <!-- Badges -->
                            @if($product['sale'])
                                <span class="absolute top-3 left-3 z-10 bg-red-600 text-white text-xs font-bold px-2 py-1">SALE</span>
                            @endif

                            <a href="#" class="block w-full h-full">
                                <img src="{{ $product['img1'] }}" alt="{{ $product['name'] }}" class="main-img w-full h-full object-cover object-center transition-transform duration-500">
                                <img src="{{ $product['img2'] }}" alt="{{ $product['name'] }}" class="hover-img w-full h-full object-cover object-center">
                            </a>

                            <!-- Quick Add (Visible on hover) -->
                            <div class="absolute bottom-0 left-0 w-full p-2 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <button class="w-full bg-black text-white py-3 text-sm font-semibold hover:bg-gray-800 tracking-wide">
                                    QUICK ADD
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-between items-start">
                            <div>
                                @if($product['sale'])
                                    <p class="text-red-600 text-xs font-bold mb-1 tracking-wider">MEMBER EXCLUSIVE</p>
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
            </div>
        </div>
    </main>

    <!-- Simple Footer -->
    <footer class="bg-black text-white mt-16 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <h4 class="font-bold uppercase mb-4">Products</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white">Shoes</a></li>
                    <li><a href="#" class="hover:text-white">Clothing</a></li>
                    <li><a href="#" class="hover:text-white">Accessories</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold uppercase mb-4">Support</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white">Order Status</a></li>
                    <li><a href="#" class="hover:text-white">Shipping</a></li>
                    <li><a href="#" class="hover:text-white">Returns</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
