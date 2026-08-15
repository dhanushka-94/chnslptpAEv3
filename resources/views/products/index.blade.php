@extends('layouts.app')

@section('title', 'Laptops & Accessories - Brand New & Used Laptops in Sri Lanka | CHANCE LAPTOPS')
@section('description', 'Browse our extensive collection of brand new and used laptops, laptop accessories, parts, and services at Chance Laptops. Professional laptop repair and quality products in Sri Lanka.')

@section('content')
<!-- Page Header -->
<section class="bg-white py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-3 md:mb-4">Our Products</h1>
            <p class="text-base md:text-xl text-gray-700 max-w-3xl mx-auto">Discover premium computer hardware and solutions tailored for your needs</p>
        </div>
    </div>
</section>

<!-- Filters and Products -->
<section class="py-8 md:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-6 md:gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="card p-6 sticky top-20">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Filter Products</h3>
                    
                    <!-- Categories Filter -->
                    <div class="mb-6">
                        <h4 class="text-md font-medium text-primary-400 mb-3">Categories</h4>
                        <div class="space-y-2">
                            <a href="{{ route('products.index', request()->except('category', 'page')) }}" 
                               class="block py-2 px-3 rounded {{ !request('category') ? 'filter-active' : 'text-gray-700 hover:text-primary-600 hover:bg-red-50' }}">
                                All Products
                            </a>
                            @foreach($categories as $category)
                                <a href="{{ route('products.index', array_merge(request()->except('page'), ['category' => $category->slug])) }}" 
                                   class="block py-2 px-3 rounded {{ request('category') == $category->slug ? 'filter-active' : 'text-gray-700 hover:text-primary-600 hover:bg-red-50' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Availability -->
                    <div class="mb-6">
                        <h4 class="text-md font-medium text-primary-400 mb-3">Availability</h4>
                        <form method="GET" action="{{ route('products.index') }}" id="availabilityForm" class="space-y-2">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            @if(request('sort'))
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                            @endif
                            <label class="flex items-center cursor-pointer hover:bg-red-50 rounded px-3 py-2 transition-colors">
                                <input type="checkbox" name="in_stock" value="1"
                                       {{ request()->boolean('in_stock') ? 'checked' : '' }}
                                       onchange="document.getElementById('availabilityForm').submit()"
                                       class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="ml-3 text-sm text-gray-700">In Stock</span>
                            </label>
                            <label class="flex items-center cursor-pointer hover:bg-red-50 rounded px-3 py-2 transition-colors">
                                <input type="checkbox" name="wholesale" value="1"
                                       {{ request()->boolean('wholesale') ? 'checked' : '' }}
                                       onchange="document.getElementById('availabilityForm').submit()"
                                       class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                <span class="ml-3 text-sm text-gray-700">Wholesale</span>
                            </label>
                            <label class="flex items-center cursor-pointer hover:bg-red-50 rounded px-3 py-2 transition-colors">
                                <input type="checkbox" name="in_stock_uae" value="1"
                                       {{ request()->boolean('in_stock_uae') ? 'checked' : '' }}
                                       onchange="document.getElementById('availabilityForm').submit()"
                                       class="w-4 h-4 text-sky-600 border-gray-300 rounded focus:ring-sky-500">
                                <span class="ml-3 text-sm text-gray-700">In Stock UAE</span>
                            </label>
                        </form>
                    </div>

                    <!-- Sort Options -->
                    <div>
                        <h4 class="text-md font-medium text-primary-400 mb-3">Sort By</h4>
                        <form method="GET" action="{{ route('products.index') }}" id="sortForm">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            @if(request()->boolean('in_stock'))
                                <input type="hidden" name="in_stock" value="1">
                            @endif
                            @if(request()->boolean('wholesale'))
                                <input type="hidden" name="wholesale" value="1">
                            @endif
                            @if(request()->boolean('in_stock_uae'))
                                <input type="hidden" name="in_stock_uae" value="1">
                            @endif
                            <select name="sort" class="input-field w-full" onchange="document.getElementById('sortForm').submit()">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name: A to Z</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="lg:w-3/4">
                <!-- Search Results Info -->
                @if(request('category') || request('search'))
                    <div class="mb-6">
                        <p class="text-gray-700">
                            @if(request('search'))
                                Search results for "<span class="text-primary-400">{{ request('search') }}</span>"
                            @elseif(request('category'))
                                Category: <span class="text-primary-400">{{ $categories->where('slug', request('category'))->first()->name ?? 'Unknown' }}</span>
                            @endif
                            - {{ $products->total() }} products found
                        </p>
                    </div>
                @endif

                <!-- Products Grid -->
                @if($products->count() > 0)
                    <div class="product-grid">
                        @foreach($products as $product)
                            <div class="card card-hover overflow-hidden">
                                <div class="relative">
                                    <a href="{{ route('products.show', ['category' => $product->category->slug ?: $product->category->id, 'product' => $product->slug]) }}">
                                        <img src="{{ $product->images[0] ?? 'https://via.placeholder.com/400x300?text=No+Image' }}" 
                                             alt="{{ $product->name }}" 
                                             loading="lazy"
                                             class="w-full h-48 object-cover">
                                    </a>
                                    
                                    <!-- Badges -->
                                    <div class="absolute inset-0">
                                        <x-product-grid-flags :product="$product" />
                                    </div>
                                </div>
                                
                                <div class="p-6">
                                    <div class="mb-2">
                                        <span class="text-xs text-primary-400 font-medium">{{ $product->category->name }}</span>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                        <a href="{{ route('products.show', ['category' => $product->category->slug ?: $product->category->id, 'product' => $product->slug]) }}" class="hover:text-primary-400 transition-colors">
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                    
                                    <!-- Product Status Badge -->
                                    @if($product->status)
                                        <div class="mb-3">
                                            @include('components.product-status-badge', ['product' => $product])
                                        </div>
                                    @endif
                                    
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>
                                    
                                    <!-- Price and Actions -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            @if($product->is_on_sale)
                                                <span class="text-sm text-gray-500 line-through">LKR {{ number_format($product->price, 2) }}</span>
                                                <span class="text-lg font-bold text-red-600">LKR {{ number_format($product->promo_price, 2) }}</span>
                                            @else
                                                @if($product->price > 0)
                                                    <span class="text-lg font-bold text-gray-900">LKR {{ number_format($product->price, 2) }}</span>
                                                @else
                                                    <span class="text-lg font-bold text-red-600">Contact for Price</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Payment Method Badges -->
                                    <x-payment-badges />
                                    
                                    <div class="flex items-center justify-between">
                                        <div></div>
                                        @if($product->can_add_to_cart)
                                            <button class="btn-primary px-4 py-2 text-sm" onclick="addToCart({{ $product->id }})">
                                                Add to Cart
                                            </button>
                                        @else
                                            <button class="btn-secondary px-4 py-2 text-sm opacity-50 cursor-not-allowed" disabled 
                                                    title="{{ $product->cart_restriction_reason }}">
                                                {{ $product->cart_restriction_reason ?: 'Unavailable' }}
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                @else
                    <!-- No Products Found -->
                    <div class="text-center py-16">
                        <svg class="w-24 h-24 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.137 0-4.146-.832-5.657-2.343"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Products Found</h3>
                        <p class="text-gray-600 mb-6">Sorry, we couldn't find any products matching your criteria.</p>
                        <a href="{{ route('products.index') }}" class="btn-primary">View All Products</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function addToCart(productId) {
        // TODO: Implement add to cart functionality
        alert('Add to cart functionality will be implemented in the next phase!');
    }
</script>
@endpush
