@if ($paginator->hasPages())
    <nav class="flex flex-wrap items-center justify-center gap-1 sm:gap-2 mt-6 sm:mt-8 px-2" role="navigation" aria-label="Pagination Navigation">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <span class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-500 bg-gray-50 border border-gray-300 rounded-md cursor-not-allowed flex-shrink-0">
                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" 
               class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-700 bg-gray-50 border border-gray-300 rounded-md hover:bg-gray-100 hover:text-red-600 transition-colors flex-shrink-0">
                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <span class="hidden sm:inline-flex px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-500 bg-gray-50 border border-gray-300 rounded-md">{{ $element }}</span>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-white bg-red-500 border border-red-300 rounded-md font-medium min-w-[32px] sm:min-w-[36px] text-center">{{ $page }}</span>
                    @else
                        @php
                            $currentPage = $paginator->currentPage();
                            $showOnMobile = ($page == 1 || $page == $paginator->lastPage() || abs($page - $currentPage) <= 1);
                        @endphp
                        <a href="{{ $url }}" 
                           class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-700 bg-gray-50 border border-gray-300 rounded-md hover:bg-gray-100 hover:text-red-600 transition-colors min-w-[32px] sm:min-w-[36px] text-center {{ $showOnMobile ? '' : 'hidden sm:inline-flex' }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" 
               class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-700 bg-gray-50 border border-gray-300 rounded-md hover:bg-gray-100 hover:text-red-600 transition-colors flex-shrink-0">
                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        @else
            <span class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm leading-4 text-gray-500 bg-gray-50 border border-gray-300 rounded-md cursor-not-allowed flex-shrink-0">
                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        @endif
    </nav>
@endif
