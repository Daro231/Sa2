<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .cursive-title {
                font-family: 'Lobster', cursive;
                letter-spacing: 1px;
            }
            .bg-gradient-split {
                background: linear-gradient(135deg, #dca8ff 0%, #90cdff 100%);
            }
            .curved-left {
                border-top-left-radius: 35% 50%;
                border-bottom-left-radius: 35% 50%;
                box-shadow: -10px 0 30px rgba(0,0,0,0.05);
            }
            /* Input styling matching the image */
            .auth-input {
                width: 100%;
                padding: 0.75rem 1rem;
                border: 1px solid #ccc;
                border-radius: 0.375rem;
                margin-top: 0.25rem;
                outline: none;
                transition: border-color 0.2s;
            }
            .auth-input:focus {
                border-color: #5b8def;
                box-shadow: 0 0 0 2px rgba(91, 141, 239, 0.2);
            }
            .auth-btn {
                width: 100%;
                background-color: #5b8def;
                color: white;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                padding: 0.75rem 1rem;
                border-radius: 0.5rem;
                transition: background-color 0.2s, box-shadow 0.2s;
                border: none;
                cursor: pointer;
            }
            .auth-btn:hover {
                background-color: #4a7be6;
                box-shadow: 0 4px 12px rgba(91, 141, 239, 0.3);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#f2f2f2]">
        <div class="min-h-screen flex">
            <!-- Left Side (Form Area) -->
            <div class="w-full lg:w-[45%] flex flex-col justify-center items-center relative p-8">
                <!-- Back Button -->
                <a href="/" class="absolute top-8 left-8 flex items-center text-black font-bold text-lg hover:text-gray-600 transition">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back
                </a>
                
                <div class="w-full max-w-sm">
                    <!-- Title -->
                    <h2 class="text-6xl cursive-title text-center mb-12 text-black">{{ $title ?? 'Login' }}</h2>
                    
                    {{ $slot }}
                    
                    <!-- Social Login -->
                    <div class="mt-8">
                        <p class="text-center text-[10px] text-black font-bold mb-4">or login with social platforms</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="w-11 h-11 flex items-center justify-center border border-gray-400 rounded hover:bg-gray-200 transition">
                                <!-- Google Icon -->
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/></svg>
                            </a>
                            <a href="#" class="w-11 h-11 flex items-center justify-center border border-gray-400 rounded hover:bg-gray-200 transition">
                                <!-- Facebook Icon -->
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="#" class="w-11 h-11 flex items-center justify-center border border-gray-400 rounded hover:bg-gray-200 transition">
                                <!-- GitHub Icon -->
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            </a>
                            <a href="#" class="w-11 h-11 flex items-center justify-center border border-gray-400 rounded hover:bg-gray-200 transition">
                                <!-- Apple Icon -->
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.04-2.04.027-3.91 1.183-4.961 3.014-2.117 3.675-.546 9.103 1.519 12.09 1.013 1.454 2.208 3.126 3.805 3.076 1.527-.054 2.112-.98 3.948-.98 1.824 0 2.378.98 3.978.952 1.636-.027 2.651-1.526 3.648-2.986 1.15-1.681 1.625-3.316 1.654-3.414-.035-.015-3.197-1.225-3.23-4.881-.027-3.056 2.493-4.524 2.61-4.594-1.431-2.097-3.649-2.383-4.437-2.42-1.896-.1-3.633 1.183-4.574 1.183zm.74-6.494c-.053.012-.11.026-.17.042-.907.199-2.126.839-2.731 1.597-.534.664-1.002 1.62-1.037 2.531.037.014.072.03.109.043.953.21 2.138-.344 2.753-1.074.577-.666 1.018-1.579 1.076-2.529z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side (Presentation) -->
            <div class="hidden lg:flex flex-col justify-center items-center w-[55%] bg-gradient-split text-white p-12 curved-left">
                <h1 class="text-6xl font-extrabold mb-4">{{ $rightTitle ?? 'Welcome Back!' }}</h1>
                <p class="text-2xl mb-12 font-medium">{{ $rightDescription ?? 'Already have an account?' }}</p>
                <a href="{{ $rightButtonLink ?? route('login') }}" class="px-16 py-3 border border-white rounded-md hover:bg-white hover:text-[#90cdff] font-semibold tracking-wide transition">
                    {{ $rightButtonText ?? 'Login' }}
                </a>
            </div>
        </div>
    </body>
</html>
