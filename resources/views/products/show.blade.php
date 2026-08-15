@extends('layouts.app')

@section('title', $product->name . ' - CHANCE LAPTOPS | Laptops, Accessories & Services in Sri Lanka')
@section('description', $product->details ? Str::limit(strip_tags($product->details), 160) : $product->name . ' - Available at Chance Laptops. Brand new and used laptops, laptop accessories, and professional repair services in Sri Lanka.')
@section('keywords', $product->name . ', ' . ($product->category ? $product->category->name : '') . ', laptop, laptops Sri Lanka, laptop accessories, laptop parts, Chance Laptops, Sri Lanka, ' . ($product->code ? $product->code : ''))
@section('og_title', $product->name . ' - LKR ' . number_format($product->final_price, 2) . ' at CHANCE LAPTOPS')
@section('og_description', $product->details ? Str::limit(strip_tags($product->details), 200) : 'Premium ' . $product->name . ' available at Chance Laptops. Expert laptop sales, repair services, and accessories in Sri Lanka.')
@section('og_image', $product->main_image)
@section('og_type', 'product')

@section('content')
<!-- Product Details - Modern Redesign -->
<section class="py-8 sm:py-12 bg-gradient-to-b from-white via-gray-50 to-gray-50 relative overflow-hidden">
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-96 h-96 rounded-full bg-red-500/5 blur-3xl -top-48 -left-48"></div>
        <div class="absolute w-96 h-96 rounded-full bg-red-600/5 blur-3xl -bottom-48 -right-48"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb Navigation -->
        <nav class="mb-6">
            <ol class="flex items-center space-x-2 text-sm text-gray-600">
                <li><a href="{{ route('home') }}" class="hover:text-red-400 transition-colors">Home</a></li>
                <li><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></li>
                <li><a href="{{ route('products.index') }}" class="hover:text-red-400 transition-colors">Products</a></li>
                <li><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></li>
                <li><a href="{{ route('categories.show', $product->category->slug ?: $product->category->id) }}" class="hover:text-red-400 transition-colors">{{ $product->category->name }}</a></li>
                <li><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></li>
                <li class="text-gray-500">{{ Str::limit($product->name, 30) }}</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Product Images Gallery - Enhanced -->
            <div class="relative">
                <!-- Main Image Display -->
                <div class="relative bg-gradient-to-br from-white to-gray-50 rounded-2xl border-2 border-red-500/20 p-4 sm:p-6 mb-6 shadow-2xl shadow-red-500/5 group hover:border-red-500/40 transition-all duration-300">
                    <div class="relative bg-white/5 backdrop-blur-sm rounded-xl overflow-hidden p-4 sm:p-8">
                    <img id="mainImage" 
                         src="{{ $product->images[0] ?? 'https://via.placeholder.com/600x400?text=No+Image' }}" 
                         alt="{{ $product->name }}" 
                             class="w-full h-auto max-h-[500px] sm:max-h-[600px] object-contain transition-transform duration-300 group-hover:scale-105">
                    </div>
                    
                    <!-- Sale Badge Overlay -->
                    @if($product->is_on_sale)
                        <div class="absolute top-6 left-6 z-10">
                            <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold px-4 py-2 rounded-xl shadow-lg animate-pulse">
                                <span class="text-sm">🔥 HOT DEAL</span>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Thumbnail Gallery -->
                @if(count($product->images) > 1)
                    <div class="grid grid-cols-4 sm:grid-cols-5 gap-3">
                        @foreach($product->images as $index => $image)
                            <button onclick="changeMainImage('{{ $image }}', this)" 
                                    class="relative p-2 bg-gradient-to-br from-gray-100 to-gray-50/50 rounded-xl border-2 {{ $index === 0 ? 'border-red-500 ring-2 ring-red-500/50' : 'border-gray-300/50 hover:border-red-500/50' }} transition-all duration-300 hover:scale-105 group overflow-hidden">
                                <div class="aspect-square bg-white/5 rounded-lg p-2 overflow-hidden">
                                <img src="{{ $image }}" 
                                     alt="{{ $product->name }} - Image {{ $index + 1 }}"
                                     loading="lazy"
                                         class="w-full h-full object-contain rounded group-hover:opacity-80 transition-opacity">
                            </div>
                                @if($index === 0)
                                    <div class="absolute inset-0 bg-red-500/10 rounded-xl"></div>
                                @endif
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Information - Modern Layout -->
            <div class="space-y-6">
                <!-- Category & Badges -->
                <div class="flex flex-wrap items-center gap-3">
                    <span class="inline-flex items-center px-4 py-2 bg-red-500/10 border border-red-500/30 rounded-lg text-red-400 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                        {{ $product->category->name }}
                    </span>
                    @if($product->is_on_sale)
                        <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500/20 to-pink-500/20 border border-red-500/40 rounded-lg text-red-400 text-sm font-bold">
                            💰 Save LKR {{ number_format($product->price - $product->promo_price, 2) }}
                        </span>
                    @endif
                    </div>

                <!-- Product Title -->
                <div>
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                        {{ $product->name }}
                    </h1>
                </div>

                <!-- Stock Status - Enhanced -->
                <div class="flex flex-wrap items-center gap-3">
                @if($product->status && in_array($product->status->status_name, ['Coming Soon', 'Pre Order']))
                        <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border border-red-500/30 rounded-lg">
                            <span class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></span>
                            <span class="text-red-400 font-semibold">{{ $product->status->status_name }}</span>
                    </div>
                @elseif($product->stock_quantity > 0)
                        <div class="flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/30 rounded-lg">
                        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                            <span class="text-green-400 font-semibold">In Stock</span>
                    </div>
                @else
                        <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border border-red-500/30 rounded-lg">
                        <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="text-red-400 font-semibold">Out of Stock</span>
                    </div>
                @endif

                    @if($product->is_wholesale)
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-bold bg-amber-100 text-amber-900 border border-amber-300">
                            Wholesale
                        </span>
                    @endif
                    @if($product->is_in_stock_uae)
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-bold bg-sky-100 text-sky-900 border border-sky-300">
                            In Stock UAE
                        </span>
                    @endif

                    @if($product->status)
                        @include('components.product-status-badge', ['product' => $product])
                    @endif
                </div>

                @if($product->is_wholesale || $product->is_in_stock_uae)
                <div class="space-y-3">
                    @if($product->is_wholesale)
                        <x-whatsapp-enquiry-button
                            :url="$product->wholesaleWhatsappUrl()"
                            label="WhatsApp — Wholesale Purchase"
                            tone="amber"
                            :note="'Minimum order is '.config('products.wholesale_min_units', 5).' units across any products. Contact us on WhatsApp to purchase.'"
                        />
                    @endif

                    @if($product->is_in_stock_uae)
                        <x-whatsapp-enquiry-button
                            :url="$product->uaeWhatsappUrl()"
                            label="WhatsApp — In Stock UAE Purchase"
                            tone="sky"
                            note="In Stock UAE: Delivery will be within 1–2 weeks. Contact us on WhatsApp to purchase."
                        />
                    @endif
                </div>
                @endif

                <!-- Price Display - Premium Design -->
                <div class="bg-gradient-to-br from-white via-gray-50 to-white border-2 border-red-500/30 rounded-2xl p-4 sm:p-6 shadow-xl shadow-red-500/10">
                    @if($product->is_on_sale)
                        <div class="mb-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline gap-3 mb-3">
                                <span class="text-2xl sm:text-3xl font-bold text-red-400">LKR {{ number_format($product->promo_price, 2) }}</span>
                                <span class="text-base sm:text-lg text-gray-500 line-through">LKR {{ number_format($product->price, 2) }}</span>
                            </div>
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="inline-flex items-center px-3 py-1 bg-green-500/20 border border-green-500/40 rounded-lg text-green-400 text-sm font-semibold">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Save LKR {{ number_format($product->price - $product->promo_price, 2) }}
                                </span>
                                <span class="inline-flex items-center px-3 py-1 bg-red-500/20 border border-red-500/40 rounded-lg text-red-400 text-sm font-semibold">
                                    {{ round((($product->price - $product->promo_price) / $product->price) * 100) }}% OFF
                                </span>
                            </div>
                        </div>
                    @else
                        <div>
                            @if($product->price > 0)
                                <span class="text-2xl sm:text-3xl font-bold text-red-400">LKR {{ number_format($product->price, 2) }}</span>
                            @else
                                <span class="text-xl sm:text-2xl font-bold text-red-400">Contact for Price</span>
                            @endif
                        </div>
                    @endif

                    @include('components.payment-badges', ['variant' => 'detail'])
                </div>

                <!-- Add to Cart Section - Enhanced -->
                @if($product->can_add_to_cart)
                    <div class="bg-gradient-to-br from-white to-gray-50 border-2 border-red-500/30 rounded-2xl p-4 sm:p-6 shadow-xl">
                            @if($product->is_on_sale)
                            <div class="mb-4 p-2.5 sm:p-3 bg-gradient-to-r from-red-500/10 to-pink-500/10 border border-red-500/30 rounded-lg">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                    <span class="text-red-400 font-semibold text-xs sm:text-sm">⚡ Limited Time Offer - Act Fast!</span>
                        </div>
                    </div>
                @endif

                        <div class="space-y-4">
                            <!-- Quantity Selector -->
                            <div class="flex flex-wrap items-center gap-3 sm:gap-4">
                                <label class="text-gray-600 font-medium text-sm sm:text-base">Quantity:</label>
                                <div class="flex items-center border-2 border-gray-300/50 rounded-xl overflow-hidden bg-gray-100">
                                    <button type="button" 
                                            class="px-3 sm:px-4 py-2 sm:py-3 text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all" 
                                            onclick="decreaseQuantity()">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                        </svg>
                                    </button>
                                    <input type="number" 
                                           id="quantity" 
                                           value="1" 
                                           min="1" 
                                           max="{{ max($product->stock_quantity, 1) }}" 
                                           class="w-16 sm:w-20 py-2 sm:py-3 text-sm sm:text-base text-center bg-transparent text-gray-900 font-semibold border-x-2 border-gray-300 focus:outline-none focus:border-red-500">
                                    <button type="button" 
                                            class="px-3 sm:px-4 py-2 sm:py-3 text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all" 
                                            onclick="increaseQuantity()">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-3">
                                <div class="flex-1">
                                <x-add-to-cart-button
                                    :product-id="$product->id"
                                    handler="addToCart"
                                    :product-name="$product->name"
                                    :sale="$product->is_on_sale"
                                    :label="$product->is_on_sale ? 'Add to Cart — Sale' : 'Add to Cart'"
                                    size="lg"
                                />
                                </div>
                                <button class="px-4 sm:px-6 py-3 sm:py-4 bg-white border-2 border-gray-300 hover:border-red-500/50 text-gray-700 rounded-xl transition-all duration-300 hover:bg-red-50" 
                                        onclick="addToWishlist({{ $product->id }})">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    @if($product->status && in_array($product->status->status_name, ['Coming Soon', 'Pre Order']))
                        <div class="bg-gradient-to-r from-red-500/10 to-purple-500/10 border-2 border-red-500/30 rounded-2xl p-6 text-center">
                            <div class="text-red-400 text-lg sm:text-xl font-bold mb-3">{{ $product->status->status_name }}</div>
                            <p class="text-gray-700 mb-4 text-sm">{{ $product->cart_restriction_reason }}</p>
                            <p class="text-gray-500 text-xs">This product is currently not available for purchase.</p>
                        </div>
                    @else
                        <div class="bg-red-500/10 border-2 border-red-500/30 rounded-2xl p-6 text-center">
                            <div class="text-red-400 text-lg sm:text-xl font-bold mb-3">{{ $product->cart_restriction_reason ?: 'Unavailable' }}</div>
                            <p class="text-gray-700 text-sm">This product is currently unavailable.</p>
                        </div>
                    @endif
                @endif

                <!-- Quick Info Cards -->
                <div class="grid grid-cols-2 gap-4">
                    @if($product->warranty)
                        <div class="bg-gradient-to-br from-gray-50 to-white border border-red-500/20 rounded-xl p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                <span class="text-sm text-gray-600">Warranty</span>
                            </div>
                            <span class="text-gray-900 font-semibold">{{ $product->warranty }}</span>
                        </div>
                    @endif
                    @if($product->model)
                        <div class="bg-gradient-to-br from-gray-50 to-white border border-red-500/20 rounded-xl p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Model</span>
                            </div>
                            <span class="text-gray-900 font-semibold">{{ $product->model }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Details & Specifications - Full Width Section -->
<section class="py-12 bg-gradient-to-b from-white to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Product Description -->
                @if($product->description)
                    <div class="bg-gradient-to-br from-white to-gray-50 border-2 border-red-500/20 rounded-2xl p-4 sm:p-6 shadow-xl">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            </div>
                            <span>Description</span>
                        </h2>
                        <p class="text-gray-700 leading-relaxed text-sm sm:text-base">{{ $product->description }}</p>
                    </div>
                @endif

                <!-- Product Attributes -->
                @if($product->grouped_attributes && count($product->grouped_attributes) > 0)
                    <div class="bg-gradient-to-br from-white to-gray-50 border-2 border-red-500/20 rounded-2xl p-4 sm:p-6 shadow-xl">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            </div>
                            <span>Product Attributes</span>
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($product->grouped_attributes as $attributeName => $attributeValues)
                                <div class="bg-gray-100 border border-gray-300/50 rounded-xl p-4 hover:border-red-500/50 transition-colors">
                                    <span class="text-xs font-bold text-red-400 mb-3 block uppercase tracking-wider">{{ $attributeName }}</span>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($attributeValues as $value)
                                            <span class="inline-block bg-gray-50/70 text-gray-700 text-sm font-medium px-3 py-1.5 rounded-lg border border-gray-300/50">
                                                {{ $value }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Product Details & Specifications -->
                @if($product->product_details && trim(strip_tags($product->product_details)))
                    @php
                        $htmlContent = $product->product_details;
                        $htmlContent = str_replace(['<p>', '<div>'], '', $htmlContent);
                        $htmlContent = str_replace(['</p>', '</div>'], "\n", $htmlContent);
                        $htmlContent = str_replace(['<br>', '<br/>', '<br />'], "\n", $htmlContent);
                        $htmlContent = str_replace('<ul>', "\n", $htmlContent);
                        $htmlContent = str_replace('</ul>', "\n", $htmlContent);
                        $htmlContent = str_replace('<li>', "• ", $htmlContent);
                        $htmlContent = str_replace('</li>', "\n", $htmlContent);
                        $cleanContent = strip_tags($htmlContent);
                        $cleanContent = html_entity_decode($cleanContent);
                        $cleanContent = preg_replace('/\n\s*\n/', "\n\n", $cleanContent);
                        $cleanContent = preg_replace('/\n{3,}/', "\n\n", $cleanContent);
                        $cleanContent = trim($cleanContent);
                        $lines = explode("\n", $cleanContent);
                        $lines = array_filter(array_map('trim', $lines));
                    @endphp
                    
                    <div class="bg-gradient-to-br from-white to-gray-50 border-2 border-red-500/20 rounded-2xl p-4 sm:p-6 shadow-xl">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            </div>
                            <span>Product Details & Specifications</span>
                        </h2>
                        
                        <div class="space-y-3">
                            @foreach($lines as $line)
                                @if(!empty($line))
                                    @if(preg_match('/^\d+\.\s/', $line) || Str::startsWith($line, '•'))
                                        <div class="flex items-start py-3 px-4 bg-gray-100 rounded-xl border border-gray-300/50 hover:border-red-500/50 transition-colors">
                                            <span class="text-gray-700 leading-relaxed">{{ $line }}</span>
                                        </div>
                                    @elseif(strpos($line, ':') !== false && strlen($line) < 100)
                                        @php
                                            $parts = explode(':', $line, 2);
                                            $key = trim($parts[0]);
                                            $value = isset($parts[1]) ? trim($parts[1]) : '';
                                        @endphp
                                        @if(!empty($value))
                                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center py-3 px-4 bg-gray-100 rounded-xl border border-gray-300/50 hover:border-red-500/50 transition-colors">
                                                <span class="text-gray-600 font-medium mb-1 sm:mb-0">{{ $key }}:</span>
                                                <span class="text-gray-900 font-semibold sm:text-right">{{ $value }}</span>
                                            </div>
                                        @else
                                            <div class="py-3 px-4 bg-red-500/10 rounded-xl border border-red-500/30">
                                                <div class="text-red-400 font-bold text-center">{{ $key }}</div>
                                            </div>
                                        @endif
                                    @elseif(preg_match('/^[A-Z\s]+$/', $line) && strlen($line) < 50)
                                        <div class="py-3 px-4 bg-red-500/10 rounded-xl border border-red-500/30">
                                            <div class="text-red-400 font-bold text-center">{{ $line }}</div>
                                        </div>
                                    @else
                                        <div class="py-3 px-4 bg-white/50 rounded-xl border border-gray-300/30">
                                            <span class="text-gray-700 leading-relaxed">{{ $line }}</span>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Fallback when no product details are available -->
                    @if($product->warranty || $product->model)
                        <div class="bg-gradient-to-br from-white to-gray-50 border-2 border-red-500/20 rounded-2xl p-4 sm:p-6 shadow-xl">
                            <h2 class="text-lg sm:text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                                <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                                </div>
                                <span>Product Information</span>
                            </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @if($product->warranty)
                                    <div class="flex justify-between items-center py-4 px-5 bg-gray-100 rounded-xl border border-gray-300/50">
                                    <span class="text-gray-600 font-medium">Warranty:</span>
                                    <span class="text-gray-900 font-semibold">{{ $product->warranty }}</span>
                                </div>
                            @endif
                            @if($product->model)
                                    <div class="flex justify-between items-center py-4 px-5 bg-gray-100 rounded-xl border border-gray-300/50">
                                    <span class="text-gray-600 font-medium">Model:</span>
                                    <span class="text-gray-900 font-semibold">{{ $product->model }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                @endif
            </div>

            <!-- Sidebar - Additional Info -->
            <div class="space-y-6">
                <!-- Contact Card -->
                <div class="bg-gradient-to-br from-red-500/10 to-red-600/10 border-2 border-red-500/30 rounded-2xl p-4 sm:p-6 shadow-xl">
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Need Help?
                    </h3>
                    <p class="text-gray-700 mb-4 text-sm">Have questions about this product? Our expert team is here to help!</p>
                    <a href="/contact-us" class="block w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-2.5 sm:py-3 px-4 rounded-xl text-center transition-all duration-300 transform hover:scale-105 text-sm sm:text-base">
                        Contact Us
                    </a>
                </div>

                <!-- Shipping Info -->
                <div class="bg-gradient-to-br from-white to-gray-50 border-2 border-red-500/20 rounded-2xl p-4 sm:p-6 shadow-xl">
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a2 2 0 012-2h14a2 2 0 012 2v16l-7-3.5L5 20V4z"/>
                        </svg>
                        Shipping & Returns
                    </h3>
                    <ul class="space-y-3 text-gray-700 text-sm">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Island-wide delivery available</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Secure payment options</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Warranty included</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
    <section class="py-12 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-2">Related Products</h2>
                <p class="text-gray-600 text-sm sm:text-base">You might also be interested in these products</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="group bg-gradient-to-br from-white to-gray-50 border-2 border-gray-200/50 rounded-2xl overflow-hidden hover:border-red-500/50 transition-all duration-300 hover:shadow-2xl hover:shadow-red-500/10 hover:-translate-y-2">
                        <!-- Product Image -->
                        <div class="relative bg-white/5 p-6">
                            <a href="{{ route('products.show', ['category' => $relatedProduct->category->slug ?: $relatedProduct->category->id, 'product' => $relatedProduct->slug]) }}">
                                <div class="aspect-square">
                                    <img src="{{ $relatedProduct->main_image ?? 'https://via.placeholder.com/400x400?text=No+Image' }}" 
                                         alt="{{ $relatedProduct->name }}" 
                                         loading="lazy"
                                         class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-300">
                                </div>
                            </a>
                            
                            @if($relatedProduct->is_on_sale)
                                <div class="absolute top-4 right-4">
                                    <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">SALE</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-5">
                            <h3 class="text-sm sm:text-base font-semibold text-gray-900 mb-3 line-clamp-2 min-h-[2.5rem]">
                                <a href="{{ route('products.show', ['category' => $relatedProduct->category->slug ?: $relatedProduct->category->id, 'product' => $relatedProduct->slug]) }}" 
                                   class="hover:text-red-400 transition-colors">
                                    {{ $relatedProduct->name }}
                                </a>
                            </h3>
                            
                            <!-- Price -->
                            <div class="mb-3">
                                @if($relatedProduct->is_on_sale)
                                    <div class="space-y-1">
                                        <span class="text-xs text-gray-500 line-through block">LKR {{ number_format($relatedProduct->price, 0) }}</span>
                                        <span class="text-base font-bold text-red-400">LKR {{ number_format($relatedProduct->promo_price, 0) }}</span>
                                    </div>
                                @else
                                    @if($relatedProduct->price > 0)
                                        <span class="text-base font-bold text-gray-900">LKR {{ number_format($relatedProduct->price, 0) }}</span>
                                    @else
                                        <span class="text-sm font-bold text-red-400">Contact for Price</span>
                                    @endif
                                @endif
                            </div>
                            
                            <!-- Stock Status -->
                            <div class="flex items-center justify-between mb-4 gap-2 flex-wrap">
                                @if($relatedProduct->status && in_array($relatedProduct->status->status_name, ['Coming Soon', 'Pre Order']))
                                    <span class="text-xs text-violet-500 flex items-center">
                                        <span class="w-2 h-2 bg-violet-500 rounded-full mr-1"></span>
                                        {{ $relatedProduct->status->status_name }}
                                    </span>
                                @elseif($relatedProduct->stock_quantity > 0)
                                    <span class="text-xs text-green-500 flex items-center">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                                        In Stock
                                    </span>
                                @elseif($relatedProduct->is_in_stock_uae)
                                    <span class="text-xs text-sky-600 flex items-center">
                                        <span class="w-2 h-2 bg-sky-600 rounded-full mr-1"></span>
                                        In Stock UAE
                                    </span>
                                @else
                                    <span class="text-xs text-red-400 flex items-center">
                                        <span class="w-2 h-2 bg-red-500 rounded-full mr-1"></span>
                                        Out of Stock
                                    </span>
                                @endif
                                @if($relatedProduct->is_wholesale)
                                    <span class="text-[10px] font-bold uppercase tracking-wide bg-amber-500 text-white px-1.5 py-0.5 rounded">Wholesale</span>
                                @endif
                            </div>

                            @if($relatedProduct->can_add_to_cart)
                                <x-payment-badges />
                                
                                <!-- Add to Cart Button -->
                                <x-add-to-cart-button
                                    :product-id="$relatedProduct->id"
                                    handler="addToCart"
                                    :disabled="false"
                                    size="sm"
                                />
                            @else
                                <a href="{{ route('products.show', ['category' => $relatedProduct->category->slug ?: $relatedProduct->category->id, 'product' => $relatedProduct->slug]) }}"
                                   class="block w-full text-center text-xs font-semibold rounded-lg py-2.5 {{ ($relatedProduct->is_wholesale || $relatedProduct->is_in_stock_uae) ? 'bg-sky-600 text-white hover:bg-sky-700' : 'bg-gray-200 text-gray-600' }}">
                                    @if($relatedProduct->is_wholesale || $relatedProduct->is_in_stock_uae)
                                        View · WhatsApp purchase
                                    @else
                                        {{ $relatedProduct->cart_restriction_reason ?: 'Unavailable' }}
                                    @endif
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection

@push('scripts')
<script>
    function changeMainImage(src, thumbnail) {
        document.getElementById('mainImage').src = src;
        
        // Update thumbnail borders
        document.querySelectorAll('button[onclick*="changeMainImage"]').forEach(btn => {
            btn.classList.remove('border-red-500', 'ring-2', 'ring-red-500/50');
            btn.classList.add('border-gray-300/50');
        });
        thumbnail.classList.remove('border-gray-300/50');
        thumbnail.classList.add('border-red-500', 'ring-2', 'ring-red-500/50');
    }
    
    function increaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        const max = parseInt(quantityInput.getAttribute('max'));
        const current = parseInt(quantityInput.value);
        
        if (current < max) {
            quantityInput.value = current + 1;
        }
    }
    
    function decreaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        const min = parseInt(quantityInput.getAttribute('min')) || 1;
        const current = parseInt(quantityInput.value);
        
        if (current > min) {
            quantityInput.value = current - 1;
        }
    }
    
    function addToCart(productId) {
        const quantity = document.getElementById('quantity')?.value || 1;
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
                quantity: parseInt(quantity)
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'success');
                if (data.cart_total !== undefined) localStorage.setItem('cartTotal', data.cart_total);
                const productName = document.querySelector('h1')?.textContent?.trim() || 'Product';
                try {
                    window.animateCartAddition(data.cart_total, productName);
                } catch (animError) {
                    showNotification('Product added to cart successfully!', 'success');
                }
            } else {
                if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
                showNotification(data.message || 'Failed to add product to cart', 'error');
            }
        })
        .catch(error => {
            if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
            console.error('Cart Error Details:', error);
            showNotification('Something went wrong. Please try again.', 'error');
        });
    }

        function showNotification(message, type) {
            const notification = document.createElement('div');
        notification.className = `fixed top-24 right-4 z-[99999] p-4 rounded-xl shadow-2xl transition-all transform translate-x-full ${
            type === 'success' ? 'bg-gradient-to-r from-green-600 to-green-700 text-white' : 'bg-gradient-to-r from-red-600 to-red-700 text-white'
            }`;
            notification.style.zIndex = '99999';
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
                notification.classList.add('translate-x-0');
            }, 10);
            
            setTimeout(() => {
                notification.classList.add('opacity-0', 'translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }
    
    function addToWishlist(productId) {
        alert('Wishlist functionality will be implemented in the next phase!');
    }
</script>
@endpush
