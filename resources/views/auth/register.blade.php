@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
    <a href="/" class="text-blue-500 hover:text-blue-600 mb-4 inline-block">
        <i class="fas fa-arrow-left mr-2"></i>Back
    </a>

    <h1 class="text-3xl font-bold mb-6">Registration</h1>

    <form method="POST" action="/register">
        @csrf
        
        <div class="mb-4">
            <label for="username" class="block text-gray-700 mb-2">Username</label>
            <input type="text" name="username" id="username" 
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500 @error('username') border-red-500 @enderror"
                   value="{{ old('username') }}" required>
            @error('username')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" 
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror"
                   value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input type="password" name="password" id="password" 
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror"
                   required>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" 
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                   required>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-3 rounded-lg hover:bg-blue-600 transition duration-200">
            REGISTER
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-600 mb-4">or login with social platforms</p>
        <div class="flex justify-center space-x-4">
            <!-- Social login buttons would go here -->
        </div>
    </div>

    <div class="mt-8 text-center">
        <p class="text-gray-600">Welcome Back!</p>
        <p class="text-gray-600">Already have an account? 
            <a href="/login" class="text-blue-500 hover:text-blue-600">Login</a>
        </p>
    </div>
</div>
@endsection