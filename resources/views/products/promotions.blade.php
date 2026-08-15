@extends('layouts.app')

@section('title', 'Laptop Promotions & Deals - Brand New & Used Laptops Discounts | CHANCE LAPTOPS')
@section('description', 'Discover amazing deals and promotions on brand new and used laptops, laptop accessories, and repair services at Chance Laptops. Limited time offers on laptops in Sri Lanka!')
@section('keywords', 'laptop promotions, laptop deals, laptop discounts, laptop sales, brand new laptop deals, used laptop deals, laptop accessories deals, Chance Laptops, Sri Lanka')

@push('head')
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Laptop Promotions & Deals - Brand New & Used Laptops | CHANCE LAPTOPS">
    <meta property="og:description" content="Discover amazing deals and promotions on brand new and used laptops, laptop accessories, and repair services at Chance Laptops in Sri Lanka.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/promotions-banner.jpg') }}">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Laptop Promotions & Deals - Brand New & Used Laptops | CHANCE LAPTOPS">
    <meta name="twitter:description" content="Discover amazing deals and promotions on brand new and used laptops, laptop accessories, and repair services at Chance Laptops in Sri Lanka.">
    <meta name="twitter:image" content="{{ asset('images/promotions-banner.jpg') }}">
@endpush

@section('content')
<div class="info-page min-h-screen">
    <x-page-hero
        compact
        badge="Limited time offers"
        title="Promotions &"
        highlight="Deals"
        description="Save on brand new and used laptops, accessories, and more."
    >
        <x-slot name="actions">
            <span class="promo-hero-badge">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                {{ $products->total() }} products on sale
            </span>
        </x-slot>
    </x-page-hero>

    <section class="py-8 -mt-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Left Sidebar - Category Filter -->
                <div class="lg:w-64 flex-shrink-0">
                    <div class="bg-white rounded-xl border border-gray-200/30 p-6 sticky top-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z"/>
                            </svg>
                            Categories
                        </h3>
                        
                        <div class="space-y-2">
                            <a href="{{ route('promotions.index') }}" 
                               class="flex items-center px-3 py-2 rounded-lg text-sm font-medium transition-all {{ !request('category') ? 'bg-red-500 text-white' : 'text-gray-700 hover:bg-red-500/10 hover:text-red-500' }}">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                All Deals
                                @if(!request('category'))
                                    <span class="ml-auto text-xs bg-white/50 px-2 py-0.5 rounded-full">{{ $products->total() }}</span>
                                @endif
                            </a>
                            
                            @foreach($categories as $category)
                                <a href="{{ route('promotions.index', ['category' => $category->slug ?: $category->id]) }}" 
                                   class="flex items-center px-3 py-2 rounded-lg text-sm font-medium transition-all group {{ request('category') == ($category->slug ?: $category->id) ? 'bg-red-500 text-white' : 'text-gray-700 hover:bg-red-500/10 hover:text-red-500' }}">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <span class="truncate">{{ $category->name }}</span>
                                    @if(request('category') == ($category->slug ?: $category->id))
                                        <span class="ml-auto text-xs bg-white/50 px-2 py-0.5 rounded-full">{{ $products->total() }}</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>

                        <!-- Mobile Category Count -->
                        <div class="block md:hidden mt-4 pt-4 border-t border-gray-300">
                            <span class="inline-flex items-center px-3 py-1.5 bg-red-500/10 border border-red-500/20 rounded-lg text-red-500 text-xs font-medium">
                                {{ $products->total() }} Products on Sale
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Products Grid -->
                <div class="flex-1">
                    @if($products->count() > 0)
                        <!-- Products Grid -->
                        <div class="product-grid--3 mb-12">
                    @foreach($products as $product)
                        <div class="promo-product-card group flex flex-col">
                        <a href="{{ route('products.show', ['category' => $product->category->slug ?: $product->category->id, 'product' => $product->slug]) }}" 
                           class="flex flex-col flex-1">
                            
                            <div class="relative overflow-hidden bg-white aspect-[4/3]">
                                <img 
                                    src="{{ $product->main_image }}" 
                                    alt="{{ $product->name }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                >
                                <div class="absolute top-2 left-2 flex flex-col gap-1">
                                    <span class="bg-gradient-to-r from-[#ef4444] to-[#dc2626] text-white text-[10px] font-bold px-2 py-0.5 rounded shadow">SALE</span>
                                    @if($product->is_wholesale)
                                        <span class="bg-amber-500 text-white text-[10px] font-bold px-2 py-0.5 rounded shadow">Wholesale</span>
                                    @endif
                                </div>
                                <div class="absolute top-2 right-2">
                                    @if($product->stock_quantity > 0)
                                        <span class="bg-green-500/90 text-white text-[10px] font-medium px-1.5 py-0.5 rounded">In Stock</span>
                                    @elseif($product->is_in_stock_uae)
                                        <span class="bg-sky-600 text-white text-[10px] font-medium px-1.5 py-0.5 rounded">In Stock UAE</span>
                                    @else
                                        <span class="bg-red-500/90 text-white text-[10px] font-medium px-1.5 py-0.5 rounded">Out of Stock</span>
                                    @endif
                                </div>
                            </div>

                            <div class="p-3">
                                <span class="text-[11px] text-red-500 font-medium">{{ $product->category->name ?? 'Product' }}</span>
                                <h3 class="text-sm font-semibold text-gray-900 mt-0.5 mb-1.5 line-clamp-2 group-hover:text-red-500 transition-colors leading-snug">
                                    {{ $product->name }}
                                </h3>
                                <div class="flex items-baseline gap-1.5 flex-wrap">
                                    <span class="text-base font-bold text-red-500">LKR {{ number_format($product->promo_price, 2) }}</span>
                                    <span class="text-xs text-gray-500 line-through">LKR {{ number_format($product->price, 2) }}</span>
                                </div>
                                <p class="text-[11px] text-green-600 font-medium mt-0.5">
                                    Save LKR {{ number_format($product->price - $product->promo_price, 2) }}
                                </p>
                            </div>
                        </a>
                                <div class="px-3 pb-3 pt-0">
                                    @if($product->can_add_to_cart)
                                        <x-add-to-cart-button
                                            :product-id="$product->id"
                                            handler="addToCartFromPromo"
                                            :product-name="$product->name"
                                            :disabled="false"
                                            :sale="true"
                                            size="sm"
                                        />
                                    @else
                                        <a href="{{ route('products.show', ['category' => $product->category->slug ?: $product->category->id, 'product' => $product->slug]) }}"
                                           class="block w-full text-center text-xs font-semibold rounded-lg py-2.5 {{ ($product->is_wholesale || $product->is_in_stock_uae) ? 'bg-sky-600 text-white hover:bg-sky-700' : 'bg-gray-200 text-gray-600' }}">
                                            @if($product->is_wholesale || $product->is_in_stock_uae)
                                                View · WhatsApp purchase
                                            @else
                                                {{ $product->cart_restriction_reason ?: 'Unavailable' }}
                                            @endif
                                        </a>
                                    @endif
                                </div>
                        </div>
                    @endforeach
                </div>

                        <!-- Pagination -->
                        <div class="flex justify-center">
                            {{ $products->appends(request()->query())->links('custom.pagination') }}
                        </div>
                    @else
                        <!-- No Products -->
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Active Promotions</h3>
                            <p class="text-gray-600 mb-6">There are currently no promotional products available in this category. Check back soon for amazing deals!</p>
                            <a href="{{ route('products.index') }}" 
                               class="inline-flex items-center px-6 py-3 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition-all">
                                Browse All Products
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Notification Container -->
<div id="notification-container" class="fixed top-20 right-4 z-[9999]"></div>

