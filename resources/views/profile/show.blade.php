@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Header -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
        <!-- Cover Photo -->
        <div class="h-32 bg-gradient-to-r from-blue-500 to-blue-600 relative">
            <a href="{{ route('profile.edit') }}" class="absolute top-4 right-4 bg-white text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition duration-200 flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit Profile
            </a>
        </div>

        <!-- Profile Info -->
        <div class="px-6 pb-6">
            <div class="flex flex-col sm:flex-row items-center sm:items-end -mt-16 mb-4">
                <!-- Avatar -->
                <div class="relative">
                    <div class="w-32 h-32 rounded-full border-4 border-white overflow-hidden bg-gray-200">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->username }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-blue-500 text-white text-4xl font-bold">
                                {{ strtoupper(substr($user->username, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- User Info -->
                <div class="sm:ml-6 mt-4 sm:mt-0 text-center sm:text-left flex-1">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $user->full_name ?? $user->username }}</h1>
                    <p class="text-gray-600">Member since {{ $user->created_at->format('F Y') }}</p>
                </div>

                <!-- Stats -->
                <div class="flex space-x-6 mt-4 sm:mt-0">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ $recentOrders->count() }}</div>
                        <div class="text-sm text-gray-600">Orders</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">${{ number_format($totalSpent, 0) }}</div>
                        <div class="text-sm text-gray-600">Total Spent</div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="grid md:grid-cols-2 gap-6 mt-6">
                <div class="space-y-3">
                    <h3 class="font-semibold text-gray-700">Contact Information</h3>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-envelope w-6 text-blue-500"></i>
                        <span class="ml-2">{{ $user->email }}</span>
                    </div>
                    @if($user->phone_number)
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-phone w-6 text-blue-500"></i>
                        <span class="ml-2">{{ $user->phone_number }}</span>
                    </div>
                    @endif
                    @if($user->date_of_birth)
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-birthday-cake w-6 text-blue-500"></i>
                        <span class="ml-2">{{ $user->date_of_birth->format('F d, Y') }}</span>
                    </div>
                    @endif
                </div>

                <div class="space-y-3">
                    <h3 class="font-semibold text-gray-700">Shipping Address</h3>
                    @if($user->address || $user->city || $user->country)
                        <div class="flex items-start text-gray-600">
                            <i class="fas fa-map-marker-alt w-6 text-blue-500 mt-1"></i>
                            <div class="ml-2">
                                @if($user->address)<p>{{ $user->address }}</p>@endif
                                @if($user->city || $user->zip_code)
                                    <p>{{ $user->city }} {{ $user->zip_code }}</p>
                                @endif
                                @if($user->country)<p>{{ $user->country }}</p>@endif
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 italic">No address added yet</p>
                    @endif
                </div>
            </div>

            <!-- Bio -->
            @if($user->bio)
            <div class="mt-6 pt-6 border-t">
                <h3 class="font-semibold text-gray-700 mb-2">About</h3>
                <p class="text-gray-600">{{ $user->bio }}</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Recent Orders -->
    @if($recentOrders->count() > 0)
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-900">Recent Orders</h2>
            <a href="{{ route('profile.orders') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                View All <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <div class="space-y-4">
            @foreach($recentOrders as $order)
            <div class="border rounded-lg p-4 hover:shadow-md transition duration-200">
                <div class="flex flex-wrap items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-900">Order #{{ $order->order_number }}</p>
                        <p class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-900">${{ number_format($order->total_amount, 2) }}</p>
                        <span class="inline-block px-2 py-1 text-xs rounded-full 
                            @if($order->status == 'completed') bg-green-100 text-green-800
                            @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                            @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection