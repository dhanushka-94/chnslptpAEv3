@extends('layouts.app')

@section('title', 'Choose Your Option - CHANCE LAPTOPS')

@section('content')
<div class="info-page min-h-screen">
    <x-page-hero
        badge="Checkout"
        title="Choose Your"
        highlight="Option"
        description="Select how you'd like to proceed with your order."
    />

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 -mt-4">
        <!-- Coming soon notice -->
        <div class="info-card mb-6 border-red-200 bg-gradient-to-r from-red-50 to-white">
            <div class="flex flex-col sm:flex-row items-center gap-4 text-center sm:text-left">
                <div class="w-14 h-14 rounded-2xl bg-red-600 flex items-center justify-center flex-shrink-0 shadow-lg shadow-red-500/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-slate-900 mb-1">Online Shop Coming Soon</h2>
                    <p class="text-slate-600 text-sm">We're building a full online checkout experience. For now, use <strong class="text-red-600">Get Quote</strong> or contact us directly.</p>
                </div>
            </div>
        </div>

        <!-- Cart summary -->
        <div class="checkout-cart-summary mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-red-600 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-slate-900">Your Cart</span>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-red-600" id="cart-total">AED 0.00</div>
                    <div class="text-sm text-slate-500" id="cart-items-count">0 items</div>
                </div>
            </div>
        </div>

        <!-- Options -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="checkout-option-card checkout-option-card--active" onclick="selectOption('quotation')" role="button" tabindex="0">
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Get Quote</h3>
                    <p class="text-slate-600 text-sm mb-6 leading-relaxed">
                        Download a professional PDF quotation for budget approval or procurement.
                    </p>
                    <ul class="space-y-2 mb-8 text-left max-w-xs mx-auto">
                        @foreach(['Professional PDF format', 'Valid for 7 days', 'Company letterhead', 'No payment required'] as $feature)
                            <li class="flex items-center gap-2 text-sm text-slate-600">
                                <svg class="w-4 h-4 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                    <button type="button" class="info-btn-primary w-full py-3">Get Quote</button>
                </div>
            </div>

            <div class="checkout-option-card checkout-option-card--disabled relative">
                <div class="absolute inset-0 flex items-center justify-center z-10 bg-white/60 rounded-[1.15rem]">
                    <div class="text-center px-4">
                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 text-xs font-bold rounded-full mb-2">Coming Soon</span>
                        <p class="text-slate-600 text-sm font-medium">Online shop checkout</p>
                    </div>
                </div>
                <div class="text-center opacity-50">
                    <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Buy Now</h3>
                    <p class="text-slate-500 text-sm mb-6">Secure payment and fast delivery — available soon.</p>
                    <button type="button" class="w-full py-3 rounded-xl bg-slate-200 text-slate-500 font-semibold cursor-not-allowed" disabled>Buy Now</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('cart.index') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-red-600 text-sm font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Cart
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadCartSummary();
    checkCartEmpty();

    document.querySelectorAll('.checkout-option-card--active').forEach(card => {
        card.addEventListener('click', () => selectOption('quotation'));
        card.addEventListener('keydown', e => { if (e.key === 'Enter') selectOption('quotation'); });
    });
});

function loadCartSummary() {
    const totalEl = document.getElementById('cart-total');
    const countEl = document.getElementById('cart-items-count');
    fetch('/cart/summary', {
        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        credentials: 'same-origin'
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            totalEl.textContent = 'AED ' + data.total.toLocaleString('en-US', { minimumFractionDigits: 2 });
            countEl.textContent = data.count + ' item' + (data.count !== 1 ? 's' : '');
        }
    })
    .catch(() => {
        totalEl.textContent = 'AED 0.00';
        countEl.textContent = '0 items';
    });
}

function checkCartEmpty() {
    fetch('/cart/count')
        .then(r => r.json())
        .then(data => { if (data.count === 0) window.location.href = '{{ route("cart.index") }}'; })
        .catch(() => {});
}

function selectOption(type) {
    if (type === 'payment') {
        alert('Online Shop will be available soon! Please use the Get Quote option for now.');
        return;
    }
    document.querySelectorAll('.checkout-option-card--active button').forEach(btn => {
        btn.disabled = true;
        btn.textContent = 'Loading...';
    });
    if (type === 'quotation') window.location.href = '{{ route("checkout.quotation") }}';
}
</script>
@endsection
