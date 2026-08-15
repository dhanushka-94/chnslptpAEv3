@extends('layouts.app')

@section('title', 'CHANCE LAPTOPS - Brand New & Used Laptops, Repair & Service, Accessories in Sri Lanka')
@section('description', 'Chance Laptops - Your trusted destination for brand new and used laptops, professional laptop repair services, and all laptop accessories in Sri Lanka. Expert technicians, quality products, and affordable prices.')
@section('keywords', 'laptops Sri Lanka, brand new laptops, used laptops, laptop repair Sri Lanka, laptop service, laptop accessories, laptop parts, laptop screen repair, laptop battery, laptop charger, laptop keyboard, laptop bag, laptop cooling pad, Chance Laptops, Colombo')
@section('og_title', 'CHANCE LAPTOPS - Brand New & Used Laptops, Repair & Service in Sri Lanka')
@section('og_description', 'Discover brand new and used laptops, expert laptop repair services, and comprehensive laptop accessories at Chance Laptops. Quality products with warranty and expert service in Sri Lanka.')
@section('og_type', 'website')

@section('content')

<!-- Compact hero slider -->
<div class="home-mini-slider-wrap bg-white border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-5">
        <x-home-mini-slider :slides="$heroSlides" />
    </div>
</div>

<!-- Promotions -->
<section class="home-promotions bg-white border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">
        <div class="home-section-header">
            <div>
                <h2 class="home-section-header__title">Promotions</h2>
                <p class="home-section-header__meta">Special deals &amp; discounted products</p>
            </div>
            <a href="{{ route('promotions.index') }}" class="home-section-header__more">
                View all
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        @if($promoDeals->isNotEmpty())
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 md:gap-5">
                @foreach($promoDeals as $product)
                    <x-home-product-card :product="$product" />
                @endforeach
            </div>
        @else
            <div class="text-center py-10">
                <p class="text-slate-600 mb-4">No promotions available right now.</p>
                <a href="{{ route('products.index') }}" class="info-btn-primary inline-flex items-center gap-2">
                    Browse products
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Category-wise product rows -->
<section class="home-catalog pt-8 pb-12 md:pt-10 md:pb-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @forelse($categorySections as $section)
            <div class="home-category-block mb-10 md:mb-14 last:mb-0">
                <div class="home-section-header">
                    <div>
                        <h2 class="home-section-header__title">{{ $section->category->name }}</h2>
                        <p class="home-section-header__meta">{{ $section->category->active_products_count ?? $section->products->count() }} products</p>
                    </div>
                    <a href="{{ route('categories.show', $section->category->slug ?: $section->category->id) }}"
                       class="home-section-header__more">
                        More Products
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 md:gap-5">
                    @foreach($section->products as $product)
                        <x-home-product-card :product="$product" />
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center py-16 home-catalog-empty">
                <p class="text-slate-600 mb-4">No products available right now.</p>
                <a href="{{ route('categories.index') }}" class="info-btn-primary inline-flex items-center gap-2">
                    Browse categories
                </a>
            </div>
        @endforelse

        @if($categorySections->isNotEmpty())
            <div class="mt-10 text-center">
                <a href="{{ route('categories.index') }}"
                   class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl shadow-lg shadow-red-500/25 transition-all hover:-translate-y-0.5">
                    View all categories
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</section>

{{-- TEMPORARILY HIDDEN: Happy Customer Photos Section --}}
{{-- <section class="py-16 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-64 h-64 rounded-full bg-red-500/30 blur-3xl -top-32 -left-32"></div>
        <div class="absolute w-64 h-64 rounded-full bg-[#E30613] blur-3xl -bottom-32 -right-32"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-4 py-2 bg-red-500/10 border border-red-500/20 rounded-lg text-red-500 text-sm font-medium mb-6">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 7V9C15 10.1 15.9 11 17 11S19 10.1 19 11V9H21ZM17 13C15.9 13 15 12.1 15 11V9L12 9L9 9V11C9 12.1 8.1 13 7 13S5 12.1 5 11V9H3V11C3 12.1 3.9 13 5 13S7 12.1 7 13V21H9V13C9 12.1 9.9 11 11 11S13 12.1 13 11V21H15V13C15 12.1 15.9 11 17 11S19 12.1 19 11V9H21V11C21 12.1 20.1 13 19 13S17 12.1 17 13Z"/>
                </svg>
                Our Happy Customers
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Customer Experiences
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Join thousands of satisfied customers who trust Chance Laptops for their technology needs
            </p>
        </div>

        <!-- Happy Customer Photos - Continuous One Line Carousel -->
        <div class="relative overflow-hidden">
            <!-- Carousel Container -->
            <div class="customer-carousel-container" id="customerCarousel">
                <!-- Continuous Scrolling Track -->
                <div class="carousel-track-continuous flex animate-scroll-right" id="carouselTrackContinuous">
                    <!-- First Set of Photos -->
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (1).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (2).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (3).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (4).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (5).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (6).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (7).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (8).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (9).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (10).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (11).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (12).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <!-- Duplicate Set for Seamless Loop -->
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (1).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (2).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (3).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (4).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (5).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (6).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (7).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (8).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (9).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (10).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (11).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="customer-photo-card flex-shrink-0 w-48 h-48 rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-300 group mx-3">
                        <img src="{{ asset('images/happy-customers/hc00 (12).jpg') }}" 
                             alt="Happy Chance Laptops Customer" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> --}}


