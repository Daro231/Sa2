@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
    <h1 class="text-3xl font-bold mb-2">Hello, Welcome!</h1>
    <p class="text-gray-600 mb-6">Don't have an account? 
        <a href="/register" class="text-blue-500 hover:text-blue-600">Register</a>
    </p>

    <h2 class="text-2xl font-semibold mb-6">Login</h2>

    <form method="POST" action="/login">
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
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input type="password" name="password" id="password" 
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror"
                   required>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-right mb-6">
            <a href="#" class="text-sm text-gray-600 hover:text-gray-800">Forget password?</a>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-3 rounded-lg hover:bg-blue-600 transition duration-200">
            LOGIN
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-600 mb-4">or login with social platforms</p>
        <div class="flex justify-center space-x-4">
            <!-- Social login buttons would go here -->
        </div>
    </div>
</div>
@endsection