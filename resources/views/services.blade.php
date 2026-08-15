@extends('layouts.app')

@section('title', 'Service Center - Professional Computer Repair | CHANCE LAPTOPS')
@section('description', 'Professional computer repair and maintenance services with expert technicians, genuine parts, and comprehensive warranty coverage at Chance Laptops Service Center.')
@section('keywords', 'computer repair, laptop repair, service center, Chance Laptops, Sri Lanka, hardware repair, software installation, virus removal')

@section('content')
<div class="info-page">
    <x-page-hero
        badge="Service Center"
        title="Professional"
        highlight="Repair Services"
        description="Expert laptop and computer repair — genuine parts, transparent pricing, and warranty on all service work."
    >
        <x-slot:icon>
            <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/></svg>
        </x-slot:icon>
    </x-page-hero>

    <section class="info-section info-section--alt -mt-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('contact-us.index') }}" class="info-stat-card hover:!border-red-300">
                    <div class="info-card__icon mx-auto mb-3">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>
                    <p class="info-stat-card__label">Get support</p>
                    <p class="info-stat-card__hint mt-2">Contact us for repair &amp; service</p>
                </a>
                <a href="tel:0764442221" class="info-stat-card hover:!border-red-300">
                    <div class="info-card__icon mx-auto mb-3">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <p class="info-stat-card__value text-lg">076 444 222 1</p>
                    <p class="info-stat-card__hint">011 296 066 0</p>
                </a>
                <a href="https://wa.me/94764442221" target="_blank" rel="noopener noreferrer" class="info-stat-card hover:!border-emerald-300">
                    <div class="info-card__icon mx-auto mb-3 !bg-emerald-50 !text-emerald-600">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.386"/></svg>
                    </div>
                    <p class="info-stat-card__value text-lg !text-emerald-600">WhatsApp</p>
                    <p class="info-stat-card__hint">076 444 222 1</p>
                </a>
            </div>
        </div>
    </section>

<!-- Services Section -->
<section class="info-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="info-section__head">
            <h2 class="info-section__title">Our services</h2>
            <p class="info-section__subtitle">Comprehensive computer services for all your technology needs</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Hardware Services -->
            <div class="info-card info-card--hover-lift">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Hardware</h3>
                <h4 class="text-lg text-red-500 mb-3">Computer & Laptop Repair</h4>
                <p class="text-gray-600 text-sm mb-4">Complete diagnosis and repair for desktops and laptops</p>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Hardware diagnostics</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Motherboard repair</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Screen replacement</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Keyboard repair</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Power supply issues</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Component upgrades</li>
                </ul>
            </div>

            <!-- Software Services -->
            <div class="info-card info-card--hover-lift">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Software</h3>
                <h4 class="text-lg text-red-500 mb-3">Software Installation & Support</h4>
                <p class="text-gray-600 text-sm mb-4">Operating system installation and software configuration</p>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Windows installation</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Software setup</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Driver installation</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>System optimization</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>License activation</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Custom configurations</li>
                </ul>
            </div>

            <!-- Security Services -->
            <div class="info-card info-card--hover-lift">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Security</h3>
                <h4 class="text-lg text-red-500 mb-3">Virus & Malware Removal</h4>
                <p class="text-gray-600 text-sm mb-4">Complete system cleanup and security protection</p>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Virus detection & removal</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Malware cleanup</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Antivirus installation</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>System security audit</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Firewall configuration</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Performance optimization</li>
                </ul>
            </div>

            <!-- Network Services -->
            <div class="info-card info-card--hover-lift">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Network</h3>
                <h4 class="text-lg text-red-500 mb-3">Network & Internet Setup</h4>
                <p class="text-gray-600 text-sm mb-4">Home and office network configuration services</p>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>WiFi setup</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Router configuration</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Network troubleshooting</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Internet connectivity</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>File sharing setup</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Network security</li>
                </ul>
            </div>

            <!-- Peripherals Services -->
            <div class="info-card info-card--hover-lift">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Peripherals</h3>
                <h4 class="text-lg text-red-500 mb-3">Printer & Scanner Services</h4>
                <p class="text-gray-600 text-sm mb-4">Printer maintenance and troubleshooting services</p>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Printer setup</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Driver installation</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Print quality issues</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Paper jam resolution</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Ink system cleaning</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Network printing setup</li>
                </ul>
            </div>

            <!-- Upgrade Services -->
            <div class="info-card info-card--hover-lift">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Upgrade</h3>
                <h4 class="text-lg text-red-500 mb-3">System Upgrades & Optimization</h4>
                <p class="text-gray-600 text-sm mb-4">Hardware upgrades and performance enhancement</p>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>RAM upgrades</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>SSD installation</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Graphics card upgrade</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>System speed optimization</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Storage expansion</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Component compatibility</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="info-section info-section--alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="info-section__head">
            <h2 class="info-section__title">Why choose our service center?</h2>
            <p class="info-section__subtitle">Professional service with comprehensive warranty and expert support</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service Warranty -->
            <div class="info-card text-center">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Service Warranty</h3>
                <p class="text-gray-600 text-sm mb-4">All repairs come with comprehensive warranty coverage</p>
                <ul class="space-y-2 text-sm text-gray-700 text-left">
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>90-day service warranty on all repairs</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Genuine parts guarantee</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Free follow-up within warranty period</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Comprehensive service documentation</li>
                </ul>
            </div>

            <!-- Quick Turnaround -->
            <div class="info-card text-center">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Quick Turnaround</h3>
                <p class="text-gray-600 text-sm mb-4">Fast and efficient service delivery</p>
                <ul class="space-y-2 text-sm text-gray-700 text-left">
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Same-day diagnosis</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>24-48 hour basic repairs</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Express service available</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Priority service for businesses</li>
                </ul>
            </div>

            <!-- Expert Technicians -->
            <div class="info-card text-center">
                <div class="w-16 h-16 bg-red-500/20 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Expert Technicians</h3>
                <p class="text-gray-600 text-sm mb-4">Certified professionals with years of experience</p>
                <ul class="space-y-2 text-sm text-gray-700 text-left">
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Certified repair technicians</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Continuous training programs</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>Latest diagnostic equipment</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>15+ years of experience</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Service Process Section -->
<section class="info-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="info-section__head">
            <h2 class="info-section__title">Our service process</h2>
            <p class="info-section__subtitle">Simple and transparent process for all repairs</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-red-500/25">
                        <span class="text-2xl font-bold text-white">01</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Diagnosis</h3>
                <p class="text-gray-600 text-sm">Free comprehensive diagnosis of your device issues</p>
            </div>

            <!-- Step 2 -->
            <div class="text-center">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-red-500/25">
                        <span class="text-2xl font-bold text-white">02</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Estimate</h3>
                <p class="text-gray-600 text-sm">Transparent pricing with detailed repair estimate</p>
            </div>

            <!-- Step 3 -->
            <div class="text-center">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-red-500/25">
                        <span class="text-2xl font-bold text-white">03</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Repair</h3>
                <p class="text-gray-600 text-sm">Professional repair using genuine parts and tools</p>
            </div>

            <!-- Step 4 -->
            <div class="text-center">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-red-500/25">
                        <span class="text-2xl font-bold text-white">04</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Testing</h3>
                <p class="text-gray-600 text-sm">Thorough testing and quality assurance before delivery</p>
            </div>
        </div>
    </div>
</section>

    <x-page-cta title="Ready to get your device fixed?" description="Contact us today for laptop repair and service support." />
</div>
@endsection
