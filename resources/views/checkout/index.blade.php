@extends('layouts.app')

@section('title', 'Checkout - CHANCE LAPTOPS')
@section('description', 'Complete your purchase at Chance Laptops with secure checkout and multiple payment options.')

@section('content')
<div class="min-h-screen bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Checkout</h1>
            <p class="text-gray-600">Complete your order with secure payment</p>
                </div>
                
                @guest
                <div class="text-right">
                    <p class="text-gray-600 text-sm mb-2">Returning customer?</p>
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-black font-medium rounded-lg transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Login
                    </a>
                </div>
                @else
                <div class="text-right">
                    <p class="text-gray-600 text-sm">Welcome back,</p>
                    <p class="text-gray-900 font-medium">{{ Auth::user()->name }}</p>
                </div>
                @endguest
            </div>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-900/50 border border-red-500 text-red-200 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('quotation.generate') }}" method="POST" id="checkout-form" enctype="multipart/form-data" novalidate>
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Checkout Form -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Customer Information -->
                    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Information</h3>
                        
                        <div class="space-y-6">
                            <!-- Name Fields Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        First Name *
                                        <span class="text-red-400 text-xs">(Required)</span>
                                    </label>
                                <input type="text" 
                                           id="first_name" 
                                           name="first_name" 
                                           value="{{ old('first_name', Auth::user() ? explode(' ', Auth::user()->name)[0] : '') }}" 
                                       required
                                           placeholder="Enter your first name"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Last Name *
                                        <span class="text-red-400 text-xs">(Required)</span>
                                    </label>
                                    <input type="text" 
                                           id="last_name" 
                                           name="last_name" 
                                           value="{{ old('last_name', Auth::user() && str_contains(Auth::user()->name, ' ') ? substr(Auth::user()->name, strpos(Auth::user()->name, ' ') + 1) : '') }}" 
                                       required
                                           placeholder="Enter your last name"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                                </div>
                            </div>
                            
                            <!-- Contact Information Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                        Phone Number *
                                        <span class="text-red-400 text-xs">(Required)</span>
                                    </label>
                                <input type="tel" 
                                       id="customer_phone" 
                                       name="customer_phone" 
                                       value="{{ old('customer_phone', Auth::user()->phone ?? '') }}" 
                                       required
                                           placeholder="Enter your phone number (e.g., 0771234567)"
                                           pattern="^0[1-9][0-9]{8}$"
                                           title="Please enter a valid United Arab Emiratesn phone number (10 digits starting with 0)"
                                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                                    <div class="flex items-center mt-2 text-xs text-gray-600">
                                        <svg class="w-4 h-4 mr-1 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        For SMS notifications and delivery updates
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address *
                                        <span class="text-red-400 text-xs">(Required)</span>
                                    </label>
                                    <input type="email" 
                                           id="customer_email" 
                                           name="customer_email" 
                                           value="{{ old('customer_email', Auth::user()->email ?? '') }}" 
                                           required
                                           placeholder="Enter your email address"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                                    <div class="flex items-center mt-2 text-xs text-gray-600">
                                        <svg class="w-4 h-4 mr-1 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        We'll send order confirmations and updates
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Billing Address -->
                    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Billing Address</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label for="billing_address_line_1" class="block text-sm font-medium text-gray-700 mb-2">
                                    Address Line 1 *
                                    <span class="text-red-400 text-xs">(Required)</span>
                                </label>
                                <input type="text" 
                                       id="billing_address_line_1" 
                                       name="billing_address_line_1" 
                                       value="{{ old('billing_address_line_1') }}" 
                                       required
                                       placeholder="Enter your street address, house number"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div class="md:col-span-2">
                                <label for="billing_address_line_2" class="block text-sm font-medium text-gray-700 mb-2">
                                    Address Line 2
                                    <span class="text-gray-500 text-xs">(Optional - apartment, suite, etc.)</span>
                                </label>
                                <input type="text" 
                                       id="billing_address_line_2" 
                                       name="billing_address_line_2" 
                                       value="{{ old('billing_address_line_2') }}"
                                       placeholder="Apartment, suite, building (optional)"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="billing_city" class="block text-sm font-medium text-gray-700 mb-2">
                                    City *
                                    <span class="text-red-400 text-xs">(Required)</span>
                                </label>
                                <input type="text" 
                                       id="billing_city" 
                                       name="billing_city" 
                                       value="{{ old('billing_city') }}" 
                                       required
                                       placeholder="Enter your city"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="billing_state" class="block text-sm font-medium text-gray-700 mb-2">
                                    State/Province
                                    <span class="text-gray-500 text-xs">(Optional)</span>
                                </label>
                                <input type="text" 
                                       id="billing_state" 
                                       name="billing_state" 
                                       value="{{ old('billing_state') }}" 
                                       placeholder="State or province (optional)"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="billing_postal_code" class="block text-sm font-medium text-gray-700 mb-2">
                                    Postal Code
                                    <span class="text-gray-500 text-xs">(Optional)</span>
                                </label>
                                <input type="text" 
                                       id="billing_postal_code" 
                                       name="billing_postal_code" 
                                       value="{{ old('billing_postal_code') }}" 
                                       placeholder="Postal code (optional)"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="billing_country" class="block text-sm font-medium text-gray-700 mb-2">
                                    Country
                                    <span class="text-gray-500 text-xs">(Optional)</span>
                                </label>
                                <input type="text" 
                                       id="billing_country" 
                                       name="billing_country" 
                                       value="{{ old('billing_country', 'United Arab Emirates') }}"
                                       placeholder="Country (optional)"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Shipping Address</h3>
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       id="different_shipping_address" 
                                       class="h-4 w-4 text-[blue-500] focus:ring-[blue-500] border-gray-300 rounded bg-white">
                                <span class="ml-2 text-sm text-gray-700">📦 Deliver to different address</span>
                            </label>
                        </div>
                        
                        <!-- Default Message - Compact -->
                        <div id="same-address-message" class="flex items-center justify-center py-3 border border-dashed border-gray-300 rounded-lg bg-gray-50/30">
                            <svg class="w-5 h-5 text-gray-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="text-center">
                                <p class="text-gray-600 text-sm">📍 Items will be delivered to your billing address</p>
                                <p class="text-gray-500 text-xs">Check "Deliver to different address" above if needed</p>
                            </div>
                        </div>
                        
                        <div id="shipping-address-fields" class="grid grid-cols-1 md:grid-cols-2 gap-4" style="display: none;">
                            <div class="md:col-span-2">
                                <label for="shipping_address_line_1" class="block text-sm font-medium text-gray-700 mb-2">
                                    Address Line 1
                                    <span class="text-gray-500 text-xs">(Required only if different from billing)</span>
                                </label>
                                <input type="text" 
                                       id="shipping_address_line_1" 
                                       name="shipping_address_line_1" 
                                       value="{{ old('shipping_address_line_1') }}" 
                                       placeholder="Enter delivery street address, house number"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div class="md:col-span-2">
                                <label for="shipping_address_line_2" class="block text-sm font-medium text-gray-700 mb-2">
                                    Address Line 2
                                    <span class="text-gray-500 text-xs">(Optional - apartment, suite, etc.)</span>
                                </label>
                                <input type="text" 
                                       id="shipping_address_line_2" 
                                       name="shipping_address_line_2" 
                                       value="{{ old('shipping_address_line_2') }}"
                                       placeholder="Apartment, suite, building (optional)"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="shipping_city" class="block text-sm font-medium text-gray-700 mb-2">
                                    City
                                    <span class="text-gray-500 text-xs">(Required only if different from billing)</span>
                                </label>
                                <input type="text" 
                                       id="shipping_city" 
                                       name="shipping_city" 
                                       value="{{ old('shipping_city') }}" 
                                       placeholder="Enter delivery city"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="shipping_state" class="block text-sm font-medium text-gray-700 mb-2">
                                    State/Province
                                    <span class="text-gray-500 text-xs">(Optional)</span>
                                </label>
                                <input type="text" 
                                       id="shipping_state" 
                                       name="shipping_state" 
                                       value="{{ old('shipping_state') }}" 
                                       placeholder="State or province (optional)"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="shipping_postal_code" class="block text-sm font-medium text-gray-700 mb-2">
                                    Postal Code
                                    <span class="text-gray-500 text-xs">(Optional)</span>
                                </label>
                                <input type="text" 
                                       id="shipping_postal_code" 
                                       name="shipping_postal_code" 
                                       value="{{ old('shipping_postal_code') }}" 
                                       placeholder="Postal code (optional)"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="shipping_country" class="block text-sm font-medium text-gray-700 mb-2">
                                    Country
                                    <span class="text-gray-500 text-xs">(Optional)</span>
                                </label>
                                <input type="text" 
                                       id="shipping_country" 
                                       name="shipping_country" 
                                       value="{{ old('shipping_country', 'United Arab Emirates') }}"
                                       placeholder="Country (optional)"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">
                            </div>
                        </div>
                    </div>

                    <!-- Shipping/Delivery Information -->
                    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-primary-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900">Shipping/Delivery Information</h3>
                        </div>
                        
                        <div class="bg-red-900/20 border border-red-700/50 rounded-lg p-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <h4 class="text-red-400 font-medium text-sm mb-2">Important Notice - Delivery Charges</h4>
                                    <p class="text-red-300 text-sm mb-3">
                                        Kindly note that delivery charges are due at the time of parcel receipt.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Simple Checkout Options -->
                    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Choose an Option</h3>
                        
                        <!-- Simple Two Button Choice -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <!-- Get Quote Button -->
                            <label class="block cursor-pointer checkout-option" data-type="quotation">
                                <input type="radio" 
                                       name="checkout_type" 
                                       value="quotation"
                                       class="sr-only checkout-radio">
                                <div class="p-6 border-2 border-red-500 bg-red-500/10 rounded-lg hover:bg-red-500/20 transition-all text-center option-card">
                                    <svg class="w-8 h-8 text-red-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Get Quote</h4>
                                    <p class="text-gray-700 text-sm">Download PDF quotation</p>
                                </div>
                            </label>

                            <!-- Buy Now Button -->
                            <label class="block cursor-pointer checkout-option active" data-type="payment">
                                <input type="radio" 
                                       name="checkout_type" 
                                       value="payment"
                                       checked
                                       class="sr-only checkout-radio">
                                <div class="p-6 border-2 border-green-500 bg-green-500/10 rounded-lg hover:bg-green-500/20 transition-all text-center option-card">
                                    <svg class="w-8 h-8 text-green-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Buy Now</h4>
                                    <p class="text-gray-700 text-sm">Complete your order</p>
                                </div>
                            </label>
                        </div>
                        
                        <!-- Payment Methods Section (shown when payment is selected) -->
                        <div id="payment-methods-section" class="space-y-4">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Payment Methods</h4>

                            <div class="rounded-lg border border-amber-200 bg-amber-50 p-4 mb-4 text-sm text-amber-900">
                                <strong>Tamara</strong>, <strong>Tabby</strong>, and <strong>Bank Transfer</strong> are coming soon.
                                Please contact Chance Laptops to complete your order, or request a quotation.
                            </div>

                            <!-- Tamara — Coming Soon -->
                            <div class="flex items-center p-4 border-2 border-dashed border-gray-300 bg-gray-50 rounded-lg opacity-80 cursor-not-allowed relative">
                                <input type="radio"
                                       name="payment_method_display"
                                       value="tamara"
                                       disabled
                                       class="h-4 w-4 text-gray-400 border-gray-300 bg-white">
                                <div class="ml-3 flex-1">
                                    <div class="flex items-center space-x-2 flex-wrap gap-1">
                                        <div class="text-sm font-medium text-gray-700">Tamara</div>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 uppercase">
                                            Coming Soon
                                        </span>
                                    </div>
                                    <div class="text-sm text-gray-500">Split payments — launching soon in the UAE</div>
                                </div>
                                <img src="{{ asset('images/tamara-logo.png') }}" alt="Tamara" class="h-8 w-auto opacity-90">
                            </div>

                            <!-- Tabby — Coming Soon -->
                            <div class="flex items-center p-4 border-2 border-dashed border-gray-300 bg-gray-50 rounded-lg opacity-80 cursor-not-allowed relative mt-3">
                                <input type="radio"
                                       name="payment_method_display"
                                       value="tabby"
                                       disabled
                                       class="h-4 w-4 text-gray-400 border-gray-300 bg-white">
                                <div class="ml-3 flex-1">
                                    <div class="flex items-center space-x-2 flex-wrap gap-1">
                                        <div class="text-sm font-medium text-gray-700">Tabby</div>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 uppercase">
                                            Coming Soon
                                        </span>
                                    </div>
                                    <div class="text-sm text-gray-500">Buy now, pay later — launching soon in the UAE</div>
                                </div>
                                <img src="{{ asset('images/tabby-logo.png') }}" alt="Tabby" class="h-8 w-auto opacity-90">
                            </div>

                            <!-- Bank Transfer — Coming Soon -->
                            <div class="flex items-center p-4 border-2 border-dashed border-gray-300 bg-gray-50 rounded-lg opacity-80 cursor-not-allowed relative mt-3">
                                <input type="radio"
                                       name="payment_method"
                                       value="bank_transfer"
                                       disabled
                                       class="h-4 w-4 text-gray-400 border-gray-300 bg-white">
                                <div class="ml-3 flex-1">
                                    <div class="flex items-center space-x-2 flex-wrap gap-1">
                                        <div class="text-sm font-medium text-gray-700">Bank Transfer</div>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 uppercase">
                                            Coming Soon
                                        </span>
                                    </div>
                                    <div class="text-sm text-gray-500">Account details will be published when this option is available</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Notes -->
                    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Order Notes (Optional)</h3>
                        <textarea id="notes" 
                                  name="notes" 
                                  rows="3" 
                                  placeholder="Any special instructions for your order..."
                                  class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[blue-500] focus:border-transparent">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6 sticky top-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Order Summary</h3>
                        
                        <!-- Cart Items -->
                        <div class="space-y-4 mb-6">
                            @foreach($cartProducts as $cartProduct)
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gray-50 rounded-lg overflow-hidden">
                                        <img src="{{ $cartProduct['product']->main_image }}" 
                                             alt="{{ $cartProduct['product']->name }}" 
                                             loading="lazy"
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-white truncate">{{ $cartProduct['product']->name }}</p>
                                        <p class="text-sm text-gray-600">Qty: {{ $cartProduct['cart_item']->quantity }}</p>
                                    </div>
                                    <p class="text-sm font-medium text-white">AED {{ number_format($cartProduct['line_total'], 2) }}</p>
                                </div>
                            @endforeach
                        </div>

                        <!-- Price Breakdown -->
                        <div class="border-t border-gray-300 pt-4 space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="text-white">AED {{ number_format($originalSubtotal > 0 ? $originalSubtotal : $subtotal, 2) }}</span>
                            </div>
                            
                            <!-- Discount Section -->
                            @if($totalDiscount > 0)
                            <div class="flex justify-between text-sm">
                                <span class="text-green-400">
                                    Discount
                                    <span class="text-xs text-gray-500 block">You save</span>
                                </span>
                                <span class="text-green-400">-AED {{ number_format($totalDiscount, 2) }}</span>
                            </div>
                            
                            <!-- Subtotal after discount -->
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal (after discount)</span>
                                <span class="text-white">AED {{ number_format($subtotal, 2) }}</span>
                            </div>
                            @endif
                            
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Shipping</span>
                                <span class="text-red-400 text-xs">
                                    Pay on delivery
                                </span>
                            </div>
                            
                            @if($taxAmount > 0)
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Tax</span>
                                    <span class="text-white">AED {{ number_format($taxAmount, 2) }}</span>
                                </div>
                            @endif
                            
                            <div class="border-t border-gray-300 pt-2">
                                <div class="flex justify-between">
                                    <span class="text-lg font-medium text-gray-900">Order Total</span>
                                    <span class="text-lg font-bold text-[blue-500] order-total">AED {{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Submit -->
                        <div class="mt-6 space-y-4">
                            <label class="flex items-start">
                                <input type="checkbox" 
                                       name="terms" 
                                       required
                                       class="h-4 w-4 text-[blue-500] focus:ring-[blue-500] border-gray-300 rounded bg-white mt-0.5">
                                <span class="ml-3 text-sm text-gray-700">
                                    I agree to the <a href="{{ route('terms-of-service') }}" target="_blank" class="text-[blue-500] hover:text-[blue-600] underline">Terms of Service</a> and 
                                    <a href="{{ route('privacy-policy') }}" target="_blank" class="text-[blue-500] hover:text-[blue-600] underline">Privacy Policy</a>
                                </span>
                            </label>
                            
                            <button type="submit" 
                                    id="submit-button"
                                    class="w-full py-4 px-6 border border-transparent text-lg font-medium rounded-lg text-black bg-gradient-to-r from-[blue-500] to-[blue-400] hover:from-[blue-600] hover:to-[blue-500] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[blue-500] transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="submit-icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                <span id="submit-text">Buy Now</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.checkout-option.active .option-card {
    border-width: 3px !important;
    transform: scale(1.02);
}

.checkout-option:hover .option-card {
    transform: scale(1.01);
}
</style>

<script>
console.log('Checkout JavaScript loaded - script is running');
console.log('Current URL:', window.location.href);
console.log('Document ready state:', document.readyState);

// Check CSRF token
const csrfToken = document.querySelector('meta[name="csrf-token"]');
console.log('CSRF token found:', csrfToken ? 'Yes' : 'No');
if (csrfToken) {
    console.log('CSRF token value:', csrfToken.getAttribute('content'));
}

// Test if basic JavaScript is working
try {
    console.log('JavaScript test: Basic functionality working');
    window.checkoutDebug = true;
    
    // Add a simple click test
    document.body.addEventListener('click', function(e) {
        console.log('Body clicked at:', e.target.tagName, e.target.className);
    });
    
} catch (error) {
    console.error('JavaScript error in basic test:', error);
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded - starting checkout initialization');
    
    // Check if form exists
    const checkoutForm = document.getElementById('checkout-form');
    console.log('Checkout form found:', checkoutForm ? 'Yes' : 'No');

    // Checkout type handling
    const checkoutOptions = document.querySelectorAll('.checkout-option');
    const checkoutTypeRadios = document.querySelectorAll('input[name="checkout_type"]');
    const paymentMethodsSection = document.getElementById('payment-methods-section');
    const submitButton = document.getElementById('submit-button');
    const submitText = document.getElementById('submit-text');
    const submitIcon = document.getElementById('submit-icon');

    function updateCheckoutType() {
        const selectedType = document.querySelector('input[name="checkout_type"]:checked');
        console.log('🔄 Updating checkout type. Selected:', selectedType ? selectedType.value : 'none');
        
        if (selectedType && selectedType.value === 'quotation') {
            // Quotation mode
            console.log('✅ Switching to QUOTATION mode');
            if (paymentMethodsSection) paymentMethodsSection.style.display = 'none';
            if (checkoutForm) {
                checkoutForm.action = '{{ route("quotation.generate") }}';
                console.log('📝 Form action set to:', checkoutForm.action);
            }
            
            // Update button for quotation
            if (submitButton) {
                submitButton.className = 'w-full py-4 px-6 border border-transparent text-lg font-medium rounded-lg text-white bg-gradient-to-r from-red-600 to-indigo-600 hover:from-red-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2';
            }
            if (submitText) submitText.textContent = 'Download Quote';
            if (submitIcon) {
                submitIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>';
            }
        } else {
            // Payment mode
            console.log('💳 Switching to PAYMENT mode');
            if (paymentMethodsSection) paymentMethodsSection.style.display = 'block';
            if (checkoutForm) {
                checkoutForm.action = '{{ route("checkout.process") }}';
                console.log('📝 Form action set to:', checkoutForm.action);
            }
            
            // Update button for payment
            if (submitButton) {
                submitButton.className = 'w-full py-4 px-6 border border-transparent text-lg font-medium rounded-lg text-black bg-gradient-to-r from-[blue-500] to-[blue-400] hover:from-[blue-600] hover:to-[blue-500] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[blue-500] transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2';
            }
            if (submitText) submitText.textContent = 'Buy Now';
            if (submitIcon) {
                submitIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>';
            }
        }
    }

    // Initialize checkout type
    updateCheckoutType();

    // Add click event listeners to option cards
    checkoutOptions.forEach(option => {
        option.addEventListener('click', function() {
            console.log('Checkout option clicked:', this.dataset.type);
            const radio = this.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
                updateCheckoutType();
            }
        });
    });

    // Add event listeners for checkout type change
    checkoutTypeRadios.forEach(radio => {
        radio.addEventListener('change', updateCheckoutType);
    });
    
    // Add form submission logging
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
            console.log('🚀 Form submission started');
            console.log('Form data being submitted:', new FormData(checkoutForm));
            console.log('Selected payment method:', document.querySelector('input[name="payment_method"]:checked')?.value);
        });
    }
    
    // Transaction fee calculation and display
    const baseOrderTotal = {{ $total }};
    
    function formatCurrency(amount) {
        return 'AED ' + parseFloat(amount).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }
    
    function updatePaymentFees() {
        const orderTotalElement = document.querySelector('.order-total');
        if (orderTotalElement) {
            orderTotalElement.textContent = formatCurrency(baseOrderTotal);
        }
    }
    
    // Listen for payment method changes
    const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
    paymentRadios.forEach(radio => {
        radio.addEventListener('change', updatePaymentFees);
    });
    
    // Initialize on page load
    updatePaymentFees();
    
    // Different shipping address functionality
    const differentShippingCheckbox = document.getElementById('different_shipping_address');
    const shippingFields = document.getElementById('shipping-address-fields');
    const sameAddressMessage = document.getElementById('same-address-message');
    
    console.log('Different shipping checkbox found:', differentShippingCheckbox ? 'Yes' : 'No');
    console.log('Shipping fields found:', shippingFields ? 'Yes' : 'No');
    
    differentShippingCheckbox.addEventListener('change', function() {
        console.log('Different shipping checkbox changed:', this.checked);
        
        if (this.checked) {
            // Show shipping address fields
            console.log('Showing shipping address fields');
            sameAddressMessage.style.display = 'none';
            shippingFields.style.display = 'grid';
            // Update labels to show fields are required when different from billing
            const shippingLine1Label = document.querySelector('label[for="shipping_address_line_1"]');
            const shippingCityLabel = document.querySelector('label[for="shipping_city"]');
            
            if (shippingLine1Label) {
                shippingLine1Label.innerHTML = 'Address Line 1 * <span class="text-red-400 text-xs">(Required for different shipping address)</span>';
            }
            if (shippingCityLabel) {
                shippingCityLabel.innerHTML = 'City * <span class="text-red-400 text-xs">(Required for different shipping address)</span>';
            }
            
            // Add required attribute to key shipping fields when user wants different shipping address
            const shippingAddressLine1 = document.getElementById('shipping_address_line_1');
            const shippingCity = document.getElementById('shipping_city');
            
            if (shippingAddressLine1) {
                shippingAddressLine1.setAttribute('required', '');
                console.log('Set shipping address line 1 as required');
            }
            if (shippingCity) {
                shippingCity.setAttribute('required', '');
                console.log('Set shipping city as required');
            }
        } else {
            console.log('Hiding shipping address fields - using billing address');
            
            // Hide shipping fields and show default message
            shippingFields.style.display = 'none';
            sameAddressMessage.style.display = 'block';
            
            // Remove required attributes from shipping fields
            const shippingAddressLine1 = document.getElementById('shipping_address_line_1');
            const shippingCity = document.getElementById('shipping_city');
            
            if (shippingAddressLine1) {
                shippingAddressLine1.removeAttribute('required');
                shippingAddressLine1.value = '';
            }
            if (shippingCity) {
                shippingCity.removeAttribute('required');
                shippingCity.value = '';
            }
            
            // Clear all shipping fields when not using different address
            document.getElementById('shipping_address_line_2').value = '';
            document.getElementById('shipping_state').value = '';
            document.getElementById('shipping_postal_code').value = '';
            document.getElementById('shipping_country').value = 'United Arab Emirates';
        }
    });

    // Shipping address toggle is now handled above

    // Transfer slip upload validation
    const transferSlipInput = document.getElementById('transfer_slip');
    const uploadStatus = document.getElementById('upload-status');
    
    if (transferSlipInput) {
        transferSlipInput.addEventListener('change', function() {
            const file = this.files[0];
            
            if (file) {
                const maxSize = 2 * 1024 * 1024; // 2MB in bytes
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
                
                // Clear previous status
                uploadStatus.classList.add('hidden');
                uploadStatus.innerHTML = '';
                
                // Validate file size
                if (file.size > maxSize) {
                    uploadStatus.innerHTML = `
                        <div class="flex items-center space-x-2 p-3 bg-red-900/20 border border-red-700/50 rounded-lg">
                            <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <p class="text-red-400 text-sm font-medium">File too large!</p>
                                <p class="text-red-300 text-xs">Maximum size allowed is 2MB. Your file is ${(file.size / 1024 / 1024).toFixed(2)}MB.</p>
                            </div>
                        </div>
                    `;
                    uploadStatus.classList.remove('hidden');
                    this.value = '';
                    return;
                }
                
                // Validate file type
                if (!allowedTypes.includes(file.type)) {
                    uploadStatus.innerHTML = `
                        <div class="flex items-center space-x-2 p-3 bg-red-900/20 border border-red-700/50 rounded-lg">
                            <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <p class="text-red-400 text-sm font-medium">Invalid file type!</p>
                                <p class="text-red-300 text-xs">Only JPG, PNG, and PDF files are allowed.</p>
                            </div>
                        </div>
                    `;
                    uploadStatus.classList.remove('hidden');
                    this.value = '';
                    return;
                }
                
                // Show success status
                const fileSize = (file.size / 1024 / 1024).toFixed(2);
                const fileType = file.type.split('/')[1].toUpperCase();
                uploadStatus.innerHTML = `
                    <div class="flex items-center space-x-2 p-3 bg-green-900/20 border border-green-700/50 rounded-lg">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        <div>
                            <p class="text-green-400 text-sm font-medium">✅ File uploaded successfully!</p>
                            <p class="text-green-300 text-xs">${file.name} (${fileSize}MB, ${fileType})</p>
                        </div>
                    </div>
                `;
                uploadStatus.classList.remove('hidden');
                
                console.log('Transfer slip uploaded:', {
                    name: file.name,
                    size: fileSize + 'MB',
                    type: file.type
                });
            }
        });
    }

    // United Arab Emiratesn phone number validation
    const phoneInput = document.getElementById('customer_phone');
    console.log('Phone input found:', phoneInput ? 'Yes' : 'No');
    
    if (!phoneInput) {
        console.error('Phone input not found!');
        return;
    }
    
    const phonePattern = /^0[1-9][0-9]{8}$/;
    
    function validatePhoneNumber() {
        const phoneValue = phoneInput.value.trim();
        const isValid = phonePattern.test(phoneValue);
        
        if (phoneValue.length > 0 && !isValid) {
            phoneInput.setCustomValidity('Please enter a valid United Arab Emiratesn phone number (10 digits starting with 0, e.g., 0771234567)');
            phoneInput.style.borderColor = '#ef4444';
        } else {
            phoneInput.setCustomValidity('');
            phoneInput.style.borderColor = '#374151';
        }
    }
    
    phoneInput.addEventListener('input', validatePhoneNumber);
    phoneInput.addEventListener('blur', validatePhoneNumber);
    
    // Format phone number as user types
    phoneInput.addEventListener('input', function() {
        // Remove any non-digit characters except for the initial input
        let value = this.value.replace(/[^\d]/g, '');
        
        // Ensure it starts with 0 and limit to 10 digits
        if (value.length > 0 && value[0] !== '0') {
            value = '0' + value;
        }
        if (value.length > 10) {
            value = value.substring(0, 10);
        }
        
        this.value = value;
    });

    // Debug form submission
    console.log('Setting up form submission handler...');
    
    if (!checkoutForm) {
        console.error('Checkout form not found! Cannot set up form submission handler.');
        return;
    }
    
    const submitButton = checkoutForm.querySelector('button[type="submit"]');
    console.log('Submit button found:', submitButton ? 'Yes' : 'No');
    
    if (!submitButton) {
        console.error('Submit button not found!');
        return;
    }
    
    // Add click event to submit button for debugging
    submitButton.addEventListener('click', function(e) {
        console.log('Submit button clicked!');
        console.log('Button disabled state:', submitButton.disabled);
        console.log('Form valid state:', checkoutForm.checkValidity());
        
        // Check form validity manually
        const invalidFields = [];
        const allFields = checkoutForm.querySelectorAll('input, select, textarea');
        allFields.forEach(field => {
            if (!field.checkValidity()) {
                invalidFields.push({
                    name: field.name || field.id,
                    type: field.type,
                    value: field.value,
                    validationMessage: field.validationMessage
                });
            }
        });
        
        if (invalidFields.length > 0) {
            console.log('Invalid fields found:', invalidFields);
        } else {
            console.log('All fields are valid');
        }
    });
    
    // Add form submit event
    checkoutForm.addEventListener('submit', function(e) {
        console.log('=== FORM SUBMISSION STARTED ===');
        console.log('Form action:', checkoutForm.action);
        console.log('Form method:', checkoutForm.method);
        
        // First check: Are there any HTML required fields that browser is validating?
        const htmlRequiredFields = checkoutForm.querySelectorAll('input[required], select[required], textarea[required]');
        console.log('HTML required fields found:', htmlRequiredFields.length);
        htmlRequiredFields.forEach(field => {
            console.log(`HTML Required: ${field.name || field.id} = "${field.value}" (Type: ${field.type})`);
        });
        
        // Smart validation: only check fields that are actually required based on form state
        let allValid = true;
        let missingFields = [];
        
        // Always required fields
        const alwaysRequiredFields = [
            'first_name',
            'last_name',
            'customer_email',
            'customer_phone', 
            'billing_address_line_1',
            'billing_city',
            'payment_method',
            'terms'
        ];
        
        console.log('Checking always required fields:', alwaysRequiredFields);
        
        // SIMPLIFIED: Disable complex validation temporarily for debugging
        console.log('🔥 SIMPLIFIED VALIDATION MODE - Checking basic requirements only');
        
        // Check if we're in quotation mode
        const isQuotationMode = document.querySelector('input[name="checkout_type"]:checked')?.value === 'quotation';
        console.log('🔍 Is quotation mode?', isQuotationMode);
        
        // Only check absolutely critical fields
        const criticalFieldsCheck = [
            {name: 'first_name', required: true},
            {name: 'last_name', required: true},
            {name: 'customer_email', required: true},
            {name: 'customer_phone', required: true},
            {name: 'billing_address_line_1', required: true},
            {name: 'billing_city', required: true},
            {name: 'terms', required: true, type: 'checkbox'},
            {name: 'payment_method', required: !isQuotationMode, type: 'radio'} // Not required for quotation
        ];
        
        let criticalMissing = [];
        
        criticalFieldsCheck.forEach(field => {
            if (field.type === 'checkbox') {
                const element = document.querySelector(`[name="${field.name}"]`);
                if (!element || !element.checked) {
                    criticalMissing.push(field.name);
                }
            } else if (field.type === 'radio') {
                const radios = document.querySelectorAll(`[name="${field.name}"]`);
                const checked = Array.from(radios).some(radio => radio.checked);
                if (!checked) {
                    criticalMissing.push(field.name);
                }
            } else {
                const element = document.querySelector(`[name="${field.name}"]`);
                if (!element || !element.value.trim()) {
                    criticalMissing.push(field.name);
                }
            }
        });
        
        if (criticalMissing.length > 0) {
            console.log('❌ Critical fields missing:', criticalMissing);
            alert('Please fill in: ' + criticalMissing.join(', '));
            e.preventDefault();
            return false;
        }
        
        console.log('✅ All critical fields present, allowing submission');
        alwaysRequiredFields.forEach(fieldName => {
            if (fieldName === 'payment_method') {
                // Special handling for radio buttons
                const paymentRadios = document.querySelectorAll('[name="payment_method"]');
                const paymentSelected = Array.from(paymentRadios).some(radio => radio.checked);
                if (!paymentSelected) {
                    console.log('Missing required field:', fieldName, '(no radio button selected)');
                    missingFields.push(fieldName);
                    allValid = false;
                }
            } else if (fieldName === 'terms') {
                // Special handling for terms checkbox
                const termsField = document.querySelector('[name="terms"]');
                if (termsField && !termsField.checked) {
                    console.log('Missing required field:', fieldName, '(checkbox not checked)');
                    missingFields.push(fieldName);
                    allValid = false;
                }
        } else {
                // Regular text/email/tel fields
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field && (!field.value || !field.value.trim())) {
                    console.log('Missing required field:', fieldName, 'Value:', field.value);
                    missingFields.push(fieldName);
                    allValid = false;
                }
            }
        });
        
        // Check shipping fields only if "Same as billing address" is NOT checked
        const sameAsBilling = document.getElementById('same_as_billing');
        const shippingRequired = sameAsBilling && !sameAsBilling.checked;
        
        console.log('Same as billing checkbox found:', sameAsBilling ? 'Yes' : 'No');
        console.log('Same as billing checked:', sameAsBilling ? sameAsBilling.checked : 'N/A');
        console.log('Shipping fields required:', shippingRequired);
        
        if (shippingRequired) {
            console.log('Checking shipping fields (different from billing)...');
            const shippingRequiredFields = ['shipping_address_line_1', 'shipping_city'];
            
            shippingRequiredFields.forEach(fieldName => {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field && (!field.value || !field.value.trim())) {
                    console.log('Missing required shipping field:', fieldName);
                    missingFields.push(fieldName);
                    allValid = false;
                }
            });
        } else {
            console.log('Skipping shipping field validation (same as billing address)');
        }
        
        console.log('Validation result - All valid:', allValid, 'Missing fields:', missingFields);
        
        if (!allValid) {
            console.log('=== VALIDATION FAILED ===');
            console.log('Missing required fields:', missingFields);
            
            // Create a more user-friendly error message
            let errorMessage = 'Please fill in the following required fields:\n\n';
            missingFields.forEach(field => {
                switch(field) {
                    case 'first_name':
                        errorMessage += '• First Name\n';
                        break;
                    case 'last_name':
                        errorMessage += '• Last Name\n';
                        break;
                    case 'customer_email':
                        errorMessage += '• Email Address\n';
                        break;
                    case 'customer_phone':
                        errorMessage += '• Phone Number\n';
                        break;
                    case 'billing_address_line_1':
                        errorMessage += '• Billing Address Line 1\n';
                        break;
                    case 'billing_city':
                        errorMessage += '• Billing City\n';
                        break;
                    case 'payment_method':
                        errorMessage += '• Payment Method (select Bank Transfer)\n';
                        break;
                    case 'terms':
                        errorMessage += '• Terms of Service agreement (check the checkbox)\n';
                        break;
                    case 'shipping_address_line_1':
                        errorMessage += '• Shipping Address Line 1\n';
                        break;
                    case 'shipping_city':
                        errorMessage += '• Shipping City\n';
                        break;
                    default:
                        errorMessage += `• ${field}\n`;
                }
            });
            
            alert(errorMessage);
            e.preventDefault();
            return false;
        } else {
            console.log('=== VALIDATION PASSED ===');
        }
        
        // Disable submit button to prevent double submission
        submitButton.disabled = true;
        submitButton.textContent = 'Processing...';
        
        console.log('Form validation passed, submitting...');
        console.log('Form data being submitted...');
    });
});
</script>
@endsection