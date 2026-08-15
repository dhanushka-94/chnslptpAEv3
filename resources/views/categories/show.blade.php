@extends('layouts.app')

@section('title', $category->name . ' - Brand New & Used Laptops, Accessories | CHANCE LAPTOPS')
@section('description', 'Shop ' . $category->name . ' at Chance Laptops. Find brand new and used laptops, laptop accessories, parts, and professional repair services in United Arab Emirates.')
@section('keywords', $category->name . ', laptops, laptop accessories, laptop parts, brand new laptops, used laptops, laptop repair, Chance Laptops, United Arab Emirates, ' . strtolower($category->name))
@section('og_title', $category->name . ' - Laptops & Accessories | CHANCE LAPTOPS')
@section('og_description', 'Discover ' . $category->name . ' products at Chance Laptops. Brand new and used laptops, accessories, and professional repair services in United Arab Emirates.')
@section('og_type', 'product.group')

@section('content')
<!-- Compact Category Header -->
<section class="relative bg-white border-b border-gray-200/30 py-4 md:py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-3 md:mb-4">
            <ol class="flex items-center space-x-1 md:space-x-2 text-xs text-gray-500 overflow-x-auto">
                <li><a href="{{ route('home') }}" class="hover:text-[blue-500] transition-colors whitespace-nowrap">Home</a></li>
                <li><span class="mx-1">/</span></li>
                <li><a href="{{ route('categories.index') }}" class="hover:text-[blue-500] transition-colors whitespace-nowrap">Categories</a></li>
                <li><span class="mx-1">/</span></li>
                <li class="text-[blue-500] font-medium truncate">{{ $category->name }}</li>
            </ol>
        </nav>
        
        <div class="flex items-center justify-between">
            <!-- Category Info -->
            <div class="flex items-center gap-3 md:gap-4 min-w-0 flex-1">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-[blue-500] to-[blue-600] rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 md:w-6 md:h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <div class="min-w-0 flex-1">
                    <h1 class="text-lg md:text-2xl font-bold text-gray-900 truncate">{{ $category->name }}</h1>
                    <p class="text-xs md:text-sm text-gray-600">{{ $products->total() }} products available</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-8 md:py-16 bg-gray-50 min-h-screen">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        
        <!-- Mobile Filter Toggle -->
        <div class="lg:hidden mb-4">
            <button id="mobile-filter-toggle" class="w-full bg-white border border-gray-200 rounded-lg px-4 py-3 flex items-center justify-between text-gray-900 hover:bg-gray-100 transition-colors shadow-sm">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-[blue-500]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z"/>
                    </svg>
                    <span class="font-medium">Filters & Sort</span>
                </div>
                <svg class="w-5 h-5 transition-transform duration-200" id="mobile-filter-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
        </div>

        <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
            <!-- Filter Sidebar -->
            <div class="w-full lg:w-72 lg:flex-shrink-0 hidden lg:block" id="filter-sidebar">
                <div class="bg-white rounded-xl border border-gray-200/30 p-6 shadow-lg">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-2 h-2 bg-[blue-500] rounded-full"></div>
                        <h3 class="text-lg font-semibold text-gray-900">Filters</h3>
                        <button type="button" id="clear-filters" class="ml-auto text-xs text-gray-600 hover:text-[blue-500] transition-colors">Clear All</button>
                    </div>
                    
                    <form id="filter-form" class="space-y-6">
                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search Products</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                   placeholder="Search by name, code..." 
                                   class="w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-[blue-500] focus:border-[blue-500] transition-all">
                        </div>

                        <!-- Availability -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Availability</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer hover:bg-gray-100 rounded p-2 transition-colors">
                                    <input type="checkbox" name="in_stock" value="1"
                                           {{ request()->boolean('in_stock') ? 'checked' : '' }}
                                           class="w-4 h-4 text-emerald-600 bg-gray-100 border-slate-200 rounded focus:ring-emerald-500 focus:ring-2">
                                    <span class="ml-3 text-sm text-gray-700 flex-1">In Stock</span>
                                    <span class="w-2 h-2 rounded-full bg-emerald-500" title="Local stock"></span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-100 rounded p-2 transition-colors">
                                    <input type="checkbox" name="wholesale" value="1"
                                           {{ request()->boolean('wholesale') ? 'checked' : '' }}
                                           class="w-4 h-4 text-amber-600 bg-gray-100 border-slate-200 rounded focus:ring-amber-500 focus:ring-2">
                                    <span class="ml-3 text-sm text-gray-700 flex-1">Wholesale</span>
                                    <span class="w-2 h-2 rounded-full bg-amber-500" title="Wholesale"></span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-100 rounded p-2 transition-colors">
                                    <input type="checkbox" name="in_stock_uae" value="1"
                                           {{ request()->boolean('in_stock_uae') ? 'checked' : '' }}
                                           class="w-4 h-4 text-sky-600 bg-gray-100 border-slate-200 rounded focus:ring-sky-500 focus:ring-2">
                                    <span class="ml-3 text-sm text-gray-700 flex-1">In Stock UAE</span>
                                    <span class="w-2 h-2 rounded-full bg-sky-500" title="In Stock UAE"></span>
                                </label>
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-sm font-semibold text-gray-200">Price Range</h4>
                                <button type="button" id="reset-price" class="text-xs text-gray-500 hover:text-[blue-500] transition-colors">Reset</button>
                            </div>
                            
                            <!-- Current Price Display -->
                            <div class="bg-gray-100 rounded-lg p-3 mb-4 border border-gray-300/50">
                                <div class="flex items-center justify-between">
                                    <div class="text-center flex-1">
                                        <div class="text-xs text-gray-500 mb-1">From</div>
                                        <div class="text-sm font-medium text-gray-900">AED <span id="min-price-display">{{ number_format($priceRange['min'] ?? 0) }}</span></div>
                                    </div>
                                    <div class="w-px h-8 bg-gray-600 mx-3"></div>
                                    <div class="text-center flex-1">
                                        <div class="text-xs text-gray-500 mb-1">To</div>
                                        <div class="text-sm font-medium text-gray-900">AED <span id="max-price-display">{{ number_format($priceRange['max'] ?? 100000) }}</span></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modern Range Slider -->
                            <div class="relative mb-4">
                                <div class="price-range-container">
                                    <input type="range" name="min_price" id="min-price" 
                                           min="{{ $priceRange['min'] ?? 0 }}" 
                                           max="{{ $priceRange['max'] ?? 100000 }}" 
                                           value="{{ request('min_price', $priceRange['min'] ?? 0) }}" 
                                           class="price-range-input price-range-min">
                                    <input type="range" name="max_price" id="max-price" 
                                           min="{{ $priceRange['min'] ?? 0 }}" 
                                           max="{{ $priceRange['max'] ?? 100000 }}" 
                                           value="{{ request('max_price', $priceRange['max'] ?? 100000) }}" 
                                           class="price-range-input price-range-max">
                                    <div class="price-range-track">
                                        <div class="price-range-track-active" id="price-track-active"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Manual Input Fields -->
                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-xs text-gray-500">Rs.</div>
                                    <input type="number" id="min-price-input" 
                                           min="{{ $priceRange['min'] ?? 0 }}" 
                                           max="{{ $priceRange['max'] ?? 100000 }}" 
                                           value="{{ request('min_price', $priceRange['min'] ?? 0) }}"
                                           placeholder="Min"
                                           class="w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-lg pl-8 pr-3 py-2.5 text-sm focus:ring-2 focus:ring-[blue-500]/50 focus:border-[blue-500] transition-all hover:border-slate-200">
                                </div>
                                <div class="relative">
                                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-xs text-gray-500">Rs.</div>
                                    <input type="number" id="max-price-input" 
                                           min="{{ $priceRange['min'] ?? 0 }}" 
                                           max="{{ $priceRange['max'] ?? 100000 }}" 
                                           value="{{ request('max_price', $priceRange['max'] ?? 100000) }}"
                                           placeholder="Max"
                                           class="w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-lg pl-8 pr-3 py-2.5 text-sm focus:ring-2 focus:ring-[blue-500]/50 focus:border-[blue-500] transition-all hover:border-slate-200">
                                </div>
                            </div>
                            
                            <!-- Quick Price Presets -->
                            <div class="mt-4">
                                <div class="text-xs text-gray-500 mb-2">Quick filters:</div>
                                <div class="flex flex-wrap gap-2">
                                    <button type="button" onclick="setQuickPrice(0, 50000)" class="quick-price-btn text-xs px-3 py-1.5 bg-gray-100 text-gray-600 rounded-lg hover:bg-[blue-500] hover:text-red-600 transition-all border border-gray-300 hover:border-[blue-500]">
                                        Under 50k
                                    </button>
                                    <button type="button" onclick="setQuickPrice(50000, 100000)" class="quick-price-btn text-xs px-3 py-1.5 bg-gray-100 text-gray-600 rounded-lg hover:bg-[blue-500] hover:text-red-600 transition-all border border-gray-300 hover:border-[blue-500]">
                                        50k - 100k
                                    </button>
                                    <button type="button" onclick="setQuickPrice(100000, 300000)" class="quick-price-btn text-xs px-3 py-1.5 bg-gray-100 text-gray-600 rounded-lg hover:bg-[blue-500] hover:text-red-600 transition-all border border-gray-300 hover:border-[blue-500]">
                                        Above 100k
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Product Attributes -->
                        @if(isset($availableAttributes) && !empty($availableAttributes))
                        @foreach($availableAttributes as $parentName => $attributes)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">{{ $parentName }}</label>
                            <div class="space-y-2">
                                @foreach($attributes as $attribute)
                                <label class="flex items-center cursor-pointer hover:bg-gray-100 rounded p-2 transition-colors">
                                    <input type="checkbox" name="attributes[{{ $parentName }}][]" value="{{ $attribute['id'] }}" 
                                           {{ in_array($attribute['id'], request('attributes.'.$parentName, [])) ? 'checked' : '' }}
                                           class="w-4 h-4 text-[blue-500] bg-gray-100 border-slate-200 rounded focus:ring-[blue-500] focus:ring-2">
                                    <span class="ml-3 text-sm text-gray-700 flex-1">{{ $attribute['name'] }}</span>
                                    <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded">{{ $attribute['count'] }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                <!-- Compact Top Bar with Results & Sort -->
                <div class="bg-white rounded-lg border border-gray-200/30 p-3 mb-4 md:mb-6 shadow-sm">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                        <!-- Results Info -->
                        <div class="flex items-center">
                            <span id="results-info" class="text-gray-700 text-xs sm:text-sm">
                                @if($products->total() > 0)
                                    {{ $products->total() }} products found
                                @else
                                    No products found
                                @endif
                            </span>
                        </div>
                        
                        <!-- Sort Options -->
                        <div class="flex items-center gap-2">
                            <label for="sort-select" class="text-xs text-gray-600 whitespace-nowrap">Sort:</label>
                            <select name="sort" id="sort-select" class="bg-gray-100 border border-gray-300 text-gray-900 rounded px-2 md:px-3 py-1.5 text-xs md:text-sm focus:ring-1 focus:ring-[blue-500] focus:border-[blue-500] transition-all">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price ↑</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price ↓</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div id="products-container">
                    @if($products->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 mb-8 md:mb-12" id="products-grid">
                @foreach($products as $product)
                    <a href="{{ route('products.show', ['category' => $category->slug ?: $category->id, 'product' => $product->slug]) }}" class="product-card block bg-white rounded-xl border border-gray-200/30 overflow-hidden hover:border-[blue-500]/30 transition-all duration-300 group shadow-lg hover:shadow-xl hover:shadow-[blue-500]/10 cursor-pointer">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden bg-white aspect-[4/3]">
                            <img 
                                src="{{ $product->main_image }}" 
                                alt="{{ $product->name }}" 
                                class="product-image w-full h-full object-contain transition-transform duration-300 group-hover:scale-105 p-6 bg-white/5 rounded-lg"
                                loading="lazy"
                            >
                            
                            <!-- Badges -->
                            <x-product-grid-flags :product="$product" />
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-3 md:p-4">
                            <div class="mb-2">
                                <span class="text-xs text-[blue-500] font-medium tracking-wide">{{ $product->category->name ?? 'Uncategorized' }}</span>
                            </div>
                            <h3 class="text-sm md:text-base font-semibold text-gray-900 mb-2 md:mb-3 line-clamp-2 group-hover:text-[blue-500] transition-colors leading-tight">
                                {{ $product->name }}
                            </h3>
                            
                            <div class="flex items-center justify-between mb-3 md:mb-4">
                                <div class="flex flex-col">
                                    @if($product->is_on_sale)
                                        <span class="text-xs md:text-sm text-gray-500 line-through">AED {{ number_format($product->price, 2) }}</span>
                                        <span class="text-sm md:text-lg font-bold text-[blue-500]">AED {{ number_format($product->final_price, 2) }}</span>
                                    @else
                                        @if($product->price > 0 && $product->final_price > 0)
                                            <span class="text-sm md:text-lg font-bold text-gray-900">AED {{ number_format($product->final_price, 2) }}</span>
                                        @else
                                            <span class="text-sm md:text-lg font-bold text-[blue-500]">Contact for Price</span>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <!-- Product Status Badge -->
                            @if($product->status)
                                <div class="mb-3">
                                    @include('components.product-status-badge', ['product' => $product])
                                </div>
                            @endif
                            
                            @if($product->can_add_to_cart)
                                <x-payment-badges />
                            @endif
                            
                            <div class="mt-auto pt-3">
                                @if($product->can_add_to_cart)
                                    <x-add-to-cart-button
                                        :product-id="$product->id"
                                        :disabled="false"
                                        size="sm"
                                    />
                                @else
                                    <span class="block w-full text-center text-xs font-semibold rounded-lg py-2.5 {{ ($product->is_wholesale || $product->is_in_stock_uae) ? 'bg-sky-600 text-white' : 'bg-gray-200 text-gray-600' }}">
                                        @if($product->is_wholesale || $product->is_in_stock_uae)
                                            View · WhatsApp purchase
                                        @else
                                            {{ $product->cart_restriction_reason ?: 'Unavailable' }}
                                        @endif
                                    </span>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

                        </div>

                        <!-- Custom Pagination -->
                        <div id="pagination-container">
                            {{ $products->appends(request()->query())->links('custom.pagination') }}
                        </div>
                    @else
                        <!-- No Products Found -->
                        <div class="text-center py-16">
                            <div class="max-w-md mx-auto">
                                <div class="bg-gray-100 rounded-xl w-24 h-24 flex items-center justify-center mx-auto mb-6 border border-gray-300">
                                    <svg class="w-12 h-12 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 2C5.58 2 2 5.58 2 10s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
                                <p class="text-gray-600 mb-6">Try adjusting your filters to see more results.</p>
                                <button onclick="clearAllFilters()" class="bg-[blue-500] hover:bg-[blue-600] text-white px-6 py-3 rounded-lg font-semibold transition-all inline-block">
                                    Clear Filters
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* 4:3 aspect ratio for product images */
    .aspect-\[4\/3\] {
        aspect-ratio: 4 / 3;
    }
    
    /* Fallback for older browsers */
    @supports not (aspect-ratio: 4 / 3) {
        .aspect-\[4\/3\] {
            position: relative;
        }
        
        .aspect-\[4\/3\]::before {
            content: '';
            display: block;
            padding-bottom: 75%; /* 3/4 = 0.75 = 75% */
        }
        
        .aspect-\[4\/3\] img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    }
    
    /* Enhanced product card hover effects */
    .product-card:hover .product-image {
        transform: scale(1.05);
    }

    /* Custom scrollbar for filters */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f3f4f6;
        border-radius: 3px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: blue-500;
        border-radius: 3px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: blue-600;
    }

    /* Loading spinner */
    .loading-spinner {
        border: 2px solid #e5e7eb;
        border-top: 2px solid blue-500;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Modern Price Range Slider Styles */
    .price-range-container {
        position: relative;
        height: 40px;
        display: flex;
        align-items: center;
    }

    .price-range-track {
        position: absolute;
        width: 100%;
        height: 6px;
        background: #374151;
        border-radius: 3px;
        z-index: 1;
        top: 50%;
        transform: translateY(-50%);
    }

    .price-range-track-active {
        position: absolute;
        height: 6px;
        background: linear-gradient(90deg, blue-500, blue-600);
        border-radius: 3px;
        transition: all 0.3s ease;
        top: 50%;
        transform: translateY(-50%);
    }

    .price-range-input {
        position: absolute;
        width: 100%;
        height: 40px;
        top: 0;
        left: 0;
        background: none;
        pointer-events: none;
        -webkit-appearance: none;
        appearance: none;
        outline: none;
        border: none;
        z-index: 2;
    }

    .price-range-input::-webkit-slider-thumb {
        height: 20px;
        width: 20px;
        border-radius: 50%;
        background: blue-500;
        border: 3px solid #ffffff;
        cursor: pointer;
        pointer-events: all;
        -webkit-appearance: none;
        appearance: none;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3), 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        position: relative;
        margin-top: -7px; /* Center thumb with 6px track: (20px thumb - 6px track) / 2 = 7px */
    }

    .price-range-input::-webkit-slider-thumb:hover {
        background: blue-600;
        transform: scale(1.15);
        box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4), 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .price-range-input::-webkit-slider-thumb:active {
        transform: scale(1.25);
        box-shadow: 0 8px 25px rgba(245, 158, 11, 0.5), 0 4px 12px rgba(0, 0, 0, 0.4);
    }

    .price-range-input::-moz-range-thumb {
        height: 20px;
        width: 20px;
        border-radius: 50%;
        background: blue-500;
        border: 3px solid #ffffff;
        cursor: pointer;
        pointer-events: all;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3), 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        -moz-appearance: none;
        margin-top: -7px; /* Center thumb with 6px track for Firefox */
    }

    .price-range-input::-moz-range-thumb:hover {
        background: blue-600;
        transform: scale(1.15);
        box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4), 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .price-range-input::-webkit-slider-runnable-track {
        width: 100%;
        height: 6px;
        background: transparent;
        border-radius: 3px;
    }

    .price-range-input::-moz-range-track {
        width: 100%;
        height: 6px;
        background: transparent;
        border-radius: 3px;
        border: none;
    }

    .price-range-min {
        z-index: 3;
    }

    .price-range-max {
        z-index: 4;
    }

    /* Enhanced focus states for better accessibility */
    .price-range-input:focus::-webkit-slider-thumb {
        outline: 2px solid blue-500;
        outline-offset: 2px;
    }

    .price-range-input:focus::-moz-range-thumb {
        outline: 2px solid blue-500;
        outline-offset: 2px;
    }

    /* Quick price button animations */
    .quick-price-btn {
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }

    .quick-price-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(245, 158, 11, 0.2);
    }

    .quick-price-btn:active {
        transform: translateY(0);
    }

    .quick-price-btn.active {
        background: blue-500 !important;
        color: white !important;
        border-color: blue-500 !important;
    }
