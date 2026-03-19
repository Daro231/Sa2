<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts Default Inter -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <style>
            body {
                font-family: 'Inter', sans-serif;
                margin: 0;
                background-color: #0f172a; /* Fallback */
                /* Stunning dark animated mesh gradient */
                background-image: 
                    radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                    radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                    radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                color: #f8fafc;
            }
            .glass-panel {
                background: rgba(30, 41, 59, 0.4);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
                border-radius: 1.5rem;
            }
            .glass-input {
                background: rgba(15, 23, 42, 0.6);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 0.75rem;
                padding: 0.875rem 1rem;
                color: white;
                width: 100%;
                outline: none;
                transition: all 0.3s ease;
                font-size: 0.95rem;
            }
            .glass-input::placeholder {
                color: rgba(148, 163, 184, 0.8);
            }
            .glass-input:focus {
                border-color: rgba(167, 139, 250, 0.5);
                box-shadow: 0 0 0 2px rgba(167, 139, 250, 0.25);
                background: rgba(15, 23, 42, 0.8);
            }
            .glass-btn {
                background: linear-gradient(135deg, #8b5cf6 0%, #3b82f6 100%);
                color: white;
                font-weight: 600;
                letter-spacing: 0.025em;
                padding: 0.875rem 1.5rem;
                border-radius: 0.75rem;
                width: 100%;
                border: none;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 14px 0 rgba(139, 92, 246, 0.39);
            }
            .glass-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(139, 92, 246, 0.5);
                filter: brightness(1.1);
            }
            .orb {
                position: absolute;
                border-radius: 50%;
                filter: blur(80px);
                z-index: -1;
                animation: float 15s infinite ease-in-out alternate;
            }
            .orb-1 {
                top: -10%;
                left: -10%;
                width: 400px;
                height: 400px;
                background: rgba(139, 92, 246, 0.4);
                animation-delay: 0s;
            }
            .orb-2 {
                bottom: -20%;
                right: -10%;
                width: 500px;
                height: 500px;
                background: rgba(59, 130, 246, 0.3);
                animation-delay: -5s;
            }
            .orb-3 {
                top: 40%;
                right: 20%;
                width: 300px;
                height: 300px;
                background: rgba(236, 72, 153, 0.2);
                animation-delay: -10s;
            }
            @keyframes float {
                0% { transform: translate(0, 0) scale(1); }
                100% { transform: translate(50px, -50px) scale(1.1); }
            }
            
            /* Social Button */
            .social-btn {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 3rem;
                height: 3rem;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                color: white;
                transition: all 0.3s ease;
            }
            .social-btn:hover {
                background: rgba(255, 255, 255, 0.15);
                transform: translateY(-2px);
            }
            
            .left-panel {
                background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 100%);
                border-right: 1px solid rgba(255,255,255,0.1);
            }
        </style>
    </head>
    <body class="min-h-screen relative overflow-hidden flex items-center justify-center p-4 sm:p-8">
        <!-- Floating Animated Background Orbs -->
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>

        <div class="w-full max-w-5xl flex flex-col lg:flex-row glass-panel overflow-hidden z-10 relative">
            
            <!-- Left Info Panel (Appears on Large Screens) -->
            <div class="hidden lg:flex flex-col justify-between w-5/12 p-12 left-panel relative">
                <div>
                    {{-- <a href="/" class="inline-flex items-center text-slate-300 hover:text-white transition font-medium mb-12">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Home
                    </a> --}}
                    
                    <div class="mb-4 inline-flex p-3 rounded-xl bg-gradient-to-br from-indigo-500/20 to-purple-500/20 border border-white/10">
                        <svg class="w-8 h-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    
                    <h1 class="text-4xl font-extrabold text-white mb-6 leading-tight tracking-tight mt-6">
                        {{ $heading ?? 'Welcome.' }}
                    </h1>
                    <p class="text-slate-300 text-lg leading-relaxed mb-8">
                        {{ $description ?? 'Experience the next generation of authentication. Secure, fast, and beautifully designed.' }}
                    </p>
                </div>
                
                <div class="mt-8">
                    <p class="text-slate-400 text-sm mb-4">{{ $switchText ?? "Don't have an account?" }}</p>
                    <a href="{{ $switchLink ?? route('register') }}" class="inline-block px-8 py-3 rounded-lg bg-white/5 border border-white/10 text-white font-semibold hover:bg-white hover:text-slate-900 transition-all duration-300 hover:shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                        {{ $switchButton ?? 'Sign Up' }}
                    </a>
                </div>
            </div>

            <!-- Right Form Panel -->
            <div class="w-full lg:w-7/12 p-8 sm:p-12 lg:p-16 flex flex-col justify-center relative bg-white/5">
                <!-- Mobile Only Header -->
                <div class="lg:hidden mb-8 text-center flex flex-col items-center">
                    <div class="p-3 inline-flex rounded-xl bg-gradient-to-br from-indigo-500/20 to-purple-500/20 border border-white/10 mb-4">
                        <svg class="w-8 h-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">{{ $title ?? 'Login' }}</h1>
                    <p class="text-slate-400 text-sm">{{ $mobileDescription ?? 'Welcome back to your workspace' }}</p>
                </div>

                <div class="hidden lg:block mb-10">
                    <h2 class="text-3xl font-bold text-white">{{ $title ?? 'Login' }}</h2>
                    <p class="text-slate-400 mt-2">{{ $subtitle ?? 'Sign in to your account' }}</p>
                </div>

                <!-- Forms Area -->
                <div class="w-full max-w-md mx-auto lg:mx-0">
                    {{ $slot }}

                    <!-- Social Login Divider -->
                    <div class="flex items-center my-8">
                        <div class="flex-grow h-px bg-white/10"></div>
                        <span class="px-4 text-xs font-semibold tracking-wider text-slate-400 uppercase">Or continue with</span>
                        <div class="flex-grow h-px bg-white/10"></div>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="social-btn" title="Google">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/></svg>
                        </a>
                        <a href="#" class="social-btn" title="Facebook">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="social-btn" title="GitHub">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                        <a href="#" class="social-btn" title="Apple">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.04-2.04.027-3.91 1.183-4.961 3.014-2.117 3.675-.546 9.103 1.519 12.09 1.013 1.454 2.208 3.126 3.805 3.076 1.527-.054 2.112-.98 3.948-.98 1.824 0 2.378.98 3.978.952 1.636-.027 2.651-1.526 3.648-2.986 1.15-1.681 1.625-3.316 1.654-3.414-.035-.015-3.197-1.225-3.23-4.881-.027-3.056 2.493-4.524 2.61-4.594-1.431-2.097-3.649-2.383-4.437-2.42-1.896-.1-3.633 1.183-4.574 1.183zm.74-6.494c-.053.012-.11.026-.17.042-.907.199-2.126.839-2.731 1.597-.534.664-1.002 1.62-1.037 2.531.037.014.072.03.109.043.953.21 2.138-.344 2.753-1.074.577-.666 1.018-1.579 1.076-2.529z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
