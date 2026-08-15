{{-- Plain partial: do not use @props here (breaks when included via @include) --}}
@php
    $variant = $variant ?? 'grid';
@endphp

<div class="payment-badges{{ $variant === 'detail' ? ' payment-badges--detail' : '' }}">
    <span class="payment-badge payment-badge--tamara opacity-90" title="Tamara — Coming Soon">
        <img src="{{ asset('images/tamara-logo.png') }}"
             alt="Tamara"
             class="payment-badge__icon h-5 w-auto"
             width="72"
             height="24"
             loading="lazy">
        <span class="ml-1 text-[10px] font-bold uppercase tracking-wide text-amber-700 bg-amber-100 px-1.5 py-0.5 rounded">Soon</span>
    </span>
    <span class="payment-badge payment-badge--tabby opacity-90" title="Tabby — Coming Soon">
        <img src="{{ asset('images/tabby-logo.png') }}"
             alt="Tabby"
             class="payment-badge__icon h-5 w-auto"
             width="72"
             height="24"
             loading="lazy">
        <span class="ml-1 text-[10px] font-bold uppercase tracking-wide text-amber-700 bg-amber-100 px-1.5 py-0.5 rounded">Soon</span>
    </span>
</div>
