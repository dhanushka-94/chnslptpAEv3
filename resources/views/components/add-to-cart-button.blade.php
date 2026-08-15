@props([
    'productId' => null,
    'handler' => 'addToCartFromCategory',
    'productName' => '',
    'disabled' => false,
    'reason' => 'Unavailable',
    'fullWidth' => true,
    'label' => null,
    'sale' => false,
    'size' => 'md',
])

@php
    $label = $label ?? ($sale ? 'Add to Cart — Sale' : 'Add to Cart');
    $sizeClass = match($size) {
        'sm' => 'btn-add-to-cart--sm',
        'lg' => 'btn-add-to-cart--lg',
        default => '',
    };
@endphp

@if($disabled || !$productId)
    <button type="button" disabled
            class="btn-add-to-cart btn-add-to-cart--disabled {{ $fullWidth ? 'w-full' : '' }} {{ $sizeClass }}"
            title="{{ $reason }}">
        <svg class="btn-add-to-cart__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
        </svg>
        <span>{{ $reason }}</span>
    </button>
@else
    <button type="button"
            data-add-to-cart
            onclick="event.preventDefault(); event.stopPropagation(); {{ $handler }}({{ $productId }}{{ $productName ? ", '" . addslashes($productName) . "'" : '' }})"
            class="btn-add-to-cart {{ $fullWidth ? 'w-full' : '' }} {{ $sizeClass }}"
            aria-label="Add {{ $productName ?: 'product' }} to cart">
        <span class="btn-add-to-cart__icon-wrap" aria-hidden="true">
            <svg class="btn-add-to-cart__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
        </span>
        <span class="btn-add-to-cart__text">{{ $label }}</span>
        <span class="btn-add-to-cart__loader" aria-hidden="true">
            <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
    </button>
@endif
