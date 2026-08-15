@props(['slides' => []])

@if(count($slides) > 0)
<div class="home-mini-slider" data-home-mini-slider>
    <div class="home-mini-slider__viewport">
        <div class="home-mini-slider__track">
            @foreach($slides as $index => $slide)
                <div class="home-mini-slider__slide {{ $index === 0 ? 'is-active' : '' }}" data-slide="{{ $index }}">
                    @if(!empty($slide['url']))
                        <a href="{{ $slide['url'] }}" class="home-mini-slider__link" @if($index > 0) tabindex="-1" @endif>
                            <img
                                src="{{ $slide['image'] }}"
                                alt="{{ $slide['alt'] ?? 'Promotion slide' }}"
                                class="home-mini-slider__img"
                                @if($index === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif
                            >
                        </a>
                    @else
                        <img
                            src="{{ $slide['image'] }}"
                            alt="{{ $slide['alt'] ?? 'Promotion slide' }}"
                            class="home-mini-slider__img"
                            @if($index === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif
                        >
                    @endif
                </div>
            @endforeach
        </div>

        @if(count($slides) > 1)
            <button type="button" class="home-mini-slider__arrow home-mini-slider__arrow--prev" data-slider-prev aria-label="Previous slide">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button type="button" class="home-mini-slider__arrow home-mini-slider__arrow--next" data-slider-next aria-label="Next slide">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>
            <div class="home-mini-slider__dots" role="tablist" aria-label="Slider pagination">
                @foreach($slides as $index => $slide)
                    <button
                        type="button"
                        class="home-mini-slider__dot {{ $index === 0 ? 'is-active' : '' }}"
                        data-slider-dot="{{ $index }}"
                        aria-label="Go to slide {{ $index + 1 }}"
                        @if($index === 0) aria-selected="true" @endif
                    ></button>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endif