</style>
@endpush

@push('scripts')
<script>
    // console.log('🔧 AJAX Filter System Loading...');
    
    // Global state
    let FilterSystem = {
        isLoading: false,
        searchTimeout: null,
        isInitialized: false
    };

    // Initialize filters when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        if (FilterSystem.isInitialized) {
            // console.log('⚠️ Filter system already initialized');
            return;
        }
        
        // console.log('Initializing AJAX Filter System...');
        
        // Get DOM elements
        const elements = {
            filterForm: document.getElementById('filter-form'),
            sortSelect: document.getElementById('sort-select'),
            productsContainer: document.getElementById('products-container'),
            resultsInfo: document.getElementById('results-info'),
            clearFiltersBtn: document.getElementById('clear-filters'),
            searchInput: document.getElementById('search'),
            paginationContainer: document.getElementById('pagination-container'),
            minPriceSlider: document.getElementById('min-price'),
            maxPriceSlider: document.getElementById('max-price'),
            minPriceInput: document.getElementById('min-price-input'),
            maxPriceInput: document.getElementById('max-price-input'),
            minPriceDisplay: document.getElementById('min-price-display'),
            maxPriceDisplay: document.getElementById('max-price-display')
        };

        // Validate elements exist
        // console.log('📍 Elements found:', {
        //     filterForm: !!elements.filterForm,
        //     sortSelect: !!elements.sortSelect,
        //     productsContainer: !!elements.productsContainer,
        //     resultsInfo: !!elements.resultsInfo,
        //     clearFiltersBtn: !!elements.clearFiltersBtn,
        //     searchInput: !!elements.searchInput
        // });

        // Main filter function
        function filterProducts() {
            // console.log('🔍 Filter triggered');
            
            if (FilterSystem.isLoading) {
                // console.log('⏳ Already loading, skipping...');
                return;
            }

            if (!elements.filterForm || !elements.productsContainer) {
                console.error('❌ Required elements missing for filters!');
                return;
            }

            FilterSystem.isLoading = true;
            
            // Show loading state
            showLoadingState();

            // Collect form data
            const formData = new FormData(elements.filterForm);
            if (elements.sortSelect && elements.sortSelect.value) {
                formData.append('sort', elements.sortSelect.value);
            }

            // Convert to URL params
            const params = new URLSearchParams();
            for (let [key, value] of formData.entries()) {
                params.append(key, value);
                // console.log('📝 Filter param:', key, '=', value);
            }

            // Make AJAX request
            const url = window.location.pathname + '?' + params.toString();
            // console.log('🌐 AJAX URL:', url);

            fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                // console.log('📡 Response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                // console.log('✅ AJAX Success:', data);
                if (data.success) {
                    updateProductsGrid(data.products || []);
                    updateResultsInfo(data.pagination || {});
                    updatePagination(data.pagination || {}); // Update pagination with AJAX data
                } else {
                    throw new Error('Server returned error response');
                }
                FilterSystem.isLoading = false;
            })
            .catch(error => {
                console.error('❌ AJAX Error:', error);
                showErrorState(error.message);
                FilterSystem.isLoading = false;
            });
        }

        // Show loading state
        function showLoadingState() {
            elements.productsContainer.innerHTML = `
                <div class="flex justify-center items-center py-16">
                    <div class="text-center">
                        <div class="loading-spinner mx-auto mb-4"></div>
                        <p class="text-gray-600">Loading products...</p>
                    </div>
                </div>
            `;
        }

        // Show error state
        function showErrorState(message) {
            elements.productsContainer.innerHTML = `
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="bg-gray-100 rounded-xl w-24 h-24 flex items-center justify-center mx-auto mb-6 border border-gray-300">
                            <svg class="w-12 h-12 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Error Loading Products</h3>
                        <p class="text-red-400 mb-6">${message}</p>
                        <button onclick="location.reload()" class="bg-[blue-500] hover:bg-[blue-600] text-white px-6 py-3 rounded-lg font-semibold transition-all">
                            Reload Page
                        </button>
                    </div>
                </div>
            `;
        }

        // Update products grid
        function updateProductsGrid(products) {
            console.log('🔄 Updating grid with', products.length, 'products');
            
            if (!products || products.length === 0) {
                elements.productsContainer.innerHTML = `
                    <div class="text-center py-16">
                        <div class="max-w-md mx-auto">
                            <div class="bg-gray-100 rounded-xl w-24 h-24 flex items-center justify-center mx-auto mb-6 border border-gray-300">
                                <svg class="w-12 h-12 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2C5.58 2 2 5.58 2 10s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
                            <p class="text-gray-600 mb-6">Try adjusting your filters to see more results.</p>
                            <button onclick="clearAllFilters()" class="bg-[blue-500] hover:bg-[blue-600] text-white px-6 py-3 rounded-lg font-semibold transition-all">
                                Clear Filters
                            </button>
                        </div>
                    </div>
                `;
                return;
            }

            let gridHTML = '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 mb-8 md:mb-12">';
            
            products.forEach(product => {
                let leftBadges = '<div class="absolute top-3 left-3 z-10 flex flex-col gap-1">';
                if (product.is_on_sale) {
                    leftBadges += '<span class="bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 rounded">SALE</span>';
                }
                if (product.is_wholesale) {
                    leftBadges += '<span class="bg-amber-500 text-white text-[10px] font-bold px-2 py-0.5 rounded">Wholesale</span>';
                }
                leftBadges += '</div>';

                let stockBadge = '';
                if (product.stock_quantity > 0) {
                    stockBadge = '<div class="absolute top-3 right-3 bg-emerald-500 text-white text-xs font-medium px-2.5 py-1 rounded-lg">In Stock</div>';
                } else if (product.is_in_stock_uae) {
                    stockBadge = '<div class="absolute top-3 right-3 bg-sky-600 text-white text-xs font-medium px-2.5 py-1 rounded-lg">In Stock UAE</div>';
                } else {
                    stockBadge = '<div class="absolute top-3 right-3 bg-red-500 text-white text-xs font-medium px-2.5 py-1 rounded-lg">Out of Stock</div>';
                }

                let saleBadge = '';
                
                let priceHTML = '';
                if (product.is_on_sale) {
                    priceHTML = `<span class="text-sm text-gray-500 line-through">AED ${new Intl.NumberFormat().format(product.price)}</span>
                                 <span class="text-lg font-bold text-[blue-500]">AED ${new Intl.NumberFormat().format(product.final_price)}</span>`;
                } else {
                    if (product.final_price > 0) {
                        priceHTML = `<span class="text-lg font-bold text-gray-900">AED ${new Intl.NumberFormat().format(product.final_price)}</span>`;
                    } else {
                        priceHTML = `<span class="text-lg font-bold text-[blue-500]">Contact for Price</span>`;
                    }
                }

                // Generate proper product URL using category and product slugs
                const categorySlug = product.category?.slug || product.category?.id || 'uncategorized';
                const productSlug = product.slug || product.id;
                const productUrl = `/${categorySlug}/${productSlug}`;
                const actionBtn = (product.can_add_to_cart || product.stock_quantity > 0)
                    ? `<button type="button" data-add-to-cart onclick="event.preventDefault(); event.stopPropagation(); addToCart(${product.id})" class="btn-add-to-cart w-full btn-add-to-cart--sm"><span class="btn-add-to-cart__icon-wrap" aria-hidden="true"><svg class="btn-add-to-cart__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg></span><span class="btn-add-to-cart__text">Add to Cart</span><span class="btn-add-to-cart__loader" aria-hidden="true"><svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg></span></button>`
                    : `<span class="block w-full text-center text-xs font-semibold rounded-lg py-2.5 ${(product.is_wholesale || product.is_in_stock_uae) ? 'bg-sky-600 text-white' : 'bg-gray-200 text-gray-600'}">${(product.is_wholesale || product.is_in_stock_uae) ? 'View · WhatsApp purchase' : (product.cart_restriction_reason || 'Unavailable')}</span>`;
                
                gridHTML += `
                    <a href="${productUrl}" class="product-card block bg-white rounded-xl border border-gray-200/30 overflow-hidden hover:border-[blue-500]/30 transition-all duration-300 group shadow-lg hover:shadow-xl hover:shadow-[blue-500]/10 cursor-pointer">
                        <div class="relative overflow-hidden bg-white aspect-[4/3]">
                            <img src="${product.main_image}" alt="${product.name}" class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105 p-6 bg-white/5 rounded-lg" loading="lazy">
                            ${leftBadges}
                            ${stockBadge}
                            ${saleBadge}
                        </div>
                        <div class="p-4">
                            <div class="mb-2">
                                <span class="text-xs text-[blue-500] font-medium tracking-wide">${product.category?.name || 'Uncategorized'}</span>
                            </div>
                            <h3 class="text-base font-semibold text-gray-900 mb-3 line-clamp-2 group-hover:text-[blue-500] transition-colors leading-tight">
                                ${product.name}
                            </h3>
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex flex-col">${priceHTML}</div>
                            </div>
                            <div class="mt-auto">
                                ${actionBtn}
                            </div>
                        </div>
                    </a>
                `;
            });

            gridHTML += '</div>';
            elements.productsContainer.innerHTML = gridHTML;
        }

        // Update results info
        function updateResultsInfo(pagination) {
            if (elements.resultsInfo) {
                const text = pagination.total > 0 
                    ? `${pagination.total} products found`
                    : 'No products found';
                elements.resultsInfo.textContent = text;
            }
        }

        // Update pagination for AJAX
        function updatePagination(pagination) {
            if (!elements.paginationContainer) return;
            
            // If no pagination data or only one page, hide pagination
            if (!pagination || pagination.last_page <= 1) {
                elements.paginationContainer.innerHTML = '';
                return;
            }
            
            // Get current filter parameters
            const currentParams = new URLSearchParams();
            if (elements.filterForm) {
                const formData = new FormData(elements.filterForm);
                for (let [key, value] of formData.entries()) {
                    if (value) currentParams.append(key, value);
                }
            }
            if (elements.sortSelect && elements.sortSelect.value) {
                currentParams.append('sort', elements.sortSelect.value);
            }
            
            // Generate pagination HTML
            let paginationHTML = '<nav class="flex flex-wrap items-center justify-center gap-1 sm:gap-2 mt-6 sm:mt-8 px-2" role="navigation" aria-label="Pagination Navigation">';
            
            // Previous page link
            if (pagination.current_page > 1) {
                const prevParams = new URLSearchParams(currentParams);
                prevParams.set('page', pagination.current_page - 1);
                paginationHTML += `
                    <a href="?${prevParams.toString()}" 
                       class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-700 bg-gray-50 border border-gray-300 rounded-md hover:bg-gray-100 hover:text-red-600 transition-colors flex-shrink-0">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>`;
            } else {
                paginationHTML += `
                    <span class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-500 bg-gray-50 border border-gray-300 rounded-md cursor-not-allowed flex-shrink-0">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </span>`;
            }
            
            // Page number links
            const startPage = Math.max(1, pagination.current_page - 2);
            const endPage = Math.min(pagination.last_page, pagination.current_page + 2);
            
            // Show first page if we're not starting from 1
            if (startPage > 1) {
                const firstParams = new URLSearchParams(currentParams);
                firstParams.set('page', 1);
                paginationHTML += `<a href="?${firstParams.toString()}" class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-700 bg-gray-50 border border-gray-300 rounded-md hover:bg-gray-100 hover:text-red-600 transition-colors min-w-[32px] sm:min-w-[36px] text-center">1</a>`;
                if (startPage > 2) {
                    paginationHTML += `<span class="hidden sm:inline-flex px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-500 bg-gray-50 border border-gray-300 rounded-md">...</span>`;
                }
            }
            
            // Page numbers around current page
            for (let page = startPage; page <= endPage; page++) {
                if (page === pagination.current_page) {
                    paginationHTML += `<span class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-white bg-[blue-500] border border-[blue-500] rounded-md font-medium min-w-[32px] sm:min-w-[36px] text-center">${page}</span>`;
                } else {
                    const pageParams = new URLSearchParams(currentParams);
                    pageParams.set('page', page);
                    // Show only critical pages on mobile (current, first, last, and adjacent)
                    const showOnMobile = (page === 1 || page === pagination.last_page || Math.abs(page - pagination.current_page) <= 1);
                    const mobileClass = showOnMobile ? '' : 'hidden sm:inline-flex';
                    paginationHTML += `<a href="?${pageParams.toString()}" class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-700 bg-gray-50 border border-gray-300 rounded-md hover:bg-gray-100 hover:text-red-600 transition-colors min-w-[32px] sm:min-w-[36px] text-center ${mobileClass}">${page}</a>`;
                }
            }
            
            // Show last page if we're not ending at the last page
            if (endPage < pagination.last_page) {
                if (endPage < pagination.last_page - 1) {
                    paginationHTML += `<span class="hidden sm:inline-flex px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-500 bg-gray-50 border border-gray-300 rounded-md">...</span>`;
                }
                const lastParams = new URLSearchParams(currentParams);
                lastParams.set('page', pagination.last_page);
                paginationHTML += `<a href="?${lastParams.toString()}" class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-700 bg-gray-50 border border-gray-300 rounded-md hover:bg-gray-100 hover:text-red-600 transition-colors min-w-[32px] sm:min-w-[36px] text-center">${pagination.last_page}</a>`;
            }
            
            // Next page link
            if (pagination.current_page < pagination.last_page) {
                const nextParams = new URLSearchParams(currentParams);
                nextParams.set('page', pagination.current_page + 1);
                paginationHTML += `
                    <a href="?${nextParams.toString()}" 
                       class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-700 bg-gray-50 border border-gray-300 rounded-md hover:bg-gray-100 hover:text-red-600 transition-colors flex-shrink-0">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>`;
            } else {
                paginationHTML += `
                    <span class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-500 bg-gray-50 border border-gray-300 rounded-md cursor-not-allowed flex-shrink-0">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>`;
            }
            
            paginationHTML += '</nav>';
            
            // Update pagination container
            elements.paginationContainer.innerHTML = paginationHTML;
        }

        // Debounced search
        function debounceSearch() {
            clearTimeout(FilterSystem.searchTimeout);
            FilterSystem.searchTimeout = setTimeout(filterProducts, 500);
        }

        // Clear all filters
        window.clearAllFilters = function() {
            console.log('🧹 Clearing all filters');
            if (elements.filterForm) elements.filterForm.reset();
            if (elements.sortSelect) elements.sortSelect.value = 'latest';
            
            // Reset price sliders to their default values
            if (elements.minPriceSlider && elements.maxPriceSlider) {
                elements.minPriceSlider.value = elements.minPriceSlider.min;
                elements.maxPriceSlider.value = elements.maxPriceSlider.max;
                
                if (elements.minPriceInput) elements.minPriceInput.value = elements.minPriceSlider.min;
                if (elements.maxPriceInput) elements.maxPriceInput.value = elements.maxPriceSlider.max;
                
                updatePriceDisplay();
                updateActiveTrack();
            }
            
            // Remove active state from quick price buttons
            const quickButtons = document.querySelectorAll('.quick-price-btn');
            quickButtons.forEach(btn => btn.classList.remove('active'));
            
            filterProducts();
        }

        // Enhanced Price Range Functions
        function updatePriceDisplay() {
            if (elements.minPriceDisplay && elements.maxPriceDisplay && 
                elements.minPriceSlider && elements.maxPriceSlider) {
                const minVal = parseInt(elements.minPriceSlider.value);
                const maxVal = parseInt(elements.maxPriceSlider.value);
                
                elements.minPriceDisplay.textContent = minVal.toLocaleString();
                elements.maxPriceDisplay.textContent = maxVal.toLocaleString();
                
                updateActiveTrack();
            }
        }

        function updateActiveTrack() {
            const activeTrack = document.getElementById('price-track-active');
            if (activeTrack && elements.minPriceSlider && elements.maxPriceSlider) {
                const min = parseInt(elements.minPriceSlider.min);
                const max = parseInt(elements.maxPriceSlider.max);
                const minVal = parseInt(elements.minPriceSlider.value);
                const maxVal = parseInt(elements.maxPriceSlider.value);
                
                const leftPercent = ((minVal - min) / (max - min)) * 100;
                const rightPercent = ((maxVal - min) / (max - min)) * 100;
                
                activeTrack.style.left = leftPercent + '%';
                activeTrack.style.width = (rightPercent - leftPercent) + '%';
            }
        }

        // Quick Price Preset Functions
        window.setQuickPrice = function(minPrice, maxPrice) {
            if (elements.minPriceSlider && elements.maxPriceSlider) {
                elements.minPriceSlider.value = minPrice;
                elements.maxPriceSlider.value = maxPrice;
                
                if (elements.minPriceInput) elements.minPriceInput.value = minPrice;
                if (elements.maxPriceInput) elements.maxPriceInput.value = maxPrice;
                
                updatePriceDisplay();
                filterProducts();
                
                // Visual feedback for quick buttons
                const quickButtons = document.querySelectorAll('.quick-price-btn');
                quickButtons.forEach(btn => btn.classList.remove('active'));
                event.target.classList.add('active');
                
                setTimeout(() => {
                    event.target.classList.remove('active');
                }, 2000);
            }
        }

        // Reset Price Function
        function resetPrice() {
            if (elements.minPriceSlider && elements.maxPriceSlider) {
                elements.minPriceSlider.value = elements.minPriceSlider.min;
                elements.maxPriceSlider.value = elements.maxPriceSlider.max;
                
                if (elements.minPriceInput) elements.minPriceInput.value = elements.minPriceSlider.min;
                if (elements.maxPriceInput) elements.maxPriceInput.value = elements.maxPriceSlider.max;
                
                updatePriceDisplay();
                filterProducts();
            }
        }

        function syncSliderToInput(isMin) {
            if (isMin && elements.minPriceInput && elements.minPriceSlider) {
                let value = parseInt(elements.minPriceInput.value);
                let max = parseInt(elements.maxPriceSlider.value);
                if (value >= max) {
                    value = max - 1;
                    elements.minPriceInput.value = value;
                }
                elements.minPriceSlider.value = value;
            } else if (!isMin && elements.maxPriceInput && elements.maxPriceSlider) {
                let value = parseInt(elements.maxPriceInput.value);
                let min = parseInt(elements.minPriceSlider.value);
                if (value <= min) {
                    value = min + 1;
                    elements.maxPriceInput.value = value;
                }
                elements.maxPriceSlider.value = value;
            }
            updatePriceDisplay();
        }

        function handleSliderChange() {
            if (elements.minPriceSlider && elements.maxPriceSlider) {
                let minVal = parseInt(elements.minPriceSlider.value);
                let maxVal = parseInt(elements.maxPriceSlider.value);
                
                if (minVal >= maxVal) {
                    elements.minPriceSlider.value = maxVal - 1;
                    minVal = maxVal - 1;
                }
                
                if (elements.minPriceInput) elements.minPriceInput.value = minVal;
                if (elements.maxPriceInput) elements.maxPriceInput.value = maxVal;
                
                updatePriceDisplay();
                updateActiveTrack();
                filterProducts();
            }
        }

        // Event listeners
        if (elements.filterForm) {
            elements.filterForm.addEventListener('change', function(e) {
                console.log('📝 Form change:', e.target.name || e.target.id);
                filterProducts();
            });
        }

        if (elements.sortSelect) {
            elements.sortSelect.addEventListener('change', function() {
                console.log('🔀 Sort change:', this.value);
                filterProducts();
            });
        }

        if (elements.clearFiltersBtn) {
            elements.clearFiltersBtn.addEventListener('click', clearAllFilters);
        }

        if (elements.searchInput) {
            elements.searchInput.addEventListener('input', debounceSearch);
        }

        // Price Range Slider Event Listeners
        if (elements.minPriceSlider) {
            elements.minPriceSlider.addEventListener('input', handleSliderChange);
        }

        if (elements.maxPriceSlider) {
            elements.maxPriceSlider.addEventListener('input', handleSliderChange);
        }

        // Reset Price Button
        const resetPriceBtn = document.getElementById('reset-price');
        if (resetPriceBtn) {
            resetPriceBtn.addEventListener('click', resetPrice);
        }

        if (elements.minPriceInput) {
            elements.minPriceInput.addEventListener('input', function() {
                syncSliderToInput(true);
                clearTimeout(FilterSystem.searchTimeout);
                FilterSystem.searchTimeout = setTimeout(filterProducts, 500);
            });
        }

        if (elements.maxPriceInput) {
            elements.maxPriceInput.addEventListener('input', function() {
                syncSliderToInput(false);
                clearTimeout(FilterSystem.searchTimeout);
                FilterSystem.searchTimeout = setTimeout(filterProducts, 500);
            });
        }

        // Initialize price display and active track
        updatePriceDisplay();
        updateActiveTrack();

        FilterSystem.isInitialized = true;
        console.log('✅ AJAX Filter System initialized successfully!');
        
        // Mobile filter toggle functionality
        const mobileFilterToggle = document.getElementById('mobile-filter-toggle');
        const mobileFilterArrow = document.getElementById('mobile-filter-arrow');
        const filterSidebar = document.getElementById('filter-sidebar');
        
        if (mobileFilterToggle && filterSidebar) {
            mobileFilterToggle.addEventListener('click', function() {
                const isHidden = filterSidebar.classList.contains('hidden');
                
                if (isHidden) {
                    filterSidebar.classList.remove('hidden');
                    filterSidebar.classList.add('block', 'mb-6');
                    mobileFilterArrow.style.transform = 'rotate(180deg)';
                } else {
                    filterSidebar.classList.add('hidden');
                    filterSidebar.classList.remove('block', 'mb-6');
                    mobileFilterArrow.style.transform = 'rotate(0deg)';
                }
            });
        }
    });

    // Global function for add to cart from category page
    window.addToCartFromCategory = function(productId) {
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
                const productCard = button?.closest('.product-card, a.group, [class*="product"]');
                const productName = productCard?.querySelector('h3')?.textContent?.trim() || 'Product';
                window.animateCartAddition(data.cart_total, productName);
            } else {
                if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
            console.error('Cart Error Details:', error);
            showNotification('Something went wrong. Please try again.', 'error');
        });
    }
    
    // Fallback function for backward compatibility (AJAX Filter Fix)
    window.addToCart = window.addToCartFromCategory;
    
    // Remove duplicate updateCartCount function - using global one from app.blade.php

    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed top-24 right-4 z-[99999] p-4 rounded-lg shadow-lg transition-all transform translate-x-full ${
            type === 'success' ? 'bg-green-600 text-white' : 'bg-red-600 text-white'
        }`;
        notification.style.zIndex = '99999';
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
            notification.classList.add('translate-x-0');
        }, 10);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('opacity-0', 'translate-x-full');
            setTimeout(() => {
                if (notification.parentNode) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }

</script>
@endpush

