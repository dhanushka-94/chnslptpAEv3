{{-- Plain partial: do not use @props here (breaks when included via @include) --}}
@php
    $variant = $variant ?? 'grid';
@endphp

<div class="payment-badges{{ $variant === 'detail' ? ' payment-badges--detail' : '' }}">
    <span class="payment-badge payment-badge--koko opacity-75" title="KOKO Pay — Coming Soon">
        <img src="{{ asset('images/kokopay-logo.png') }}"
             alt=""
             class="payment-badge__icon"
             width="16"
             height="16"
             loading="lazy">
        <span>KOKO Pay</span>
        <span class="ml-1 text-[10px] font-bold uppercase tracking-wide text-amber-700 bg-amber-100 px-1.5 py-0.5 rounded">Soon</span>
    </span>
    <span class="payment-badge payment-badge--installments opacity-75" title="Installment plans — Coming Soon">
        <svg class="payment-badge__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
        </svg>
        <span>Installments</span>
        <span class="ml-1 text-[10px] font-bold uppercase tracking-wide text-amber-700 bg-amber-100 px-1.5 py-0.5 rounded">Soon</span>
    </span>
</div>
