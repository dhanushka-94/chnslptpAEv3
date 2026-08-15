<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        $promoDeals = \App\Services\PerformanceCacheService::getPromotionProducts(null, 10);
        $categorySections = \App\Services\PerformanceCacheService::getHomepageProductsByCategory(5);
        $heroSlides = $this->resolveHeroSlides($promoDeals);

        return view('home', compact('promoDeals', 'categorySections', 'heroSlides'));
    }

    private function resolveHeroSlides($promoDeals)
    {
        try {
            if (class_exists(HeroSlide::class) && Schema::hasTable('hero_slides')) {
                $dbSlides = HeroSlide::active()->ordered()->get();

                if ($dbSlides->isNotEmpty()) {
                    return $dbSlides->map(function (HeroSlide $slide) {
                        return [
                            'image' => $slide->image_url,
                            'url' => $slide->link_url ?: null,
                            'alt' => $slide->alt_text ?: ($slide->title ?: 'Chance Laptops'),
                        ];
                    })->values();
                }
            }
        } catch (\Throwable $e) {
            Log::warning('Hero slides unavailable: '.$e->getMessage());
        }

        $slides = collect(config('homepage.hero_slides', []))
            ->filter(function ($slide) {
                return ! empty($slide['image']) && file_exists(public_path($slide['image']));
            })
            ->map(function ($slide) {
                return [
                    'image' => asset($slide['image']),
                    'url' => ! empty($slide['route']) ? route($slide['route']) : null,
                    'alt' => $slide['alt'] ?? 'Chance Laptops',
                ];
            })
            ->values();

        if ($slides->isNotEmpty()) {
            return $slides;
        }

        return $promoDeals->map(function ($product) {
            $url = $product->category
                ? route('products.show', [
                    'category' => $product->category->slug ?: $product->category->id,
                    'product' => $product->slug ?: $product->id,
                ])
                : route('promotions.index');

            return [
                'image' => $product->main_image,
                'url' => $url,
                'alt' => $product->name,
            ];
        })->values();
    }
}
