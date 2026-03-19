<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Modern Sports Retail</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased flex flex-col min-h-screen">

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
                    <a href="/" class="text-2xl font-bold tracking-tighter uppercase">
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

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="flex-grow max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    <!-- Simple Footer -->
    <footer class="bg-black text-white mt-auto py-12">
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
