<x-app-layout>
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Sidebar Menu -->
        <aside class="w-full md:w-64 flex-shrink-0">
            <div class="bg-white p-6 shadow-sm border border-gray-100 rounded-lg">
                <h3 class="font-bold text-lg mb-6 border-b pb-4">My Account</h3>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="font-semibold text-red-600 flex items-center"><i class="fa-solid fa-shapes w-6"></i> Overview</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-black flex items-center transition-colors"><i class="fa-solid fa-box h-4 w-6"></i> Order History</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-black flex items-center transition-colors"><i class="fa-solid fa-heart h-4 w-6"></i> Wishlist</a></li>
                    <li><a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-black flex items-center transition-colors"><i class="fa-solid fa-user h-4 w-6"></i> Profile Settings</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-black flex items-center transition-colors"><i class="fa-solid fa-location-dot h-4 w-6"></i> Addresses</a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Dashboard Content -->
        <div class="flex-1">
            <div class="mb-8">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900">Welcome back, {{ Auth::user()->name }}!</h2>
                <p class="mt-2 text-gray-600">Here you can manage your recent orders, track shipments, and edit your profile settings.</p>
            </div>

            <!-- Dashboard Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="bg-gray-100 p-3 rounded-full text-black">
                        <i class="fa-solid fa-box text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium whitespace-nowrap">Total Orders</p>
                        <p class="text-2xl font-bold text-gray-900">0</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="bg-red-50 p-3 rounded-full text-red-600">
                        <i class="fa-solid fa-heart text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium whitespace-nowrap">Saved Items</p>
                        <p class="text-2xl font-bold text-gray-900">3</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="bg-gray-100 p-3 rounded-full text-black">
                        <i class="fa-solid fa-tags text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium whitespace-nowrap">Active Coupons</p>
                        <p class="text-2xl font-bold text-gray-900">2</p>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Section -->
            <div class="bg-white shadow-sm border border-gray-100 rounded-lg overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900">Recent Orders</h3>
                    <a href="#" class="text-sm font-semibold text-red-600 hover:text-red-700">View all</a>
                </div>
                <div class="p-6">
                    <div class="text-center py-10">
                        <div class="mx-auto h-12 w-12 text-gray-300 mb-4">
                            <i class="fa-solid fa-box-open text-4xl"></i>
                        </div>
                        <h3 class="text-sm font-medium text-gray-900">No orders found</h3>
                        <p class="mt-1 text-sm text-gray-500">You haven't placed any orders yet.</p>
                        <div class="mt-6">
                            <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-black hover:bg-gray-800 focus:outline-none">
                                Start Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
