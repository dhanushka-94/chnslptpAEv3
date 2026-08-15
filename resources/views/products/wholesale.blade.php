@extends('layouts.app')

@section('title', 'Wholesale Products | Chance Laptops')
@section('description', 'Browse wholesale products from Chance Laptops. Contact us on WhatsApp to purchase. Minimum order is 5 units across any products.')

@section('content')
<section class="bg-white py-4 md:py-5 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <p class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[11px] font-bold uppercase tracking-wide mb-1.5">Wholesale</p>
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 leading-tight">Wholesale Products</h1>
                <p class="text-sm text-gray-600 mt-1">
                    Min. <span class="font-semibold text-amber-800">{{ config('products.wholesale_min_units', 5) }} units</span> across any products · Purchase via WhatsApp
                </p>
            </div>
            <div class="sm:w-auto w-full sm:max-w-xs flex-shrink-0">
                <x-whatsapp-enquiry-button
                    :url="'https://wa.me/'.config('products.whatsapp_number', '971581811579').'?text='.rawurlencode('Hi Chance Laptops, I am interested in wholesale products. Minimum order is '.config('products.wholesale_min_units', 5).' units across any products.')"
                    label="WhatsApp — Wholesale"
                    tone="amber"
                />
            </div>
        </div>
    </div>
</section>

<section class="py-6 md:py-8 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-6 md:gap-8">
            <div class="lg:w-1/4">
                <div class="card p-5 sticky top-20">
                    <h3 class="text-base font-semibold text-gray-900 mb-3">Filter Wholesale</h3>
                    <div class="mb-5">
                        <h4 class="text-sm font-medium text-primary-400 mb-2">Categories</h4>
                        <div class="space-y-1">
                            <a href="{{ route('wholesale.index') }}"
                               class="block py-1.5 px-3 rounded text-sm {{ !request('category') ? 'filter-active' : 'text-gray-700 hover:text-primary-600 hover:bg-red-50' }}">
                                All Wholesale
                            </a>
                            @foreach($categories as $category)
                                <a href="{{ route('wholesale.index', ['category' => $category->slug]) }}"
                                   class="block py-1.5 px-3 rounded text-sm {{ request('category') == $category->slug ? 'filter-active' : 'text-gray-700 hover:text-primary-600 hover:bg-red-50' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-primary-400 mb-2">Sort By</h4>
                        <form method="GET" action="{{ route('wholesale.index') }}" id="sortForm">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
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

            <div class="lg:w-3/4">
                <p class="text-sm text-gray-700 mb-4">{{ $products->total() }} wholesale products</p>

                @if($products->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-3 md:gap-4">
                        @foreach($products as $product)
                            <div class="card card-hover overflow-hidden">
                                <div class="relative bg-white">
                                    <a href="{{ route('products.show', ['category' => $product->category->slug ?: $product->category->id, 'product' => $product->slug]) }}"
                                       class="block aspect-[4/3] overflow-hidden">
                                        <img src="{{ $product->main_image }}"
                                             alt="{{ $product->name }}"
                                             loading="lazy"
                                             class="w-full h-full object-contain p-2">
                                    </a>
                                    <div class="absolute top-1 left-1 flex flex-col gap-0.5">
                                        <span class="inline-flex px-1.5 py-0.5 rounded text-[9px] font-bold bg-amber-500 text-white">Wholesale</span>
                                    </div>
                                    <div class="absolute top-1 right-1">
                                        @if($product->stock_quantity > 0)
                                            <span class="inline-flex px-1.5 py-0.5 rounded text-[9px] font-medium bg-green-500 text-white">In Stock</span>
                                        @elseif($product->is_in_stock_uae)
                                            <span class="inline-flex px-1.5 py-0.5 rounded text-[9px] font-bold bg-sky-600 text-white">In Stock UAE</span>
                                        @else
                                            <span class="inline-flex px-1.5 py-0.5 rounded text-[9px] font-medium bg-red-100 text-red-700">Out of Stock</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="p-2.5">
                                    <span class="text-[10px] text-primary-400 font-medium">{{ $product->category->name ?? 'Product' }}</span>
                                    <h3 class="text-xs sm:text-sm font-semibold text-gray-900 mt-0.5 mb-1 line-clamp-2 leading-snug">
                                        <a href="{{ route('products.show', ['category' => $product->category->slug ?: $product->category->id, 'product' => $product->slug]) }}" class="hover:text-primary-400 transition-colors">
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                    <p class="text-[10px] font-semibold text-amber-700 mb-1">WhatsApp · Min. 5</p>
                                    <div class="flex items-baseline gap-1 mb-2 flex-wrap">
                                        @if($product->is_on_sale)
                                            <span class="text-[10px] text-gray-500 line-through">AED {{ number_format($product->price, 2) }}</span>
                                            <span class="text-sm font-bold text-red-600">AED {{ number_format($product->promo_price, 2) }}</span>
                                        @elseif($product->price > 0)
                                            <span class="text-sm font-bold text-gray-900">AED {{ number_format($product->price, 2) }}</span>
                                        @else
                                            <span class="text-xs font-bold text-red-600">Contact for Price</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('products.show', ['category' => $product->category->slug ?: $product->category->id, 'product' => $product->slug]) }}"
                                       class="btn-primary px-2.5 py-1 text-[11px] inline-flex w-full justify-center">
                                        View &amp; Order
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-12">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="text-center py-16 bg-white rounded-xl border border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Wholesale Products Yet</h3>
                        <p class="text-gray-600 mb-6">Wholesale items will appear here when flagged in the products database.</p>
                        <a href="{{ route('products.index') }}" class="btn-primary">Browse Retail Products</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
