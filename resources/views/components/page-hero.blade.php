@props([
    'badge' => '',
    'title' => '',
    'highlight' => '',
    'description' => '',
    'compact' => false,
])

<section class="page-hero {{ $compact ? 'page-hero--compact' : '' }}">
    <div class="page-hero__bg" aria-hidden="true"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 {{ $compact ? 'py-5 sm:py-6' : 'py-12 sm:py-16' }} relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            @if($badge)
                <div class="page-hero__badge {{ $compact ? '!mb-2 !py-1 !px-2.5 !text-xs' : '' }}">
                    @isset($icon)
                        <span class="page-hero__badge-icon">{{ $icon }}</span>
                    @endisset
                    {{ $badge }}
                </div>
            @endif
            <h1 class="page-hero__title {{ $compact ? 'page-hero__title--compact' : '' }}">
                {{ $title }}
                @if($highlight)
                    <span class="page-hero__highlight {{ $compact ? 'inline' : '' }}">{{ $highlight }}</span>
                @endif
            </h1>
            @if($description)
                <p class="page-hero__desc {{ $compact ? '!mt-1.5 !text-sm !leading-snug' : '' }}">{{ $description }}</p>
            @endif
            @if(isset($actions))
                <div class="{{ $compact ? 'mt-3' : 'mt-8' }} flex flex-wrap justify-center gap-3">
                    {{ $actions }}
                </div>
            @endif
        </div>
    </div>
</section>
