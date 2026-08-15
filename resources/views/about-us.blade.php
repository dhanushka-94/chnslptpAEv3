@extends('layouts.app')

@section('title', 'About Us - CHANCE LAPTOPS | Brand New & Used Laptops, Repair & Service in Sri Lanka')
@section('description', 'Learn about CHANCE LAPTOPS - Sri Lanka\'s trusted destination for brand new and used laptops, professional laptop repair services, and all laptop accessories. Expert technicians, quality products, and commitment to excellence.')
@section('keywords', 'about Chance Laptops, laptop store Sri Lanka, brand new laptops, used laptops, laptop repair service, laptop accessories, warranty, delivery service, after sales service, Colombo, Sri Lanka')

@section('content')
<div class="info-page">
    <x-page-hero
        badge="About Our Company"
        title="About"
        highlight="CHANCE LAPTOPS"
        description="Serving Sri Lanka's computer needs since 2008 — quality products, expert repair, and customer service you can trust."
    >
        <x-slot:icon>
            <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </x-slot:icon>
    </x-page-hero>

<!-- Vision & Mission Section -->
<section class="info-section info-section--alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Vision -->
            <div class="info-card">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-red-400 mb-1">අපේ දැක්ම</h2>
                        <h3 class="text-xl font-semibold text-slate-900">Our Vision</h3>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <p class="text-gray-700 text-lg leading-relaxed">ලංකාවේ සියලු දෙනා හට පරිගණකයක් ලබා දීම</p>
                    <p class="text-gray-600 leading-relaxed">Providing a computer to everyone in Sri Lanka</p>
                </div>
            </div>

            <!-- Mission -->
            <div class="info-card">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-red-500 mb-1">අපේ මෙහෙවර</h2>
                        <h3 class="text-xl font-semibold text-slate-900">Our Mission</h3>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <p class="text-gray-700 text-lg leading-relaxed">ගුණාත්මකභාවයෙන් යුතු පරිගණක හා පරිගණක උපාංග අලවිය හා අලෙවියෙන් පසු විශිෂ්ඨ සේවාවක් ලබාදීම</p>
                    <p class="text-gray-600 leading-relaxed">Providing excellent after sales and sales quality computer and computer peripherals</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="info-section info-section--alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="info-section__head">
            <h2 class="info-section__title">Why choose CHANCE LAPTOPS</h2>
            <p class="info-section__subtitle">Trusted expertise and exceptional service that sets us apart</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- 3000+ Products -->
            <div class="info-stat-card">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-red-500 mb-2">3000+</h3>
                <h4 class="text-lg font-semibold text-gray-900 mb-2">Products Available</h4>
                <p class="text-gray-600 text-sm">Trusted expertise in computer sales and service</p>
            </div>

            <!-- 10,000+ Customers -->
            <div class="info-stat-card">
                <div class="w-16 h-16 bg-green-500/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-red-500 mb-2">10,000+</h3>
                <h4 class="text-lg font-semibold text-gray-900 mb-2">Customers</h4>
                <p class="text-gray-600 text-sm">Serving satisfied customers across Sri Lanka</p>
            </div>

            <!-- Quality Products -->
            <div class="info-stat-card">
                <div class="w-16 h-16 bg-purple-500/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Quality Products</h3>
                <p class="text-gray-600 text-sm">Genuine products with full warranty coverage</p>
            </div>

            <!-- Expert Support -->
            <div class="info-stat-card">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Expert Support</h3>
                <p class="text-gray-600 text-sm">Professional after-sales service and support</p>
            </div>
        </div>
    </div>
</section>

