@props(['product'])

@php
    $productUrl = route('products.show', [
        'category' => $product->category->slug ?: $product->category->id,
        'product' => $product->slug ?: $product->id,
    ]);
@endphp

<article class="home-product-card group flex flex-col h-full">
    <a href="{{ $productUrl }}" class="block flex-1 flex flex-col">
        <div class="home-product-card__image relative overflow-hidden bg-white aspect-[4/3]">
            <img
                src="{{ $product->main_image }}"
                alt="{{ $product->name }}"
                class="w-full h-full object-contain p-4 transition-transform duration-300 group-hover:scale-105"
                loading="lazy"
            >
            <x-product-grid-flags :product="$product" />
        </div>

        <div class="home-product-card__body p-4 flex-1 flex flex-col">
            <h3 class="text-sm font-semibold text-slate-900 line-clamp-2 leading-snug group-hover:text-red-600 transition-colors mb-2">
                {{ $product->name }}
            </h3>

            <div class="mt-auto">
                @if($product->is_on_sale)
                    <span class="text-xs text-slate-400 line-through block">LKR {{ number_format($product->price, 2) }}</span>
                    <span class="text-base font-bold text-red-600">LKR {{ number_format($product->final_price, 2) }}</span>
                @elseif($product->price > 0 && $product->final_price > 0)
                    <span class="text-base font-bold text-slate-900">LKR {{ number_format($product->final_price, 2) }}</span>
                @else
                    <span class="text-sm font-bold text-red-600">Contact for Price</span>
                @endif
            </div>
        </div>
    </a>

    <div class="px-4 pb-4 space-y-2">
        @if($product->status)
            @include('components.product-status-badge', ['product' => $product])
        @endif
        @if($product->can_add_to_cart)
            <x-payment-badges />
            <x-add-to-cart-button
                :product-id="$product->id"
                handler="addToCartFromHome"
                :product-name="$product->name"
                :disabled="false"
                :sale="$product->is_on_sale"
                size="sm"
            />
        @else
            <a href="{{ $productUrl }}"
               class="block w-full text-center text-sm font-semibold rounded-lg py-2.5 {{ ($product->is_wholesale || $product->is_in_stock_uae) ? 'bg-sky-600 hover:bg-sky-700 text-white' : 'bg-slate-200 text-slate-600' }}">
                @if($product->is_wholesale || $product->is_in_stock_uae)
                    View · WhatsApp purchase
                @else
                    {{ $product->cart_restriction_reason ?: 'Unavailable' }}
                @endif
            </a>
        @endif
    </div>
</article>
