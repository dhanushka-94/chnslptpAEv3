@extends('layouts.app')

@section('title', 'Track Your Order - CHANCE LAPTOPS')

@section('content')
<div class="info-page">
    <x-page-hero
        badge="Order Tracking"
        title="Track Your"
        highlight="Order"
        description="Enter your order number and email to see status and delivery updates. Use Prompt Xpress for courier tracking once shipped."
    >
        <x-slot:icon>
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
        </x-slot:icon>
    </x-page-hero>

    <section class="info-section">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="info-card">
                <div class="flex items-start gap-4 mb-6">
                    <div class="info-card__icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Look up your order</h2>
                        <p class="text-slate-600 text-sm mt-1">Find your order number in your confirmation email or account dashboard.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('orders.track') }}" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="order_number" class="block text-sm font-medium text-slate-700 mb-1.5">
                                Order Number <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="order_number" name="order_number" value="{{ old('order_number') }}"
                                   placeholder="e.g. CLT-2024-001234"
                                   class="info-form-input @error('order_number') border-red-400 @enderror">
                            @error('order_number')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   placeholder="your.email@example.com"
                                   class="info-form-input @error('email') border-red-400 @enderror">
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="info-btn-primary w-full sm:w-auto">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Track Order
                    </button>
                </form>
            </div>
        </div>
    </section>

    @auth
    <section class="info-section info-section--alt">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="info-card">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <div class="flex items-start gap-4">
                        <div class="info-card__icon !bg-emerald-50 !text-emerald-600">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-slate-900">Your recent orders</h2>
                            <p class="text-slate-600 text-sm">Quick access from your account</p>
                        </div>
                    </div>
                    <a href="{{ route('user.orders') }}" class="info-btn-secondary shrink-0">View all orders</a>
                </div>

                @php $recentOrders = Auth::user()->orders()->with('orderItems')->latest()->take(3)->get(); @endphp

                @if($recentOrders->count() > 0)
                    <div class="space-y-3">
                        @foreach($recentOrders as $order)
                            <a href="{{ route('user.orders.detail', $order->order_number) }}"
                               class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-red-300 hover:bg-red-50/30 transition-all group">
                                <div>
                                    <p class="font-semibold text-slate-900 group-hover:text-red-600">{{ $order->order_number }}</p>
                                    <p class="text-sm text-slate-500">{{ $order->created_at->format('M d, Y') }} · {{ $order->orderItems->count() }} item(s)</p>
                                </div>
                                <div class="flex items-center gap-4">
                                    <span class="inline-flex px-2.5 py-1 text-xs font-semibold rounded-full
                                        @if($order->status === 'delivered') bg-emerald-100 text-emerald-800
                                        @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                        @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                    <span class="font-bold text-slate-900">AED {{ number_format($order->total_amount, 2) }}</span>
                                    <svg class="w-5 h-5 text-slate-400 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-10">
                        <p class="text-slate-600 mb-4">You haven't placed any orders yet.</p>
                        <a href="{{ route('categories.index') }}" class="info-btn-primary">Start shopping</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endauth

    <section class="info-section">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="info-section__head">
                <h2 class="info-section__title">Courier tracking</h2>
                <p class="info-section__subtitle">Orders ship via Prompt Xpress — use your AWB number after dispatch</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="info-card info-card--hover-lift">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/promtexpress.png') }}" alt="Prompt Xpress" class="w-10 h-10 object-contain">
                        <h3 class="text-lg font-bold text-slate-900">Package tracking</h3>
                    </div>
                    <p class="text-slate-600 text-sm mb-5">Track delivery with your AWB or reference number on the courier website.</p>
                    <a href="https://www.promptxpress.lk/TrackItem.aspx#" target="_blank" rel="noopener noreferrer"
                       class="info-btn-primary w-full">
                        Track with Prompt Xpress
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
                <div class="info-card info-card--hover-lift">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="info-card__icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900">Branch network</h3>
                    </div>
                    <p class="text-slate-600 text-sm mb-5">Find pickup and delivery locations across United Arab Emirates (55+ branches).</p>
                    <a href="https://www.promptxpress.lk/BranchNetwork.aspx#" target="_blank" rel="noopener noreferrer"
                       class="info-btn-secondary w-full">
                        View branch locations
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </div>

            <div class="mt-6 p-4 rounded-xl bg-red-50 border border-red-100 flex gap-3">
                <img src="{{ asset('images/promtexpress.png') }}" alt="" class="w-8 h-8 object-contain flex-shrink-0">
                <p class="text-sm text-slate-700">
                    <strong class="text-slate-900">Delivery info:</strong> Across the UAE Express Delivery via Prompt Xpress. Typical delivery is 24–48 hours after dispatch once you receive your tracking number.
                </p>
            </div>
        </div>
    </section>

    <section class="info-section info-section--alt">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="info-section__head">
                <h2 class="info-section__title">Order status guide</h2>
                <p class="info-section__subtitle">What each status means for your order</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="status-timeline-item info-card !p-4">
                    <div class="status-timeline-item__icon bg-amber-50 text-amber-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-slate-900 text-sm">Pending</h3>
                    <p class="text-slate-500 text-xs mt-1">Order received</p>
                </div>
                <div class="status-timeline-item info-card !p-4">
                    <div class="status-timeline-item__icon bg-red-50 text-red-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-slate-900 text-sm">Processing</h3>
                    <p class="text-slate-500 text-xs mt-1">Being prepared</p>
                </div>
                <div class="status-timeline-item info-card !p-4">
                    <div class="status-timeline-item__icon bg-purple-50 text-purple-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                    </div>
                    <h3 class="font-semibold text-slate-900 text-sm">Shipped</h3>
                    <p class="text-slate-500 text-xs mt-1">On the way</p>
                </div>
                <div class="status-timeline-item info-card !p-4">
                    <div class="status-timeline-item__icon bg-emerald-50 text-emerald-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-slate-900 text-sm">Delivered</h3>
                    <p class="text-slate-500 text-xs mt-1">Completed</p>
                </div>
                <div class="status-timeline-item info-card !p-4">
                    <div class="status-timeline-item__icon bg-red-50 text-red-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-slate-900 text-sm">Cancelled</h3>
                    <p class="text-slate-500 text-xs mt-1">Order cancelled</p>
                </div>
            </div>
        </div>
    </section>

    <x-page-cta title="Questions about your order?" description="Call, WhatsApp, or visit our contact page for support." />
</div>
@endsection