<script>
// Enhanced Add to Cart from Promotions Page with Animations
function addToCartFromPromo(productId, productName = 'Promotional Item') {
    const button = event?.target?.closest('[data-add-to-cart], .btn-add-to-cart, button') || event?.target;
    if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'loading');

    fetch('{{ route("cart.add") }}', {
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
            window.animateCartAddition(data.cart_total, productName);
        } else {
            if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
            showNotification(data.message || 'Failed to add product to cart', 'error');
        }
    })
    .catch(error => {
        if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
        showNotification('An error occurred. Please try again.', 'error');
    });
}

// Show notification function
function showNotification(message, type = 'success') {
    const container = document.getElementById('notification-container');
    const notification = document.createElement('div');
    
    notification.className = `p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full opacity-0 mb-4 ${
        type === 'success' 
            ? 'bg-green-500 text-white' 
            : 'bg-red-500 text-white'
    }`;
    
    notification.innerHTML = `
        <div class="flex items-center gap-3">
            <div class="flex-shrink-0">
                ${type === 'success' 
                    ? '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>'
                    : '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>'
                }
            </div>
            <div class="flex-1 text-sm font-medium">${message}</div>
        </div>
    `;
    
    container.appendChild(notification);
    
    // Trigger animation
    setTimeout(() => {
        notification.classList.remove('translate-x-full', 'opacity-0');
    }, 100);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => {
            container.removeChild(notification);
        }, 300);
    }, 3000);
}
</script>
@endsection
