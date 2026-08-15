@extends('layouts.app')

@section('title', 'Bank Transfer - Coming Soon | Chance Laptops (Pvt) Ltd')
@section('description', 'Bank transfer payments for Chance Laptops (Pvt) Ltd are coming soon. Stay tuned for secure account details.')
@section('keywords', 'bank transfer, Chance Laptops, payment, coming soon, Sri Lanka')

@section('content')
<div class="info-page">
    <x-page-hero
        badge="Payment"
        title="Bank Transfer"
        highlight="Coming Soon"
        description="Secure bank transfer payments for Chance Laptops (Pvt) Ltd will be available shortly. Account details are not published yet."
    >
        <x-slot:icon>
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
        </x-slot:icon>
    </x-page-hero>

    <section class="info-section info-section--alt -mt-4">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="info-card text-center !p-10 md:!p-14 border-2 border-dashed border-red-200">
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-red-50 text-red-600">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-xs font-bold uppercase tracking-wide text-amber-800 mb-4">
                    Coming Soon
                </p>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Bank Transfer</h2>
                <p class="text-gray-600 max-w-xl mx-auto mb-8 leading-relaxed">
                    Direct bank transfer details for <strong>Chance Laptops (Pvt) Ltd</strong> are being prepared.
                    Please check back soon, or contact us for current payment options.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('contact-us.index') }}" class="info-btn-primary">Contact Us</a>
                    <a href="{{ route('home') }}" class="info-btn-secondary">Back to Home</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