@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-home-mini-slider]').forEach(function (slider) {
            const slides = slider.querySelectorAll('.home-mini-slider__slide');
            const dots = slider.querySelectorAll('[data-slider-dot]');
            if (slides.length <= 1) return;

            let current = 0;
            let timer = null;
            const interval = 5000;

            function goTo(index) {
                current = (index + slides.length) % slides.length;
                slides.forEach((slide, i) => {
                    slide.classList.toggle('is-active', i === current);
                    const link = slide.querySelector('.home-mini-slider__link');
                    if (link) link.tabIndex = i === current ? 0 : -1;
                });
                dots.forEach((dot, i) => {
                    dot.classList.toggle('is-active', i === current);
                    dot.setAttribute('aria-selected', i === current ? 'true' : 'false');
                });
            }

            function next() { goTo(current + 1); }
            function prev() { goTo(current - 1); }

            function start() {
                stop();
                timer = setInterval(next, interval);
            }

            function stop() {
                if (timer) clearInterval(timer);
            }

            slider.querySelector('[data-slider-next]')?.addEventListener('click', function () {
                next();
                start();
            });

            slider.querySelector('[data-slider-prev]')?.addEventListener('click', function () {
                prev();
                start();
            });

            dots.forEach(function (dot) {
                dot.addEventListener('click', function () {
                    goTo(parseInt(dot.dataset.sliderDot, 10));
                    start();
                });
            });

            slider.addEventListener('mouseenter', stop);
            slider.addEventListener('mouseleave', start);
            slider.addEventListener('focusin', stop);
            slider.addEventListener('focusout', start);

            start();
        });
    });

    // Add to Cart from Homepage Function
    function addToCartFromHome(productId, productName = 'Product') {
        const button = event?.target?.closest('[data-add-to-cart], .btn-add-to-cart, button') || event?.target;
        if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'loading');

        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'success');
                if (window.updateCartTotal && data.cart_total !== undefined) {
                    window.updateCartTotal(data.cart_total);
                }
                if (window.animateCartAddition) {
                    window.animateCartAddition(data.cart_total, productName);
                }
            } else {
                if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
                alert(data.message || 'Failed to add product to cart');
            }
        })
        .catch(() => {
            if (window.setAddToCartButtonState) window.setAddToCartButtonState(button, 'idle');
            alert('Something went wrong. Please try again.');
        });
    }


</script>

<style>
    .animate-fade-in-up {
        animation: slideUp 0.4s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }
    
    @keyframes slideUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* TEMPORARILY HIDDEN: Continuous Customer Photo Carousel Styles */
    /* .customer-carousel-container {
        width: 100%;
        overflow: hidden;
        padding: 2rem 0;
        mask: linear-gradient(90deg, transparent, white 10%, white 90%, transparent);
        -webkit-mask: linear-gradient(90deg, transparent, white 10%, white 90%, transparent);
    }

    .carousel-track-continuous {
        display: flex;
        width: fit-content;
        animation: scrollRight 60s linear infinite;
    }

    @keyframes scrollRight {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .customer-photo-card {
        backdrop-filter: blur(10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .customer-photo-card:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 35px rgba(245, 158, 11, 0.25);
        filter: brightness(1.1);
    }

    /* Pause animation on hover */
    .customer-carousel-container:hover .carousel-track-continuous {
        animation-play-state: paused;
    }

    /* Responsive Design */
    @media (max-width: 640px) {
        .customer-photo-card {
            width: 160px !important;
            height: 160px !important;
        }
        
        .customer-photo-card:hover {
            transform: translateY(-3px) scale(1.02);
        }
    }

    @media (max-width: 480px) {
        .customer-photo-card {
            width: 140px !important;
            height: 140px !important;
        }
    } */
</style>


@endpush

