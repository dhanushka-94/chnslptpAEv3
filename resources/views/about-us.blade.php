@extends('layouts.app')

@section('title', 'About Us - Chance Laptops | Laptops, Repair & Accessories in the UAE')
@section('description', 'Chance Laptops is an online laptop store in the UAE — brand-new and used laptops, accessories, expert repair, and after-sales support across the United Arab Emirates.')
@section('keywords', 'about Chance Laptops, online laptop store UAE, laptops UAE, laptop repair UAE, used laptops Dubai, laptop accessories UAE')

@section('content')
<div class="info-page">
    <x-page-hero
        badge="About Chance Laptops"
        title="Your Trusted"
        highlight="Laptop Partner in the UAE"
        description="Brand-new and used laptops, accessories, and professional repair from our online store — serving customers across the United Arab Emirates."
    >
        <x-slot:icon>
            <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </x-slot:icon>
    </x-page-hero>

    <section class="info-section">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="info-card space-y-4 text-slate-700 leading-relaxed">
                <h2 class="text-2xl font-bold text-slate-900">Who We Are</h2>
                <p>
                    <strong class="text-slate-900">Chance Laptops</strong> is an online technology store serving the United Arab Emirates.
                    We help individuals and businesses find reliable laptops and accessories at fair prices, with clear advice and dependable after-sales support.
                </p>
                <p>
                    Whether you need a brand-new machine for work or study, a quality used laptop that fits your budget, or professional repair service,
                    our team is here to help online via WhatsApp, email, and our website.
                </p>
            </div>
        </div>
    </section>

    <section class="info-section info-section--alt">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <div class="info-card">
                    <h2 class="text-xl font-bold text-red-600 mb-3">Our Vision</h2>
                    <p class="text-slate-700 leading-relaxed">
                        To make quality computing accessible to everyone in the UAE — with honest pricing, trusted products, and service that lasts beyond the sale.
                    </p>
                </div>
                <div class="info-card">
                    <h2 class="text-xl font-bold text-red-600 mb-3">Our Mission</h2>
                    <p class="text-slate-700 leading-relaxed">
                        To sell quality laptops and peripherals, provide expert repair, and deliver excellent after-sales support so every customer can buy and use technology with confidence.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="info-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="info-section__head">
                <h2 class="info-section__title">What We Offer</h2>
                <p class="info-section__subtitle">Products and services tailored for customers across the UAE</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="info-stat-card text-left p-5">
                    <h3 class="font-bold text-slate-900 mb-2">Brand-New Laptops</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Latest and popular models for work, gaming, study, and everyday use.</p>
                </div>
                <div class="info-stat-card text-left p-5">
                    <h3 class="font-bold text-slate-900 mb-2">Used &amp; Refurbished</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Tested used laptops with clear condition details and warranty options where applicable.</p>
                </div>
                <div class="info-stat-card text-left p-5">
                    <h3 class="font-bold text-slate-900 mb-2">Accessories</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Chargers, bags, storage, peripherals, and essential laptop accessories.</p>
                </div>
                <div class="info-stat-card text-left p-5">
                    <h3 class="font-bold text-slate-900 mb-2">Repair &amp; Service</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Hardware diagnostics, repairs, and warranty support arranged through our online store.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="info-section info-section--alt">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="info-section__head">
                <h2 class="info-section__title">Why Choose Us</h2>
                <p class="info-section__subtitle">Practical reasons customers shop with Chance Laptops</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="info-card">
                    <h3 class="font-bold text-slate-900 mb-2">Honest Guidance</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">We help you choose the right device for your needs and budget — not the most expensive one.</p>
                </div>
                <div class="info-card">
                    <h3 class="font-bold text-slate-900 mb-2">Online Support</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Shop on our website or reach us on WhatsApp for sales, wholesale, and warranty questions.</p>
                </div>
                <div class="info-card">
                    <h3 class="font-bold text-slate-900 mb-2">UAE Delivery</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Across the UAE Express Delivery so you can shop online and receive your order conveniently.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="info-section">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="info-card">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Shop Online</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Browse, enquire, and order through our online store. We deliver across the UAE.</p>
                <dl class="space-y-3 text-sm">
                    <div class="flex flex-col sm:flex-row sm:gap-3">
                        <dt class="font-semibold text-slate-900 min-w-[7rem]">Hours</dt>
                        <dd class="text-slate-600">{{ config('products.working_hours') }}</dd>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:gap-3">
                        <dt class="font-semibold text-slate-900 min-w-[7rem]">WhatsApp</dt>
                        <dd>
                            <a href="https://wa.me/{{ config('products.whatsapp_number') }}" class="text-red-600 font-semibold hover:underline" target="_blank" rel="noopener noreferrer">
                                {{ config('products.whatsapp_display') }}
                            </a>
                        </dd>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:gap-3">
                        <dt class="font-semibold text-slate-900 min-w-[7rem]">Email</dt>
                        <dd><a href="mailto:info@chancelaptops.ae" class="text-red-600 font-semibold hover:underline">info@chancelaptops.ae</a></dd>
                    </div>
                </dl>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('contact-us.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-red-600 text-white text-sm font-semibold hover:bg-red-700 transition-colors">Contact Us</a>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg border border-slate-300 text-slate-800 text-sm font-semibold hover:border-red-300 transition-colors">Browse Products</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