<!-- Warranty Section -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">වගකීම් සහතිකය හා අදාළ කොන්දේසි</h2>
            <h3 class="text-2xl font-semibold text-gray-600 mb-4">Warranty Certificate and Related Terms</h3>
            <p class="text-lg text-gray-600">Comprehensive warranty coverage with clear terms and conditions for your peace of mind.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <!-- Bill Required -->
            <div class="bg-white border border-red-500/30 rounded-xl p-6">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-red-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-red-400">Bill Required</h3>
                </div>
                <p class="text-gray-700 text-sm mb-2">වගකීම ලබාදීම සඳහා බිල්පත අනිවාර්යයෙන් ඉදිරිපත් කළ යුතුය</p>
                <p class="text-gray-600 text-sm">The bill must be submitted to provide warranty coverage</p>
            </div>

            <!-- Manufacturing Defects Only -->
            <div class="bg-white border border-red-500/30 rounded-xl p-6">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-red-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.728-.833-2.498 0L4.316 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-red-400">Manufacturing Defects Only</h3>
                </div>
                <p class="text-gray-700 text-sm mb-2">නිෂ්පාදිත දෝෂ සඳහා පමණක් වගකීම හිමි වේ</p>
                <p class="text-gray-600 text-sm">Warranty covers manufacturing defects only</p>
            </div>

            <!-- Processing Time -->
            <div class="bg-white border border-red-500/30 rounded-xl p-6">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-red-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-red-400">Processing Time</h3>
                </div>
                <p class="text-gray-700 text-sm mb-2">Brand new අයිතම සඳහා warranty ලබා ගැනීමේදී දින 10 ත් දින 30ත් අතර කාලයක් ගතවනු ඇත</p>
                <p class="text-gray-600 text-sm">Brand new items: 10-30 days processing time</p>
            </div>
        </div>

        <!-- Warranty Periods -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white border border-gray-200 rounded-xl p-6 text-center">
                <h3 class="text-2xl font-bold text-red-500 mb-2">1 Year</h3>
                <p class="text-gray-600">350 days</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 text-center">
                <h3 class="text-2xl font-bold text-red-500 mb-2">2 Years</h3>
                <p class="text-gray-600">700 days</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6 text-center">
                <h3 class="text-2xl font-bold text-red-500 mb-2">3 Years</h3>
                <p class="text-gray-600">1050 days</p>
            </div>
        </div>

        <!-- Warranty Exclusions -->
        <div class="bg-white border border-gray-200 rounded-xl p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Warranty Exclusions</h3>
            <p class="text-gray-700 mb-6">This warranty certificate does not cover the following types of damage:</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        <span class="text-gray-700 text-sm">Burn marks (පිළිස්සුණු ලකුණු)</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        <span class="text-gray-700 text-sm">Physical damage marks (පෑස්සූ ලකුණු)</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        <span class="text-gray-700 text-sm">Rust damage (මලකඩ කෑම)</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        <span class="text-gray-700 text-sm">Scratch marks (සීරීම් ලකුණු)</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        <span class="text-gray-700 text-sm">Lightning damage (අකුණු වලින් සිදුවී ඇති හානි)</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        <span class="text-gray-700 text-sm">Liquid spills (ආහාර හෝ බීම වර්ග හැලීමෙන් සිදුවන හානි)</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        <span class="text-gray-700 text-sm">User error damage (පරිගණක දැනුමක් නැති අය සිදුකරන වැරදි)</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                        <span class="text-gray-700 text-sm">Natural disasters (ස්වාභාවික විපත් වැනි හානි)</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 p-4 bg-red-500/10 border border-red-500/30 rounded-lg">
                <p class="text-red-400 font-medium text-sm">
                    <strong>Important:</strong> If the warranty label is deleted or damaged, the warranty becomes void. No refunds will be given for purchased items.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- After Sales Service Section -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">අලෙවියෙන් පසු සේවාව</h2>
            <h3 class="text-2xl font-semibold text-gray-600 mb-4">After Sales Service</h3>
            <p class="text-lg text-gray-600">Comprehensive after-sales support with multiple service options for your convenience.</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- In-Store Service -->
            <div class="info-card">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">In-Store Service</h3>
                </div>
                
                <div class="space-y-4">
                    <p class="text-gray-700">ඔබ shop එකට පැමිණිය හැකි දුරකින් නම්, එය අප වෙත රැගෙන එමින් සේවාව ගත හැක</p>
                    <p class="text-gray-600 text-sm">If you are within distance to visit the shop, bring your device for service</p>
                    
                    <div class="mt-6 p-4 bg-red-500/10 border border-red-500/30 rounded-lg">
                        <p class="text-red-400 font-medium text-sm">
                            Warranty machines arriving after 4 PM cannot be serviced same day
                        </p>
                        <p class="text-orange-300 text-xs mt-1">
                            සවස 4න් පසු පැමිණෙන warranty machine සඳහා එදිනම warranty ලබා ගැනීමට නොහැකි
                        </p>
                    </div>
                </div>
            </div>

            <!-- Courier Service -->
            <div class="info-card">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-green-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Courier Service</h3>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-gray-100 rounded-lg p-4">
                        <h4 class="text-gray-900 font-medium mb-2">Send to:</h4>
                        <div class="text-gray-700 text-sm space-y-1">
                            <p><strong>Chance Laptops</strong></p>
                            <p class="text-gray-600">Contact us before sending courier items:</p>
                            <div class="mt-3 space-y-1">
                                <p>076 444 222 1</p>
                                <p>011 296 066 0</p>
                                <p>WhatsApp: 0764442221</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-4 bg-red-500/10 border border-red-500/30 rounded-lg">
                        <p class="text-red-400 text-sm mb-2">බිල්පත සහ warranty අයිතමය එවිය යුතුය. Courier Charge ඔබ විසින් දැරිය යුතුය</p>
                        <p class="text-red-300 text-xs">Include bill and warranty item. Courier charges borne by customer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
