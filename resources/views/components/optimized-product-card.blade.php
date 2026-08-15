{{-- Optimized Product Card Component --}}
@props(['product'])

<div class="card card-hover overflow-hidden group">
    <div class="relative">
        <a href="{{ route('products.show', ['category' => $product->category->slug ?: $product->category->id, 'product' => $product->slug]) }}">
            @include('components.lazy-image', [
                'src' => $product->images[0] ?? 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?w=400&h=300&fit=crop&crop=center',
                'alt' => $product->name,
                'class' => 'w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300',
                'width' => '400',
                'height' => '300'
            ])
        </a>
        
        <!-- Badges -->
        <div class="absolute inset-0 pointer-events-none">
            <x-product-grid-flags :product="$product" />
        </div>
    </div>
    
    <div class="p-6">
        <div class="mb-2">
            <span class="text-xs text-primary-400 font-medium">{{ $product->category->name }}</span>
        </div>
        
        <h3 class="text-lg font-semibold text-gray-900 mb-2">
            <a href="{{ route('products.show', ['category' => $product->category->slug ?: $product->category->id, 'product' => $product->slug]) }}" 
               class="hover:text-primary-400 transition-colors line-clamp-2">
                {{ $product->name }}
            </a>
        </h3>
        
        <!-- Product Status Badge -->
        @if($product->status)
            <div class="mb-3">
                @include('components.product-status-badge', ['product' => $product])
            </div>
        @endif
        
        <!-- Price -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                @if($product->promotion && $product->promo_price > 0 && $product->promo_price < $product->price)
                    <span class="text-sm text-gray-500 line-through">AED {{ number_format($product->price, 2) }}</span>
                    <span class="text-lg font-bold text-red-600">AED {{ number_format($product->promo_price, 2) }}</span>
                @else
                    @if($product->price > 0)
                        <span class="text-lg font-bold text-gray-900">AED {{ number_format($product->price, 2) }}</span>
                    @else
                        <span class="text-lg font-bold text-red-600">Contact for Price</span>
                    @endif
                @endif
            </div>
        </div>

        <!-- Payment Method Badges -->
        <x-payment-badges />
        
        <!-- Action Button -->
        <div class="mt-4">
            <x-add-to-cart-button
                :product-id="$product->id"
                :disabled="!$product->can_add_to_cart"
                :reason="$product->cart_restriction_reason ?: 'Unavailable'"
                size="sm"
            />
        </div>
    </div>
</div>
