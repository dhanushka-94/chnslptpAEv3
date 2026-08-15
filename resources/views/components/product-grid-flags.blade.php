@props([
    'product',
    'showSale' => true,
])

{{-- Left: type flags (Wholesale / Sale) --}}
<div class="absolute top-2 left-2 z-10 flex flex-col gap-1 items-start pointer-events-none">
    @if($showSale && $product->is_on_sale)
        <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide bg-red-600 text-white shadow-sm">
            Sale
        </span>
    @endif
    @if($product->is_wholesale)
        <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide bg-amber-500 text-white shadow-sm">
            Wholesale
        </span>
    @endif
</div>

{{-- Right: availability --}}
<div class="absolute top-2 right-2 z-10 pointer-events-none">
    @if($product->status && in_array($product->status->status_name, ['Coming Soon', 'Pre Order']))
        <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide bg-violet-600 text-white shadow-sm">
            {{ $product->status->status_name }}
        </span>
    @elseif($product->stock_quantity > 0)
        <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide bg-emerald-500 text-white shadow-sm">
            In Stock
        </span>
    @elseif($product->is_in_stock_uae)
        <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide bg-sky-600 text-white shadow-sm">
            In Stock UAE
        </span>
    @else
        <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide bg-red-500 text-white shadow-sm">
            Out of Stock
        </span>
    @endif
</div>
