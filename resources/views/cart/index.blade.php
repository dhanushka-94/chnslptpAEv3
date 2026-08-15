@extends('layouts.app')

@section('title', 'Shopping Cart - CHANCE LAPTOPS')

@section('content')
<div class="info-page cart-page min-h-screen">
    <x-page-hero
        badge="Your order"
        title="Shopping"
        highlight="Cart"
        description="Review your items and proceed to checkout when you're ready."
    />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 -mt-4">
        @if($cartItems->isEmpty())
            <div class="cart-empty-state max-w-lg mx-auto">
                <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-red-50 flex items-center justify-center">
                    <svg class="w-10 h-10 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Your cart is empty</h3>
                <p class="text-slate-600 mb-6">Browse our categories and add products to get started.</p>
                <a href="{{ route('categories.index') }}" class="info-btn-primary inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Continue Shopping
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                <div class="lg:col-span-2 space-y-4">
                    <div class="cart-item-card">
                        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
                            <h2 class="text-lg font-bold text-slate-900">Cart Items</h2>
                            <span class="text-sm text-slate-500">{{ $cartItems->count() }} {{ Str::plural('item', $cartItems->count()) }}</span>
                        </div>
                        <div class="divide-y divide-slate-100">
                            @foreach($cartItems as $item)
                                <div class="p-4 sm:p-5 cart-item" data-item-id="{{ $item->id }}">
                                    <div class="flex flex-col sm:flex-row gap-4">
                                        <div class="flex gap-4 flex-1 min-w-0">
                                            <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0 border border-slate-200">
                                                <img src="{{ $item->product->main_image }}"
                                                     alt="{{ $item->product->name }}"
                                                     loading="lazy"
                                                     class="w-full h-full object-cover">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <h3 class="font-semibold text-slate-900 text-sm sm:text-base leading-snug">{{ $item->product->name }}</h3>
                                                <p class="text-xs text-slate-500 mt-1">Code: {{ $item->product->code }}</p>
                                                @if($item->product->is_on_sale)
                                                    <div class="flex items-center gap-2 mt-2 flex-wrap">
                                                        <span class="text-red-600 font-bold text-sm">AED {{ number_format($item->product->final_price, 2) }}</span>
                                                        <span class="text-slate-400 line-through text-xs">AED {{ number_format($item->product->price, 2) }}</span>
                                                    </div>
                                                @else
                                                    <p class="text-red-600 font-bold mt-2 text-sm">AED {{ number_format($item->product->final_price, 2) }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex sm:flex-col items-center sm:items-end justify-between sm:justify-start gap-3 sm:gap-4">
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs text-slate-500 font-medium hidden sm:inline">Qty</span>
                                                <button type="button" class="cart-qty-btn quantity-btn" data-action="decrease" data-item-id="{{ $item->id }}">−</button>
                                                <input type="number"
                                                       value="{{ $item->quantity }}"
                                                       min="1"
                                                       max="{{ $item->product->stock_quantity }}"
                                                       class="cart-qty-input quantity-input"
                                                       data-item-id="{{ $item->id }}"
                                                       data-max-stock="{{ $item->product->stock_quantity }}">
                                                <button type="button" class="cart-qty-btn quantity-btn" data-action="increase" data-item-id="{{ $item->id }}">+</button>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-bold text-slate-900 item-total">AED {{ number_format($item->product->final_price * $item->quantity, 2) }}</p>
                                                <button type="button" class="remove-item text-red-500 hover:text-red-600 text-xs font-medium mt-1 transition-colors" data-item-id="{{ $item->id }}">
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('categories.index') }}" class="inline-flex items-center gap-2 text-red-600 hover:text-red-700 font-medium text-sm transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Continue Shopping
                    </a>
                </div>

                <div class="lg:col-span-1 space-y-4">
                    <div class="cart-summary-card lg:sticky lg:top-32">
                        <h2 class="text-lg font-bold text-slate-900 mb-4">Order Summary</h2>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between text-slate-600">
                                <span>Subtotal</span>
                                <span class="cart-original-subtotal font-medium text-slate-900">AED {{ number_format($cartItems->sum(fn($i) => $i->product->price * $i->quantity), 2) }}</span>
                            </div>
                            @php $discount = $cartItems->sum(fn($i) => ($i->product->price - $i->product->final_price) * $i->quantity); @endphp
                            <div class="flex justify-between text-emerald-600 discount-row" style="{{ $discount > 0 ? '' : 'display: none;' }}">
                                <span>Discount</span>
                                <span class="cart-discount font-medium">-AED {{ number_format($discount, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>Shipping</span>
                                <span class="text-red-600 text-xs font-medium">Pay on delivery</span>
                            </div>
                            <div class="border-t border-slate-200 pt-4 mt-2">
                                <div class="flex justify-between items-baseline">
                                    <span class="font-bold text-slate-900">Grand Total</span>
                                    <span class="cart-total cart-page-total cart-grand-total">AED {{ number_format($cartTotal, 2) }}</span>
                                </div>
                                <p class="text-xs text-slate-500 mt-1">Excluding delivery charges</p>
                            </div>
                        </div>
                        <div class="mt-6 space-y-3">
                            <a href="{{ route('checkout.index') }}" class="info-btn-primary w-full text-center block py-3">
                                Proceed to Checkout
                            </a>
                            <button type="button" id="clear-cart" class="w-full py-3 px-4 rounded-xl border border-slate-200 text-slate-700 font-semibold hover:bg-slate-50 transition-colors text-sm">
                                Clear Cart
                            </button>
                        </div>
                    </div>

                    <div class="cart-shipping-note">
                        <div class="flex gap-3">
                            <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <h4 class="font-semibold text-slate-900 text-sm mb-1">Delivery Charges</h4>
                                <p class="text-slate-600 text-xs leading-relaxed">Delivery charges are due when you receive your parcel.</p>
                                <p class="text-slate-500 text-xs mt-2 leading-relaxed">Delivery charges are due when you receive your parcel.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const action = this.dataset.action;
            const itemId = this.dataset.itemId;
            const input = document.querySelector(`.quantity-input[data-item-id="${itemId}"]`);
            const maxStock = parseInt(input.dataset.maxStock);
            let newQuantity = parseInt(input.value);
            if (action === 'increase') {
                if (newQuantity < maxStock) newQuantity++;
                else { alert(`Maximum available quantity is ${maxStock}`); return; }
            } else if (action === 'decrease' && newQuantity > 1) {
                newQuantity--;
            }
            input.value = newQuantity;
            updateCartItem(itemId, newQuantity);
        });
    });

    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function() {
            const itemId = this.dataset.itemId;
            let quantity = parseInt(this.value);
            const maxStock = parseInt(this.dataset.maxStock);
            if (quantity < 1) { this.value = 1; return; }
            if (quantity > maxStock) {
                alert(`Maximum available quantity is ${maxStock}.`);
                this.value = maxStock;
                updateCartItem(itemId, maxStock);
                return;
            }
            updateCartItem(itemId, quantity);
        });
    });

    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function() {
            removeCartItem(this.dataset.itemId);
        });
    });

    document.getElementById('clear-cart')?.addEventListener('click', function() {
        if (confirm('Are you sure you want to clear your cart?')) clearCart();
    });

    function updateCartItem(itemId, quantity) {
        fetch(`/cart/update/${itemId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ quantity })
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                const row = document.querySelector(`.cart-item[data-item-id="${itemId}"]`);
                row?.querySelector('.item-total')?.replaceChildren(document.createTextNode(`AED ${data.item_total}`));
                updateCartTotals(data);
                if (window.updateCartTotal) window.updateCartTotal(data.cart_total);
            } else {
                alert(data.message || 'Failed to update cart item');
            }
        })
        .catch(() => alert('Something went wrong. Please try again.'));
    }

    function removeCartItem(itemId) {
        fetch(`/cart/remove/${itemId}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                document.querySelector(`.cart-item[data-item-id="${itemId}"]`)?.remove();
                updateCartTotals(data);
                if (window.updateCartTotal) window.updateCartTotal(data.cart_total);
                if (parseFloat(String(data.cart_total).replace(/,/g, '')) === 0) location.reload();
            } else {
                alert(data.message || 'Failed to remove item');
            }
        })
        .catch(() => alert('Failed to remove item. Please try again.'));
    }

    function clearCart() {
        fetch('/cart/clear', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                if (window.updateCartTotal) window.updateCartTotal(data.cart_total);
                setTimeout(() => location.reload(), 300);
            }
        })
        .catch(() => alert('Failed to clear cart. Please try again.'));
    }

    function updateCartTotals(data) {
        let cartTotal, originalSubtotal, totalDiscount, hasDiscount;
        if (typeof data === 'string') {
            cartTotal = data;
        } else if (typeof data === 'object' && data !== null) {
            cartTotal = data.cart_total;
            originalSubtotal = data.original_subtotal;
            totalDiscount = data.total_discount;
            hasDiscount = data.has_discount;
        } else return;

        const totalEl = document.querySelector('.cart-page-total') || document.querySelector('.cart-total');
        if (totalEl) totalEl.textContent = `AED ${cartTotal}`;

        const subEl = document.querySelector('.cart-original-subtotal');
        if (subEl && originalSubtotal !== undefined) subEl.textContent = `AED ${originalSubtotal}`;

        const discountRow = document.querySelector('.discount-row');
        const discountEl = document.querySelector('.cart-discount');
        if (hasDiscount && totalDiscount !== undefined) {
            if (discountEl) discountEl.textContent = `-AED ${totalDiscount}`;
            if (discountRow) discountRow.style.display = 'flex';
        } else if (discountRow) {
            discountRow.style.display = 'none';
        }
    }
});
</script>
@endpush
@endsection
