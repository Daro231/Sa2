<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce Store')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-8">
                    <a href="/" class="text-xl font-semibold">My Store</a>
                    <a href="/" class="text-gray-700 hover:text-gray-900">Home</a>
                    <a href="/products" class="text-gray-700 hover:text-gray-900">Shop</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <form action="/search" method="GET" class="relative">
                        <input type="text" name="search" placeholder="Search products..." 
                               class="border rounded-lg px-4 py-2 pl-10 focus:outline-none focus:border-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </form>
                    
                    <!-- Cart -->
                    <a href="/cart" class="relative">
                        <i class="fas fa-shopping-cart text-2xl text-gray-700"></i>
                        @auth
                            @php
                                $cartCount = \App\Models\Cart::where('user_id', Auth::id())->count();
                            @endphp
                            @if($cartCount > 0)
                                <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        @endauth
                    </a>
                    
                    <!-- Profile / Auth -->
                    @auth
                        <div class="relative group">
                            <button class="flex items-center space-x-2">
                                <i class="fas fa-user-circle text-2xl text-gray-700"></i>
                                <span>{{ Auth::user()->username }}</span>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden group-hover:block">
                                <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                                <a href="/orders/history" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">My Orders</a>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="text-gray-700 hover:text-gray-900">Login</a>
                        <a href="/register" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-600">
            <p>COMPANY NAME</p>
            <p>Address: No. 86A, Street 110, Russian Federation Blvd (110), Phnom Penh</p>
            <p>Email: company@gmail.com | Phone: +885 0962 460 507</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>