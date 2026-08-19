<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'CHANCE LAPTOPS - Brand New & Used Laptops, Repair & Service, Accessories in United Arab Emirates')</title>
    <meta name="description" content="@yield('description', 'Chance Laptops - Your trusted destination for brand new and used laptops, laptop repair services, and all laptop accessories in United Arab Emirates. Expert service, quality products, and affordable prices.')">
    <meta name="keywords" content="@yield('keywords', 'laptops United Arab Emirates, brand new laptops, used laptops, laptop repair, laptop service, laptop accessories, laptop parts, laptop screen repair, laptop battery, laptop charger, Chance Laptops, United Arab Emirates, Dubai, Abu Dhabi')">
    <meta name="author" content="Chance Laptops">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'CHANCE LAPTOPS - Brand New & Used Laptops in United Arab Emirates')">
    <meta property="og:description" content="@yield('og_description', 'Chance Laptops - Brand new and used laptops, professional laptop repair & service, and all laptop accessories in United Arab Emirates. Expert technicians, quality products.')">
    <meta property="og:image" content="@yield('og_image', asset('chance-laptops-logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Chance Laptops">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'CHANCE LAPTOPS - Brand New & Used Laptops in United Arab Emirates')">
    <meta name="twitter:description" content="@yield('og_description', 'Chance Laptops - Brand new and used laptops, professional laptop repair & service, and all laptop accessories in United Arab Emirates. Expert technicians, quality products.')">
    <meta name="twitter:image" content="@yield('og_image', asset('chance-laptops-logo.png'))">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Fonts (non-blocking) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"></noscript>

    <!-- Google Analytics (deferred) -->
    <script defer src="https://www.googletagmanager.com/gtag/js?id=G-KKQL508WYS"></script>
    <script defer>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-KKQL508WYS');
    </script>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon.png') }}?v=ae">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon-192.png') }}?v=ae">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=ae">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}?v=ae">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
    
    
    <!-- Cart Animation Styles -->
    <style>
        @keyframes cartShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-2px) rotate(-1deg); }
            75% { transform: translateX(2px) rotate(1deg); }
        }
        
        @keyframes cartBounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        @keyframes cartGlow {
            0%, 100% { box-shadow: 0 0 5px rgba(16, 185, 129, 0.3); }
            50% { box-shadow: 0 0 20px rgba(16, 185, 129, 0.8); }
        }
        
        .cart-animate-shake {
            animation: cartShake 0.5s ease-in-out;
        }
        
        .cart-animate-bounce {
            animation: cartBounce 0.3s ease-in-out;
        }
        
        .cart-animate-glow {
            animation: cartGlow 1s ease-in-out;
        }
        
        .cart-success-flash {
            background: linear-gradient(45deg, #10b981, #059669) !important;
            color: white !important;
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="page-shell text-slate-900 font-sans antialiased">
    
    <!-- Top Contact Bar -->
    <div class="site-topbar relative overflow-hidden">
        <div class="relative z-10 max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center py-2.5 text-sm">
                <!-- Contact Information -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 md:space-x-6 text-gray-700 text-center sm:text-left w-full sm:w-auto mb-2 sm:mb-0">
                    <a href="https://wa.me/{{ config('products.whatsapp_number', '971581811579') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="flex items-center justify-center sm:justify-start space-x-2 group cursor-pointer min-h-[44px] py-1">
                        <div class="w-9 h-9 sm:w-8 sm:h-8 bg-[#25D366]/15 rounded-lg flex items-center justify-center group-hover:bg-[#25D366]/25 transition-colors flex-shrink-0">
                            <svg class="w-5 h-5 sm:w-4 sm:h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-[#25D366] transition-colors block leading-tight">WhatsApp</span>
                            <span class="text-xs text-gray-500">{{ config('products.whatsapp_display', '+971 58 181 1579') }}</span>
                        </div>
                    </a>
                    
                    <div class="hidden sm:block w-px h-5 bg-red-500/20"></div>
                    
                    <div class="flex items-center justify-center sm:justify-start space-x-2 group cursor-pointer min-h-[44px] py-1">
                        <div class="w-9 h-9 sm:w-8 sm:h-8 bg-red-500/10 rounded-lg flex items-center justify-center group-hover:bg-red-500/20 transition-colors flex-shrink-0">
                            <svg class="w-5 h-5 sm:w-4 sm:h-4 text-red-400 group-hover:text-red-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                        <a href="mailto:info@chancelaptops.ae" class="text-sm sm:text-sm font-medium text-gray-700 group-hover:text-red-400 transition-colors break-all sm:break-normal">info@chancelaptops.ae</a>
                </div>
                </div>
                
                <!-- Right Side: Delivery & Social -->
                <div class="flex flex-row items-center justify-center sm:justify-end space-x-3 sm:space-x-4 md:space-x-6 text-xs w-full sm:w-auto">
                    <!-- Delivery Info -->
                    <div class="flex items-center space-x-1.5 sm:space-x-2 bg-red-600 px-2.5 sm:px-3 py-1.5 rounded-full shadow-sm min-h-[36px]">
                        <svg class="w-4 h-4 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span class="text-white font-semibold text-xs hidden sm:inline whitespace-nowrap">Across the UAE Express Delivery</span>
                        <span class="text-white font-semibold text-xs sm:hidden whitespace-nowrap">Express Delivery</span>
                    </div>

                    <!-- Social Media Links -->
                    <div class="flex items-center space-x-1.5 sm:space-x-2">
                        <span class="text-gray-500 text-xs hidden lg:inline mr-1">Follow:</span>
                        <div class="flex space-x-1.5 sm:space-x-2">
                            <a href="{{ config('products.facebook_url') }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="w-7 h-7 bg-gray-100 hover:bg-[#1877f2] rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110 border border-gray-300/50 hover:border-[#1877f2]"
                               title="Follow us on Facebook">
                                <svg class="w-3.5 h-3.5 text-gray-600 hover:text-red-600 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="{{ config('products.instagram_url') }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="w-7 h-7 bg-gray-100 hover:bg-gradient-to-br hover:from-[#f58529] hover:via-[#dd2a7b] hover:to-[#8134af] rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110 border border-gray-300/50"
                               title="Follow us on Instagram">
                                <svg class="w-3.5 h-3.5 text-gray-600 hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Site Header -->
    <header class="site-header sticky top-0 z-[9999] navigation-header">
        <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <!-- Logo, Search, Account -->
            <div class="site-header-main flex items-center justify-between py-2 sm:py-3 md:py-4 gap-2 sm:gap-3 md:gap-4">
                <!-- Logo — wide image: height-based sizing, not square -->
                <div class="site-logo-wrap flex-shrink-0">
                    <a href="{{ route('home') }}" class="site-logo-link group" aria-label="Chance Laptops Home">
                        <img src="{{ asset('chance-laptops-logo.png') }}"
                             alt="Chance Laptops UAE"
                             class="site-logo"
                             width="280"
                             height="140"
                             loading="eager"
                             decoding="async">
                        <div class="hidden lg:block site-logo-text min-w-0">
                            <p class="text-xs text-slate-500 mt-0.5 truncate">Your Trusted Laptop Solution Provider</p>
                        </div>
                    </a>
                </div>

                <!-- Search Bar - Enhanced Design -->
                <div class="flex-1 mx-2 sm:mx-3 md:mx-6 lg:mx-8 min-w-0">
                    <!-- Mobile Search Button -->
                    <button class="md:hidden p-2.5 min-w-[44px] min-h-[44px] text-gray-700 hover:text-red-400 transition-all duration-200 rounded-lg hover:bg-red-500/10 border border-transparent hover:border-red-500/30 flex items-center justify-center" id="mobile-search-toggle">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                    
                    <!-- Desktop Search - Modern Design -->
                    <form action="{{ route('products.search') }}" method="GET" class="relative hidden md:block" id="search-form">
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-r from-red-500/20 to-red-600/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative flex items-center">
                                <input type="text" name="q" placeholder="Search laptops, parts, accessories..." 
                                       class="header-search w-full text-slate-900 px-5 py-2.5 pl-14 pr-32 focus:outline-none placeholder-slate-400" 
                               value="{{ request('q') }}" 
                               id="search-input"
                               autocomplete="off">
                                <svg class="w-5 h-5 absolute left-5 text-red-400 group-hover:text-red-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                                <button type="submit" class="absolute right-2 bg-gradient-to-r from-red-500 to-red-600 text-white px-5 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 text-sm font-semibold shadow-lg shadow-red-500/30 hover:shadow-red-500/50 hover:scale-105 flex items-center space-x-2">
                                    <span>Search</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                        </button>
                            </div>
                        </div>
                        
                        <!-- Search Suggestions Dropdown -->
                        <div id="search-suggestions" class="absolute top-full left-0 right-0 bg-white/95 border border-red-500/30 rounded-xl shadow-2xl shadow-red-500/20 mt-2 hidden z-[9999] max-h-80 overflow-y-auto backdrop-blur-md">
                            <!-- Suggestions will be populated here -->
                        </div>
                    </form>
                </div>

                <!-- Right side items -->
                <div class="flex items-center space-x-1.5 sm:space-x-2 md:space-x-3 flex-shrink-0">
                    <!-- Enhanced Account Section -->
                    @auth
                        <div class="relative group">
                            <div class="flex items-center space-x-1.5 sm:space-x-2 text-gray-700 hover:text-red-400 transition-all duration-200 cursor-pointer py-1.5 sm:py-2 px-2 sm:px-3 rounded-xl hover:bg-red-500/10 border border-transparent hover:border-red-500/30 min-w-[44px] min-h-[44px] sm:min-w-0 sm:min-h-0 justify-center sm:justify-start">
                                <div class="relative flex-shrink-0">
                                    <div class="w-9 h-9 sm:w-8 sm:h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-lg shadow-red-500/40 ring-2 ring-red-500/20 group-hover:ring-red-500/50 transition-all">
                                        <span class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <div class="absolute -top-0.5 -right-0.5 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full shadow-sm"></div>
                                </div>
                                <div class="hidden lg:block">
                                    <p class="text-sm font-semibold truncate max-w-[120px]">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500">Account</p>
                                </div>
                                <svg class="w-4 h-4 text-gray-600 group-hover:text-red-400 transition-colors hidden sm:block flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            
                            <!-- Account Dropdown - Modern Design -->
                            <div class="absolute top-full right-0 mt-2 w-64 bg-white/95 border border-red-500/30 rounded-xl shadow-2xl shadow-red-500/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-[9999] backdrop-blur-md">
                                <div class="py-2">
                                    <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-red-500/10 hover:text-red-400 transition-all duration-200 border-l-2 border-transparent hover:border-red-500">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                        </svg>
                                        Dashboard
                                    </a>
                                    <a href="{{ route('profile.show') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-red-500/10 hover:text-red-400 transition-all duration-200 border-l-2 border-transparent hover:border-red-500">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Profile Settings
                                    </a>
                                    <a href="{{ route('user.orders') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-red-500/10 hover:text-red-400 transition-all duration-200 border-l-2 border-transparent hover:border-red-500">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        My Orders
                                    </a>
                                    <a href="{{ route('user.settings') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-red-500/10 hover:text-red-400 transition-all duration-200 border-l-2 border-transparent hover:border-red-500">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Settings
                                    </a>
                                    <hr class="my-2 border-red-500/20">
                                    <a href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Logout
                                    </a>
                                </div>
                            </div>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center space-x-1.5 sm:space-x-2 text-gray-700 hover:text-red-400 transition-all duration-200 py-1.5 sm:py-2.5 px-2 sm:px-3 rounded-xl hover:bg-red-500/10 border border-transparent hover:border-red-500/30 min-w-[44px] min-h-[44px] sm:min-w-0 sm:min-h-0 justify-center sm:justify-start">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-sm font-medium hidden sm:block">Account</span>
                        </a>
                    @endauth

                    <!-- Enhanced Cart Section -->
                    <a href="{{ route('cart.index') }}" class="relative cart-container group hidden sm:flex items-center space-x-2 md:space-x-3 text-gray-700 hover:text-red-400 transition-all duration-200 py-1.5 sm:py-2.5 px-2 sm:px-3 md:px-4 rounded-xl hover:bg-red-500/10 border border-transparent hover:border-red-500/30 min-h-[44px]">
                        <div class="relative flex-shrink-0">
                            <svg class="w-6 h-6 cart-icon transition-all duration-300 group-hover:scale-110 group-hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"/>
                            </svg>
                        </div>
                        <div class="hidden lg:block min-w-[90px]">
                            <div class="flex flex-col items-start">
                                <span class="text-sm font-semibold">Cart</span>
                                <span class="cart-total text-xs text-gray-600 font-medium">AED 0.00</span>
                            </div>
                        </div>
                    </a>

                    <!-- Mobile Cart Icon -->
                    <a href="{{ route('cart.index') }}" class="relative cart-container-mobile group sm:hidden flex items-center text-gray-700 hover:text-red-400 transition-all duration-200 py-2 px-2.5 rounded-xl hover:bg-red-500/10 border border-transparent hover:border-red-500/30 min-w-[44px] min-h-[44px] justify-center">
                        <div class="relative">
                            <svg class="w-6 h-6 cart-icon-mobile transition-all duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"/>
                            </svg>
                        </div>
                        <div class="ml-1.5 min-w-[60px] hidden xs:block">
                            <span class="cart-total text-xs text-gray-600 font-medium">AED 0.00</span>
                        </div>
                    </a>

                    <!-- Mobile menu button -->
                    <button class="md:hidden p-2.5 min-w-[44px] min-h-[44px] hover:bg-red-500/10 rounded-xl transition-all duration-200 border border-transparent hover:border-red-500/30 flex items-center justify-center" id="mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-700 hover:text-red-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="site-nav hidden md:flex items-center justify-center flex-wrap gap-1 lg:gap-2 py-2.5 px-2">
                <a href="{{ route('home') }}" class="nav-pill {{ request()->routeIs('home') ? 'nav-pill-active' : '' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Home
                </a>
                
                <!-- Categories Dropdown -->
                <div class="relative group">
                    <button class="nav-pill {{ request()->routeIs('categories.*') ? 'nav-pill-active' : '' }}" id="categories-dropdown-trigger">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        Categories
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:rotate-180" id="categories-dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Categories Dropdown Menu - Enhanced Design -->
                    <div class="absolute top-full left-0 w-80 md:w-96 bg-white/95 border border-red-500/30 rounded-xl shadow-2xl shadow-red-500/20 opacity-0 invisible md:group-hover:opacity-100 md:group-hover:visible transition-all duration-200 z-[9999] dropdown-menu max-h-[70vh] overflow-hidden backdrop-blur-md" id="categories-dropdown-menu">
                        <div class="py-3">
                            <!-- Dropdown Header -->
                            <div class="px-4 pb-3 border-b border-red-500/20">
                                <h3 class="text-red-600 font-semibold text-sm">Browse Categories</h3>
                            </div>
                            
                            <!-- Categories List with Scrolling -->
                            <div class="py-2 max-h-[60vh] overflow-y-auto">
                                @foreach($menuCategories as $category)
                                    <!-- Main Category -->
                                    <div class="mb-1">
                                        @if($category->subcategories->count() > 0)
                                            <!-- Main Category with Subcategories (Non-clickable) -->
                                            <div class="flex items-center px-4 py-2 text-gray-700 cursor-default">
                                                <svg class="w-4 h-4 mr-3 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/>
                                                </svg>
                                                <span class="font-medium text-sm">{{ $category->name }}</span>
                                                <svg class="w-3 h-3 ml-auto text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/>
                                                </svg>
                                            </div>
                                        @else
                                            <!-- Main Category without Subcategories (Clickable) -->
                                            <a href="{{ route('categories.show', $category->slug ?: $category->id) }}" 
                                               class="flex items-center px-4 py-2 text-gray-700 hover:bg-red-500/10 hover:text-red-400 transition-all duration-200 border-l-2 border-transparent hover:border-red-500 group">
                                                <svg class="w-4 h-4 mr-3 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/>
                                                </svg>
                                                <span class="font-medium text-sm">{{ $category->name }}</span>
                                            </a>
                                        @endif
                                        
                                        <!-- Subcategories -->
                                        @if($category->subcategories->count() > 0)
                                            <div class="ml-6 mt-1 space-y-1">
                                                @foreach($category->subcategories as $subcategory)
                                                    <a href="{{ route('categories.show', $subcategory->slug ?: $subcategory->id) }}" 
                                                       class="flex items-center px-4 py-1.5 text-gray-600 hover:bg-red-500/10 hover:text-red-400 transition-all duration-200 text-sm border-l-2 border-transparent hover:border-red-500/50 group">
                                                            <svg class="w-3 h-3 mr-3 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/>
                                                            </svg>
                                                            <span>{{ $subcategory->name }}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- View All Categories -->
                            <div class="border-t border-red-500/20 mt-3 pt-3">
                                <a href="{{ route('categories.index') }}" 
                                   class="flex items-center justify-center px-4 py-2 text-red-400 hover:bg-red-500/10 transition-all duration-200 font-medium text-sm rounded-lg">
                                    <span>View All Categories</span>
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('promotions.index') }}" class="nav-pill {{ request()->routeIs('promotions.*') ? 'nav-pill-active' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    Promotions
                </a>
                <a href="{{ route('wholesale.index') }}" class="nav-pill {{ request()->routeIs('wholesale.*') ? 'nav-pill-active' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Wholesale
                </a>
                <a href="{{ route('about-us.index') }}" class="nav-pill {{ request()->routeIs('about-us.*') ? 'nav-pill-active' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    About Us
                </a>
                <a href="{{ route('contact-us.index') }}" class="nav-pill {{ request()->routeIs('contact-us.*') ? 'nav-pill-active' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Contact Us
                </a>
            </nav>
        </div>
        

        <!-- Mobile Search Overlay -->
        <div class="md:hidden hidden fixed inset-0 bg-white/95 z-[9998]" id="mobile-search-overlay">
            <div class="flex items-start pt-4 px-4">
                <div class="flex-1">
                    <form action="{{ route('products.search') }}" method="GET" class="relative" id="mobile-search-form">
                        <input type="text" name="q" placeholder="Search computers, parts, accessories..." 
                               class="w-full bg-gray-50 border border-gray-300 text-gray-900 px-4 py-3 pl-12 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 placeholder-gray-500" 
                               value="{{ request('q') }}" 
                               id="mobile-search-input"
                               autocomplete="off">
                        <svg class="w-5 h-5 absolute left-4 top-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        
                        <!-- Mobile Search Suggestions -->
                        <div id="mobile-search-suggestions" class="absolute top-full left-0 right-0 bg-white border border-red-500/30 rounded-lg shadow-xl shadow-red-500/10 mt-1 hidden z-[9999] max-h-80 overflow-y-auto backdrop-blur-sm">
                            <!-- Suggestions will be populated here -->
                        </div>
                    </form>
                </div>
                <button class="ml-4 p-2 text-gray-700 hover:text-red-600" id="mobile-search-close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
                </div>
                
        <!-- Mobile Menu -->
        <div class="md:hidden hidden mobile-menu" id="mobile-menu">
            <div class="px-4 pt-4 pb-3 space-y-4 bg-white border-t border-gray-200 max-h-[80vh] overflow-y-auto">
                
                <!-- Main Navigation Section -->
                <div class="space-y-3">
                    <h3 class="text-red-400 font-semibold text-sm uppercase tracking-wider border-b border-red-500/20 pb-2 flex items-center">
                        <span class="w-1 h-4 bg-gradient-to-b from-red-500 to-red-600 rounded-full mr-2"></span>
                        Main Menu
                    </h3>
                    <a href="{{ route('home') }}" class="flex items-center py-3 text-gray-700 hover:text-red-400 transition-colors {{ request()->routeIs('home') ? 'text-red-400 bg-red-500/15 border-l-2 border-red-500' : '' }} rounded-lg px-3">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Home
                    </a>
                    
                    <a href="{{ route('promotions.index') }}" class="flex items-center py-3 text-gray-700 hover:text-red-400 transition-all duration-200 {{ request()->routeIs('promotions.*') ? 'text-red-400 bg-red-500/15 border-l-2 border-red-500' : '' }} rounded-lg px-3">
                        <svg class="w-5 h-5 mr-3 text-red-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        Promotions
                    </a>
                    
                    <a href="{{ route('wholesale.index') }}" class="flex items-center py-3 text-gray-700 hover:text-red-400 transition-all duration-200 {{ request()->routeIs('wholesale.*') ? 'text-red-400 bg-red-500/15 border-l-2 border-red-500' : '' }} rounded-lg px-3">
                        <svg class="w-5 h-5 mr-3 text-red-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Wholesale
                    </a>
                </div>

                <!-- Categories Section -->
                <div class="space-y-3">
                    <h3 class="text-red-400 font-semibold text-sm uppercase tracking-wider border-b border-red-500/20 pb-2 flex items-center">
                        <span class="w-1 h-4 bg-gradient-to-b from-red-500 to-red-600 rounded-full mr-2"></span>
                        Categories
                    </h3>
                    
                    <!-- All Categories Link -->
                    <a href="{{ route('categories.index') }}" class="flex items-center py-3 text-red-400 hover:bg-red-500/10 transition-colors rounded-lg px-3 border border-red-500/30 bg-red-500/5">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        <span class="font-medium">All Categories</span>
                    </a>

                    <!-- Main Categories with Subcategories -->
                    @foreach($menuCategories as $category)
                        <!-- Main Category -->
                        <div class="mb-1">
                            <div class="flex items-center">
                                @if($category->subcategories->count() > 0)
                                    <!-- Main Category with Subcategories (Non-clickable) -->
                                    <div class="flex-1 flex items-center py-2 px-3 text-gray-700 cursor-default rounded-lg">
                                        <svg class="w-4 h-4 mr-3 text-primary-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                        </svg>
                                        <span class="font-medium text-sm">{{ $category->name }}</span>
                                    </div>
                                    <button class="p-2 text-gray-600 hover:text-red-600 transition-colors mobile-category-toggle" data-category="{{ $category->id }}">
                                        <svg class="w-4 h-4 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                @else
                                    <!-- Main Category without Subcategories (Clickable) -->
                                    <a href="{{ route('categories.show', $category->slug ?: $category->id) }}" 
                                       class="flex-1 flex items-center py-2 px-3 text-gray-700 hover:text-red-600 hover:bg-gray-100 transition-colors rounded-lg group">
                                        <svg class="w-4 h-4 mr-3 text-primary-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                        </svg>
                                        <span class="font-medium text-sm">{{ $category->name }}</span>
                                    </a>
                                @endif
                            </div>
                            
                            <!-- Subcategories (Collapsible) -->
                            @if($category->subcategories->count() > 0)
                                <div class="mobile-subcategories ml-6 mt-1 space-y-1 hidden" id="mobile-subcategories-{{ $category->id }}">
                                    @foreach($category->subcategories->take(10) as $subcategory)
                               <a href="{{ route('categories.show', $subcategory->slug ?: $subcategory->id) }}" 
                                  class="flex items-center px-3 py-1.5 text-gray-600 hover:text-primary-400 hover:bg-gray-100/50 transition-colors text-sm rounded group">
                                   <svg class="w-3 h-3 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                       <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/>
                                   </svg>
                                   <span>{{ $subcategory->name }}</span>
                                        </a>
                                    @endforeach
                                    @if($category->subcategories->count() > 10)
                                        <a href="{{ route('categories.show', $category->slug ?: $category->id) }}" 
                                           class="block px-3 py-1 text-xs text-primary-400 hover:text-primary-300 transition-colors">
                                            +{{ $category->subcategories->count() - 10 }} more subcategories
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                
                <!-- Services & Support -->
                <div class="space-y-3">
                    <h3 class="text-red-400 font-semibold text-sm uppercase tracking-wider border-b border-red-500/20 pb-2 flex items-center">
                        <span class="w-1 h-4 bg-gradient-to-b from-red-500 to-red-600 rounded-full mr-2"></span>
                        Support
                    </h3>
                    
                    <a href="{{ route('about-us.index') }}" class="flex items-center py-3 text-gray-700 hover:text-red-400 transition-colors {{ request()->routeIs('about-us.*') ? 'text-red-400 bg-red-500/15 border-l-2 border-red-500' : '' }} rounded-lg px-3">
                        <svg class="w-5 h-5 mr-3 text-red-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        About Us
                    </a>
                    
                    <a href="{{ route('contact-us.index') }}" class="flex items-center py-3 text-gray-700 hover:text-red-400 transition-colors {{ request()->routeIs('contact-us.*') ? 'text-red-400 bg-red-500/15 border-l-2 border-red-500' : '' }} rounded-lg px-3">
                        <svg class="w-5 h-5 mr-3 text-red-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact Us
                    </a>
                    
                </div>
                
                <!-- Mobile Account & Cart -->
                <div class="border-t border-gray-200 pt-3 mt-3">
                    @auth
                        <!-- Logged In User Menu -->
                        <div class="space-y-2">
                            <div class="flex items-center py-2 text-gray-700 border-b border-gray-200 pb-2">
                                <img class="w-6 h-6 rounded-full mr-3" src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}">
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                            </div>
                            <a href="{{ route('user.dashboard') }}" class="flex items-center py-2 text-gray-700 hover:text-red-500 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('user.orders') }}" class="flex items-center py-2 text-gray-700 hover:text-red-500 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                                My Orders
                            </a>
                            <a href="{{ route('profile.show') }}" class="flex items-center py-2 text-gray-700 hover:text-red-500 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Profile Settings
                            </a>
                            <a href="{{ route('user.settings') }}" class="flex items-center py-2 text-gray-700 hover:text-red-500 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Settings
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="flex items-center py-2 text-gray-700 hover:text-red-400 transition-colors w-full text-left">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Guest User Menu -->
                        <div class="space-y-2">
                            <a href="{{ route('login') }}" class="flex items-center py-2 text-gray-700 hover:text-red-500 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="flex items-center py-2 text-gray-700 hover:text-red-500 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                Register
                            </a>
                        </div>
                    @endauth
                    
                    <a href="{{ route('cart.index') }}" class="flex items-center justify-between py-2.5 px-3 text-gray-700 hover:text-red-400 mobile-cart-container rounded-lg hover:bg-red-500/10 border border-transparent hover:border-red-500/30 transition-all">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 mobile-cart-icon transition-transform duration-300 text-red-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"/>
                            </svg>
                            <span class="mobile-cart-text font-medium">Cart</span>
                        </div>
                        <span class="cart-total text-xs text-red-400 font-semibold">AED 0.00</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

         <!-- Main Content -->
     <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer relative mt-16 overflow-hidden">
        <div class="footer-trust-bar">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 text-center sm:text-left">
                    <div class="footer-trust-item justify-center sm:justify-start">
                        <svg class="w-4 h-4 text-red-100 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>Across the UAE Express Delivery</span>
                    </div>
                    <div class="footer-trust-item justify-center sm:justify-start">
                        <svg class="w-4 h-4 text-red-100 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span>1-Year Hardware Warranty</span>
                    </div>
                    <div class="footer-trust-item justify-center sm:justify-start">
                        <svg class="w-4 h-4 text-red-100 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Online Store · Support Daily (Fri Closed)</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 sm:pt-12 pb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-12 gap-8 xl:gap-10 mb-10">
                {{-- Brand --}}
                <div class="xl:col-span-4">
                    <div class="footer-brand-block h-full">
                        <div class="flex items-start gap-4 mb-5">
                            <img src="{{ asset('chance-laptops-logo.png') }}"
                                 alt="Chance Laptops UAE"
                                 class="h-20 w-auto max-w-[11rem] object-contain flex-shrink-0">
                            <div>
                                <h3 class="text-xl font-bold text-red-600 leading-tight">CHANCE LAPTOPS</h3>
                                <p class="text-xs font-semibold text-red-500/90 uppercase tracking-wider mt-0.5">Online Store · UAE</p>
                                <p class="text-slate-600 text-sm leading-relaxed mt-2">
                                    Brand-new &amp; used laptops, accessories, and expert repair across the United Arab Emirates.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <a href="{{ config('products.facebook_url') }}"
                               target="_blank" rel="noopener noreferrer"
                               class="social-icon-btn hover:bg-[#1877f2] hover:text-white hover:border-[#1877f2]"
                               title="Facebook" aria-label="Facebook">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="{{ config('products.instagram_url') }}"
                               target="_blank" rel="noopener noreferrer"
                               class="social-icon-btn hover:bg-gradient-to-br hover:from-[#f58529] hover:via-[#dd2a7b] hover:to-[#8134af] hover:text-white hover:border-transparent"
                               title="Instagram" aria-label="Instagram">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <a href="https://wa.me/{{ config('products.whatsapp_number') }}"
                               target="_blank" rel="noopener noreferrer"
                               class="social-icon-btn hover:bg-[#25D366] hover:text-white hover:border-[#25D366]"
                               title="WhatsApp" aria-label="WhatsApp">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Links --}}
                <div class="xl:col-span-2">
                    <h4 class="footer-heading">Shop</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                        <li><a href="{{ route('products.index') }}" class="footer-link">All Products</a></li>
                        <li><a href="{{ route('categories.index') }}" class="footer-link">Categories</a></li>
                        <li><a href="{{ route('promotions.index') }}" class="footer-link">Promotions</a></li>
                        <li><a href="{{ route('wholesale.index') }}" class="footer-link">Wholesale</a></li>
                    </ul>
                </div>

                <div class="xl:col-span-2">
                    <h4 class="footer-heading">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('about-us.index') }}" class="footer-link">About Us</a></li>
                        <li><a href="{{ route('contact-us.index') }}" class="footer-link">Contact</a></li>
                        <li><a href="{{ route('warranty') }}" class="footer-link">Warranty</a></li>
                        <li><a href="{{ route('return-policy') }}" class="footer-link">Return Policy</a></li>
                        <li><a href="{{ route('privacy-policy') }}" class="footer-link">Privacy Policy</a></li>
                        <li><a href="{{ route('terms-of-service') }}" class="footer-link">Terms of Service</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div class="xl:col-span-4">
                    <h4 class="footer-heading">Contact</h4>
                    <ul class="footer-contact-list">
                        <li>
                            <span class="footer-contact-label">WhatsApp</span>
                            <a href="https://wa.me/{{ config('products.whatsapp_number') }}" target="_blank" rel="noopener noreferrer" class="footer-contact-value hover:text-[#25D366]">
                                {{ config('products.whatsapp_display') }}
                            </a>
                        </li>
                        <li>
                            <span class="footer-contact-label">Email</span>
                            <a href="mailto:info@chancelaptops.ae" class="footer-contact-value hover:text-red-600">info@chancelaptops.ae</a>
                        </li>
                        <li>
                            <span class="footer-contact-label">Hours</span>
                            <span class="footer-contact-value">Everyday 11:00 AM – 11:00 PM · Friday Closed</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Payments --}}
            <div class="footer-payments-strip">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <p class="text-sm font-bold text-slate-900">Payments launching soon</p>
                        <p class="text-xs text-slate-500 mt-0.5">Tamara · Tabby · Bank Transfer</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="footer-pay-chip" title="Tamara — Coming Soon">
                            <img src="{{ asset('images/tamara-logo.png') }}" alt="Tamara" class="h-7 w-auto object-contain">
                            <span class="footer-soon-tag">Soon</span>
                        </div>
                        <div class="footer-pay-chip" title="Tabby — Coming Soon">
                            <img src="{{ asset('images/tabby-logo.png') }}" alt="Tabby" class="h-7 w-auto object-contain">
                            <span class="footer-soon-tag">Soon</span>
                        </div>
                        <div class="footer-pay-chip footer-pay-chip--muted" title="Bank Transfer — Coming Soon">
                            <span class="text-xs font-bold text-slate-700">Bank Transfer</span>
                            <span class="footer-soon-tag">Soon</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bottom --}}
            <div class="footer-bottom-bar mt-8 pt-6 border-t border-slate-200/80">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-3 text-center sm:text-left">
                    <div>
                        <p class="text-slate-700 text-sm">
                            © {{ date('Y') }} <span class="text-red-600 font-bold">Chance Laptops</span> · All rights reserved
                        </p>
                        <p class="text-slate-500 text-xs mt-1">
                            Developed by <a href="https://olexto.com" target="_blank" rel="noopener" class="text-red-600 font-semibold hover:underline">Olexto Digital Solutions</a>
                        </p>
                    </div>
                    <p class="text-slate-500 text-xs">Laptops · Repair · Accessories · Across the UAE</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-6 right-6 bg-gradient-to-br from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white p-3 rounded-full shadow-lg hover:shadow-xl hover:shadow-red-500/50 transition-all duration-300 opacity-0 invisible z-50 group border border-red-400/30">
        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    @stack('scripts')
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Mobile search toggle
        document.getElementById('mobile-search-toggle').addEventListener('click', function() {
            const mobileSearchOverlay = document.getElementById('mobile-search-overlay');
            mobileSearchOverlay.classList.remove('hidden');
            document.getElementById('mobile-search-input').focus();
        });

        // Mobile search close
        document.getElementById('mobile-search-close').addEventListener('click', function() {
            const mobileSearchOverlay = document.getElementById('mobile-search-overlay');
            mobileSearchOverlay.classList.add('hidden');
        });

        // Mobile category toggle functionality in hamburger menu
        document.addEventListener('click', function(e) {
            if (e.target.closest('.mobile-category-toggle')) {
                const button = e.target.closest('.mobile-category-toggle');
                const categoryId = button.getAttribute('data-category');
                const subcategoriesDiv = document.getElementById('mobile-subcategories-' + categoryId);
                const arrow = button.querySelector('svg');
                
                if (subcategoriesDiv.classList.contains('hidden')) {
                    // Show subcategories
                    subcategoriesDiv.classList.remove('hidden');
                    arrow.classList.add('rotate-180');
                } else {
                    // Hide subcategories
                    subcategoriesDiv.classList.add('hidden');
                    arrow.classList.remove('rotate-180');
                }
            }
        });

        // Cart total display function (simplified, no count)
        function updateCartTotal(cartTotal = null) {
            try {
                if (cartTotal !== null) {
                    localStorage.setItem('cartTotal', cartTotal);
                } else {
                    cartTotal = localStorage.getItem('cartTotal') || '0.00';
                }
                
                // Update cart total display (but not on cart page itself)
                if (!window.location.pathname.includes('/cart')) {
                    const cartTotalElements = document.querySelectorAll('.cart-total');
                    cartTotalElements.forEach(element => {
                        if (element) {
                            element.textContent = `AED ${cartTotal}`;
                        }
                    });
                }
            } catch (error) {
                console.error('Error updating cart total:', error);
            }
        }
        
        
        function animateCartIcon() {
            // Subtle professional cart feedback - no shaking or bouncing
            const cartIcons = document.querySelectorAll('.cart-icon, .mobile-cart-icon, .cart-icon-mobile');
            cartIcons.forEach(icon => {
                icon.style.transform = 'scale(1.05)';
                icon.style.transition = 'transform 0.2s ease';
                setTimeout(() => {
                    icon.style.transform = 'scale(1)';
                }, 300);
            });
        }
        
        function showCartPulse() {
            // Subtle professional pulse - no excessive animation
            const pulseElements = document.querySelectorAll('.cart-pulse');
            pulseElements.forEach(pulse => {
                pulse.style.opacity = '0.8';
                pulse.style.transition = 'opacity 0.3s ease';
                setTimeout(() => {
                    pulse.style.opacity = '0';
                }, 800);
            });
        }
        
        function showCartSuccessNotification(message = 'Item added to cart!') {
            // Remove any existing notifications
            const existingNotifications = document.querySelectorAll('.cart-notification');
            existingNotifications.forEach(n => n.remove());
            
            // Create floating cart notification
            const notification = document.createElement('div');
            notification.className = 'cart-notification fixed z-[99999] bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-3 rounded-xl shadow-2xl transition-all duration-500 flex items-center space-x-3 border border-green-400/20';
            
            // Always position notification in top-right, within viewport
            notification.style.top = '20px';
            notification.style.right = '20px';
            notification.style.maxWidth = '320px';
            notification.style.width = 'auto';
            notification.style.transform = 'translateX(100%)'; // Start off-screen to the right
            
            // For mobile screens, adjust positioning
            if (window.innerWidth < 640) {
                notification.style.right = '10px';
                notification.style.left = '10px';
                notification.style.maxWidth = 'none';
                notification.style.width = 'auto';
                notification.style.transform = 'translateY(-100%)'; // Start off-screen above
            }
            
            notification.innerHTML = `
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center animate-bounce">
                        <svg class="w-5 h-5 text-green-800" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-sm">${message}</p>
                    <p class="text-green-100 text-xs mt-1">View cart to proceed to checkout</p>
                </div>
                <button onclick="this.parentElement.remove()" class="flex-shrink-0 text-green-200 hover:text-red-600 transition-colors ml-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            
            document.body.appendChild(notification);
            
            // Trigger slide-in animation
            setTimeout(() => {
                if (window.innerWidth < 640) {
                    notification.style.transform = 'translateY(0)'; // Slide down on mobile
                } else {
                    notification.style.transform = 'translateX(0)'; // Slide in from right on desktop
                }
            }, 100);
            
            // Auto remove after 4 seconds
            setTimeout(() => {
                if (window.innerWidth < 640) {
                    notification.style.transform = 'translateY(-100%)'; // Slide up on mobile
                } else {
                    notification.style.transform = 'translateX(100%)'; // Slide out to right on desktop
                }
                notification.style.opacity = '0';
                
                setTimeout(() => {
                    if (notification.parentNode) {
                        document.body.removeChild(notification);
                    }
                }, 500);
            }, 4000);
        }
        
        // Global function to handle cart animations (simplified, no count)
        window.animateCartAddition = function(cartTotal = null, productName = 'Item') {
            try {
                // Update cart total only
                if (cartTotal) {
                    updateCartTotal(cartTotal);
                }
                
                // Animate cart icon
                animateCartIcon();
                
                // Show pulse effect
                showCartPulse();
                
                // Show success notification
                showCartSuccessNotification(`${productName} added to cart!`);
                
                // Add temporary professional glow effect to cart container
                const cartContainers = document.querySelectorAll('.cart-container, .mobile-cart-container, .cart-container-mobile');
                cartContainers.forEach(container => {
                    container.style.filter = 'drop-shadow(0 0 8px rgba(245, 158, 11, 0.4))';
                    container.style.transform = 'scale(1.02)';
                    container.style.transition = 'all 0.3s ease';
                    setTimeout(() => {
                        container.style.filter = 'none';
                        container.style.transform = 'scale(1)';
                    }, 600);
                });
            } catch (error) {
                console.error('Cart animation error:', error);
            }
        }
        
        // Initialize cart total on page load (no count needed)
        document.addEventListener('DOMContentLoaded', function() {
            // Load cart total from server instead of localStorage for accuracy
            loadCartTotalFromServer();
        });
        
        // Refresh cart total when page becomes visible (handles tab switching)
        document.addEventListener('visibilitychange', function() {
            if (!document.hidden) {
                // Page became visible, refresh cart total from server
                loadCartTotalFromServer();
            }
        });
        
        // Refresh cart total when user returns to the page
        window.addEventListener('focus', function() {
            loadCartTotalFromServer();
        });
        
        // Function to load cart total from server
        function loadCartTotalFromServer() {
            fetch('/cart/summary', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const total = data.total.toFixed(2);
                    updateCartTotal(total);
                    // Update localStorage for faster subsequent loads
                    localStorage.setItem('cartTotal', total);
                } else {
                    // Fallback to localStorage if server request fails
                    const savedTotal = localStorage.getItem('cartTotal') || '0.00';
                    updateCartTotal(savedTotal);
                }
            })
            .catch(error => {
                console.log('Cart total fetch failed, using localStorage fallback');
                // Fallback to localStorage if server request fails
                const savedTotal = localStorage.getItem('cartTotal') || '0.00';
                updateCartTotal(savedTotal);
            });
        }
        
        // Global function to refresh cart total (useful for debugging and manual refresh)
        window.refreshCartTotal = function() {
            console.log('🔄 Manually refreshing cart total from server...');
            loadCartTotalFromServer();
        };
        
        // Add-to-cart button loading / success states
        window.setAddToCartButtonState = function(button, state) {
            if (!button) return;
            const btn = button.closest('[data-add-to-cart], .btn-add-to-cart') || button;
            btn.classList.remove('btn-add-to-cart--loading', 'btn-add-to-cart--success');
            if (state === 'loading') {
                btn.disabled = true;
                btn.classList.add('btn-add-to-cart--loading');
            } else if (state === 'success') {
                btn.disabled = false;
                btn.classList.add('btn-add-to-cart--success');
                const textEl = btn.querySelector('.btn-add-to-cart__text');
                if (textEl) textEl.textContent = 'Added!';
                setTimeout(() => {
                    btn.classList.remove('btn-add-to-cart--success');
                    if (textEl) textEl.textContent = 'Add to Cart';
                }, 1500);
            } else {
                btn.disabled = false;
            }
        };

        // Global fallback addToCart function for AJAX compatibility
        window.addToCart = function(productId) {
            // Check if we have a category-specific function
            if (typeof window.addToCartFromCategory === 'function') {
                return window.addToCartFromCategory(productId);
            }
            
            // Check if we have a search-specific function
            if (typeof window.addToCartFromSearch === 'function') {
                return window.addToCartFromSearch(productId);
            }
            
            // Check if we have a home-specific function
            if (typeof window.addToCartFromHome === 'function') {
                return window.addToCartFromHome(productId);
            }
            
            const button = event?.target?.closest('[data-add-to-cart], .btn-add-to-cart, button') || event?.target;
            if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'loading');

            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'success');
                    window.animateCartAddition(data.cart_total, 'Product');
                } else {
                    if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
                    alert(data.message || 'Failed to add product to cart');
                }
            })
            .catch(error => {
                if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
                console.error('Error:', error);
                alert('Something went wrong. Please try again.');
            });
        };
        

        // Search Suggestions Functionality
        let searchTimeout;
        
        function initSearchSuggestions(inputId, suggestionsId, isMobile = false) {
            const searchInput = document.getElementById(inputId);
            const suggestionsDiv = document.getElementById(suggestionsId);
            
            if (!searchInput || !suggestionsDiv) return;
            
            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                
                clearTimeout(searchTimeout);
                
                if (query.length < 3) { // Increased minimum characters
                    suggestionsDiv.classList.add('hidden');
                    return;
                }
                
                searchTimeout = setTimeout(() => {
                    // Only log in development
                    // console.log('Fetching suggestions for:', query);
                    
                    fetch(`/api/search/suggestions?q=${encodeURIComponent(query)}`)
                        .then(response => {
                            // console.log('Search API response status:', response.status);
                            return response.json();
                        })
                        .then(data => {
                            // console.log('Search suggestions data:', data);
                            displaySuggestions(data, suggestionsDiv, isMobile);
                        })
                        .catch(error => {
                            console.error('Search suggestions error:', error);
                            suggestionsDiv.innerHTML = '<div class="p-4 text-red-400 text-center">Search error occurred</div>';
                            suggestionsDiv.classList.remove('hidden');
                        });
                }, 500); // Increased debounce time from 300ms to 500ms
            });
            
            // Hide suggestions when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !suggestionsDiv.contains(e.target)) {
                    suggestionsDiv.classList.add('hidden');
                }
            });
            
            // Show suggestions when focusing input (if there's content)
            searchInput.addEventListener('focus', function() {
                if (this.value.trim().length >= 2) {
                    suggestionsDiv.classList.remove('hidden');
                }
            });
        }
        
        function displaySuggestions(data, suggestionsDiv, isMobile) {
            console.log('Displaying suggestions:', data, 'in container:', suggestionsDiv);
            let html = '';
            
            // Add categories
            if (data.categories && data.categories.length > 0) {
                html += '<div class="p-3 border-b border-gray-200"><div class="text-xs font-semibold text-primary-400 mb-2">CATEGORIES</div>';
                data.categories.forEach(category => {
                    html += `<a href="/categories/${category.slug}" class="block py-2 px-3 text-gray-700 hover:bg-gray-900 hover:text-primary-400 transition-colors rounded">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-primary-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/>
                            </svg>
                            <span>${category.name}</span>
                        </div>
                    </a>`;
                });
                html += '</div>';
            }
            
            // Add products
            if (data.products && data.products.length > 0) {
                html += '<div class="p-3"><div class="text-xs font-semibold text-primary-400 mb-2">PRODUCTS</div>';
                data.products.forEach(product => {
                    // Generate proper product URL using category and product slugs
                    const categorySlug = product.category?.slug || product.category?.id || 'uncategorized';
                    const productSlug = product.slug || product.id;
                    const productUrl = `/${categorySlug}/${productSlug}`;
                    
                    // Check if product has promotion/sale price
                    const hasPromotion = product.is_on_sale && product.final_price && parseFloat(product.final_price) < parseFloat(product.price);
                    const originalPrice = parseFloat(product.price);
                    const finalPrice = product.final_price ? parseFloat(product.final_price) : originalPrice;
                    
                    let priceHtml = '';
                    if (hasPromotion) {
                        priceHtml = `
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-primary-400 font-semibold">AED ${finalPrice.toLocaleString()}</span>
                                <span class="text-xs text-gray-500 line-through">AED ${originalPrice.toLocaleString()}</span>
                                <span class="text-xs bg-red-500 text-white px-1 py-0.5 rounded">SALE</span>
                            </div>
                        `;
                    } else {
                        priceHtml = `<div class="text-xs text-primary-400">AED ${finalPrice.toLocaleString()}</div>`;
                    }
                    
                    html += `<a href="${productUrl}" class="block py-2 px-3 text-gray-700 hover:bg-gray-900 hover:text-primary-400 transition-colors rounded">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="font-medium">${product.name}</div>
                                ${priceHtml}
                            </div>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </a>`;
                });
                html += '</div>';
            }
            
            if (html) {
                suggestionsDiv.innerHTML = html;
                suggestionsDiv.classList.remove('hidden');
            } else {
                suggestionsDiv.innerHTML = '<div class="p-4 text-gray-600 text-center">No results found</div>';
                suggestionsDiv.classList.remove('hidden');
            }
        }
        
        // Initialize search suggestions for both desktop and mobile
        document.addEventListener('DOMContentLoaded', function() {
            initSearchSuggestions('search-input', 'search-suggestions', false);
            initSearchSuggestions('mobile-search-input', 'mobile-search-suggestions', true);
        });

        // Cart count feature removed - no initialization needed
        
        // Categories Dropdown Functionality
        const categoriesDropdownTrigger = document.getElementById('categories-dropdown-trigger');
        const categoriesDropdownMenu = document.getElementById('categories-dropdown-menu');
        const categoriesDropdownArrow = document.getElementById('categories-dropdown-arrow');
        
        if (categoriesDropdownTrigger && categoriesDropdownMenu) {
            // Toggle dropdown on click (for mobile and touch devices)
            categoriesDropdownTrigger.addEventListener('click', function(e) {
                e.preventDefault();
                const isVisible = !categoriesDropdownMenu.classList.contains('opacity-0');
                
                if (isVisible) {
                    // Hide dropdown
                    categoriesDropdownMenu.classList.add('opacity-0', 'invisible');
                    categoriesDropdownMenu.classList.remove('opacity-100', 'visible');
                    categoriesDropdownArrow.style.transform = 'rotate(0deg)';
                } else {
                    // Show dropdown
                    categoriesDropdownMenu.classList.remove('opacity-0', 'invisible');
                    categoriesDropdownMenu.classList.add('opacity-100', 'visible');
                    categoriesDropdownArrow.style.transform = 'rotate(180deg)';
                }
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!categoriesDropdownTrigger.contains(e.target) && !categoriesDropdownMenu.contains(e.target)) {
                    categoriesDropdownMenu.classList.add('opacity-0', 'invisible');
                    categoriesDropdownMenu.classList.remove('opacity-100', 'visible');
                    categoriesDropdownArrow.style.transform = 'rotate(0deg)';
                }
            });
            
            // Handle mobile touch events
            categoriesDropdownTrigger.addEventListener('touchstart', function(e) {
                e.preventDefault();
                categoriesDropdownTrigger.click();
            }, { passive: false });
        }

        // Back to Top Button Functionality
        const backToTopButton = document.getElementById('back-to-top');
        
        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.add('opacity-0', 'invisible');
                backToTopButton.classList.remove('opacity-100', 'visible');
            }
        });
        
        // Smooth scroll to top when clicked
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    <!-- Floating WhatsApp (bottom-right) -->
    <a href="https://wa.me/{{ config('products.whatsapp_number', '971581811579') }}"
       target="_blank"
       rel="noopener noreferrer"
       class="floating-whatsapp"
       aria-label="Chat on WhatsApp"
       title="Chat on WhatsApp {{ config('products.whatsapp_display', '+971 58 181 1579') }}">
        <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
        </svg>
    </a>

</body>
</html>

