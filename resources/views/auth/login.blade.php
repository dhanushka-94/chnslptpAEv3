@extends('layouts.app')

@section('title', 'Login - CHANCE LAPTOPS')
@section('description', 'Sign in to your CHANCE LAPTOPS account to track orders, manage your profile, and enjoy personalized shopping experience.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-white via-red-50 to-white flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Enhanced Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 rounded-full bg-red-500/20 blur-3xl -top-48 -left-48 animate-pulse"></div>
        <div class="absolute w-96 h-96 rounded-full bg-red-600/20 blur-3xl -bottom-48 -right-48 animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute w-72 h-72 rounded-full bg-red-400/10 blur-2xl top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
    </div>
    
    <div class="max-w-md w-full space-y-8 relative z-10">
        <!-- Enhanced Glass Card Container -->
        <div class="bg-white/90 backdrop-blur-xl border border-gray-200/50 rounded-2xl p-6 md:p-8 shadow-2xl relative overflow-hidden">
            <!-- Decorative gradient border effect -->
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-red-500/10 via-transparent to-red-600/10 opacity-50"></div>
            <div class="relative z-10">
                <!-- Logo and Header -->
                <div class="text-center mb-8">
                    <div class="h-28 w-28 md:h-36 md:w-36 mx-auto mb-6 relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-500/30 to-red-600/20 rounded-full blur-xl group-hover:blur-2xl transition-all duration-300"></div>
                        <div class="relative z-10">
                            <img src="{{ asset('chance-laptops-logo.png') }}" 
                                 alt="Chance Laptops Logo" 
                                 class="w-full h-full object-contain drop-shadow-lg group-hover:scale-105 transition-transform duration-300">
                        </div>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3 bg-gradient-to-r from-white via-red-100 to-white bg-clip-text text-transparent">
                        Welcome Back
                    </h2>
                    <p class="text-base md:text-lg text-gray-700">Sign in to your <span class="text-red-400 font-semibold">CHANCE LAPTOPS</span> account</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-900/40 backdrop-blur-sm border border-red-500/50 text-red-200 px-4 py-3 rounded-xl mb-6 animate-fadeIn">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-red-400 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                            </svg>
                            <ul class="list-none space-y-1 flex-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Success Messages -->
                @if (session('success'))
                    <div class="bg-green-900/40 backdrop-blur-sm border border-green-500/50 text-green-200 px-4 py-3 rounded-xl mb-6 animate-fadeIn">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-400 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form class="space-y-6" action="{{ route('login') }}" method="POST" id="loginForm">
                    @csrf
                    <div class="space-y-5">
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-200 mb-2.5">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Email Address
                                </span>
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-600 group-focus-within:text-red-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input id="email" 
                                       name="email" 
                                       type="email" 
                                       autocomplete="email" 
                                       required 
                                       value="{{ old('email') }}"
                                       class="w-full pl-12 pr-4 py-3.5 bg-white/60 backdrop-blur-sm border border-gray-300/50 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all duration-300 hover:border-gray-500/70 @error('email') border-red-500 focus:ring-red-500/50 @enderror"
                                       placeholder="your.email@example.com">
                            </div>
                            @error('email')
                                <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-200 mb-2.5">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    Password
                                </span>
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-600 group-focus-within:text-red-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input id="password" 
                                       name="password" 
                                       type="password" 
                                       autocomplete="current-password" 
                                       required 
                                       class="w-full pl-12 pr-12 py-3.5 bg-white/60 backdrop-blur-sm border border-gray-300/50 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all duration-300 hover:border-gray-500/70 @error('password') border-red-500 focus:ring-red-500/50 @enderror"
                                       placeholder="••••••••">
                                <button type="button" 
                                        onclick="togglePassword()"
                                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-600 hover:text-red-400 transition-colors focus:outline-none">
                                    <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg id="eye-off-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Remember me and Forgot password -->
                    <div class="flex items-center justify-between pt-2">
                        <div class="flex items-center group cursor-pointer">
                            <input id="remember" 
                                   name="remember" 
                                   type="checkbox" 
                                   class="h-4 w-4 bg-white border-slate-200 rounded text-red-500 focus:ring-2 focus:ring-red-500/50 focus:ring-offset-0 cursor-pointer transition-all">
                            <label for="remember" class="ml-2.5 block text-sm text-gray-700 cursor-pointer group-hover:text-gray-200 transition-colors">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="text-red-400 hover:text-red-300 font-medium transition-colors inline-flex items-center gap-1">
                                <span>Forgot password?</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" 
                                class="group relative w-full flex justify-center items-center py-3.5 px-6 text-base font-semibold rounded-xl text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:ring-offset-2 focus:ring-offset-white transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg shadow-red-500/20 hover:shadow-xl hover:shadow-red-500/30">
                            <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            <span>Sign In</span>
                            <svg class="w-5 h-5 ml-2 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center pt-4">
                        <p class="text-gray-600 text-sm">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-red-400 hover:text-red-300 font-semibold transition-colors inline-flex items-center gap-1">
                                Sign up here
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </p>
                    </div>
                </form>

                <!-- Enhanced Features Section -->
                <div class="mt-8 pt-6 border-t border-gray-200/50">
                    <p class="text-center text-gray-600 text-sm font-medium mb-5">Why create an account?</p>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex items-center text-gray-700 text-sm bg-gray-50/20 rounded-lg p-3 hover:bg-gray-100/30 transition-colors group">
                            <div class="flex-shrink-0 w-10 h-10 bg-red-500/10 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-500/20 transition-colors">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <span class="flex-1">Track your orders in real-time</span>
                        </div>
                        <div class="flex items-center text-gray-700 text-sm bg-gray-50/20 rounded-lg p-3 hover:bg-gray-100/30 transition-colors group">
                            <div class="flex-shrink-0 w-10 h-10 bg-red-500/10 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-500/20 transition-colors">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="flex-1">Save multiple delivery addresses</span>
                        </div>
                        <div class="flex items-center text-gray-700 text-sm bg-gray-50/20 rounded-lg p-3 hover:bg-gray-100/30 transition-colors group">
                            <div class="flex-shrink-0 w-10 h-10 bg-red-500/10 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-500/20 transition-colors">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <span class="flex-1">Faster checkout experience</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');
    const eyeOffIcon = document.getElementById('eye-off-icon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.add('hidden');
        eyeOffIcon.classList.remove('hidden');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('hidden');
        eyeOffIcon.classList.add('hidden');
    }
}
</script>
@endsection