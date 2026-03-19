<x-auth-modern-layout
    title="Registration"
    subtitle="Create a new account"
    heading="Welcome Back!"
    description="To keep connected with us please login with your personal info."
    switchText="Already have an account?"
    switchButton="Sign In"
    switchLink="{{ route('login') }}"
    mobileDescription="Create a new account"
>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}" class="space-y-3">
        @csrf

        <!-- Name -->
        <div>
            <input id="name" class="glass-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Full Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
        </div>

        <!-- Email Address -->
        <div>
            <input id="email" class="glass-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Email Address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Phone -->
        <div>
            <input id="phone" class="glass-input" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <input id="password" class="glass-input" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Confirm Password -->
        <div>
            <input id="password_confirmation" class="glass-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="mt-8">
            <button type="submit" class="glass-btn">
                {{ __('Create Account') }}
            </button>
        </div>
        
        <!-- Mobile Switch to Login -->
        <div class="mt-8 text-center lg:hidden">
            <p class="text-slate-400 text-sm">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-white hover:text-indigo-300 font-semibold ml-1 transition">Sign In</a>
            </p>
        </div>
    </form>
</x-auth-modern-layout>
