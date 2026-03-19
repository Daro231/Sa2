<x-auth-modern-layout
    title="Sign In"
    subtitle="Welcome back to your workspace"
    heading="Hello, Friend!"
    description="Enter your personal details and start your journey with us."
    switchText="Don't have an account?"
    switchButton="Create Account"
    switchLink="{{ route('register') }}"
    mobileDescription="Sign in to your account"
>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <input id="email" class="glass-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email Address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <input id="password" class="glass-input" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between text-sm mt-3">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-none bg-white/10 text-indigo-500 shadow-sm focus:ring-0 focus:ring-offset-0" name="remember">
                <span class="ms-2 text-slate-300 font-medium">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-indigo-400 hover:text-indigo-300 font-medium transition" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="mt-8">
            <button type="submit" class="glass-btn">
                {{ __('Let\'s Go') }}
            </button>
        </div>
        
        <!-- Mobile Switch to Register -->
        <div class="mt-8 text-center lg:hidden">
            <p class="text-slate-400 text-sm">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-white hover:text-indigo-300 font-semibold ml-1 transition">Create one</a>
            </p>
        </div>
    </form>
</x-auth-modern-layout>
